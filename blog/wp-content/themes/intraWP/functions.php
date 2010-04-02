<?php

function get_my_archives($cuantos='5') { 
 $pagenow = (intval($_GET['paged'])==0)?1:intval($_GET['paged']);
 $postperpage = get_option('posts_per_page');
 $lastposts = get_posts('numberposts='.$cuantos.'&offset='.($postperpage * $pagenow));
 foreach($lastposts as $post) {
	 setup_postdata($post);
	 echo '<li><a href="'.$post->guid.'" id="post'.$post->ID.'">'.$post->post_title .'</a></li>';
 }
}
 
function aNieto2k_mini_posts($asides) {
	global $wpdb;
		$results = $wpdb->get_results("SELECT * 
										FROM `wp_posts` AS p, wp_post2cat AS c
										WHERE c.post_id = p.ID 
										AND c.category_id = '".$asides."'
										ORDER BY p.post_date DESC
										LIMIT 0,5;");
		foreach($results as $mini) {
			echo '<p class="largeblack"><a href="'.$mini->guid.'">'.$mini->post_title.'</p>';
			echo '<p>'.wptexturize($mini->post_content).'</p>';
		}										
}

/*	----------------------------------------------------------------------------
 	    ____________________________________________________
       |                                                    |
       |                 Category Tagging                   |
       |                 Michael Woehrer                   |
       |____________________________________________________|

	 Copyright 2006  Michael Woehrer  (michael dot woehrer at gmail dot com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    --------------------------------------------------------------------------*/
if (!function_exists("cattag_tagcloud")) {
function cattag_tagcloud(
	$min_scale = 8,
	$max_scale = 30,
	$min_include = 0,
	$sort_by = 'RANDOM',
	$exclude = '',
	$element = '<a rel="tag" href="%link%" title="%description% (%count%)" style="font-size:%size%pt">%title%</a> '
	)
{
	$sort_by = strtoupper($sort_by);

	// *************************************************
	// Get categories and put into array
	// *************************************************
	
	// If sorting is by name, descending...
	$sort_list_cats = 'asc';
	if ($sort_by == 'NAME_DESC') $sort_list_cats = 'desc';

	$cats = list_cats(true, 'all', 'name', $sort_list_cats, '', false, false, true, true, true, true, true, false, true, '', '', $exclude, false);
	$catsArray = explode("\n", $cats);

	// *************************************************
	// Create clean array out of the cat array	
	// *************************************************
	$resultArray = array();
	$count = 0;
	foreach ($catsArray as $cat_loop) {
		if (! empty($cat_loop)) {
			// Get link
			eregi("a href=\"(.+)\" ", $cat_loop, $regs);
			$resultArray[$count]['link'] = $regs[1];

			// Get title
			eregi("title=\"(.+)\"", $cat_loop, $regs);
			$resultArray[$count]['title'] = $regs[1];

			// Get name and number of cat entries
			$cat_loop = trim(strip_tags($cat_loop));
			eregi("(.*) \(([0-9]+)\)$", $cat_loop, $regs);
			$resultArray[$count]['name'] = $regs[1];
			$resultArray[$count]['count'] = $regs[2];

			if ($regs[2] >= $min_include) {
				// Set the min and max number of cat entries
				if ( ( ! isset($count_min) ) or ($regs[2] < $count_min) ) { $count_min = $regs[2]; }
				if ( ( ! isset($count_max) ) or ($regs[2] > $count_max) ) { $count_max = $regs[2]; }				
			} else {
				// Remove array element if the number of posts in this category is smaller than the min value
				// We do this now since the number of posts was not available at the beginning of this foreach loop...
				unset($resultArray[$count]);
			}
			$count++;
		}
	}

	// *************************************************
	// Sort...
	// *************************************************
	switch ($sort_by) {
		case 'WEIGHT_ASC':
			$resultArray = cattag_aux_sortmddata($resultArray,'count','ASC','num');
			break;
		case 'WEIGHT_DESC':
			$resultArray = cattag_aux_sortmddata($resultArray,'count','DESC','num');
			break;
		case 'RANDOM':
			shuffle($resultArray);
			break;
	}

	// *************************************************
	// Scale font
	// *************************************************
	$spread_current = $count_max - $count_min; 
	$spread_default = $max_scale - $min_scale;
	if ($spread_current <= 0) { $spread_current = 1; };
	if ($spread_default <= 0) { $spread_default = 1; }
	$scale_factor = $spread_default / $spread_current;


	// *************************************************
	// Create result
	// *************************************************
	$result = '';
	foreach ($resultArray as $result_loop) {
		// font scaling		
		$final_font = (int) (($result_loop['count'] - $count_min) * $scale_factor + $min_scale);

		// Generate output element
		$element_loop = str_replace('%link%', $result_loop['link'], $element);
		$element_loop = str_replace('%title%', $result_loop['name'], $element_loop);
		$element_loop = str_replace('%description%', $result_loop['title'], $element_loop);
		$element_loop = str_replace('%count%', $result_loop['count'], $element_loop);
		$element_loop = str_replace('%size%', $final_font, $element_loop);
		$result .= $element_loop . "\n";
	}

	$result = '<p>'.$result.'</p>'; // Please do not remove this line.
	return $result;
}
}

?>

