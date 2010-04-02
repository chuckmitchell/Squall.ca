<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="container">
  <div id="search">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="txtField" />
      <input type="submit" id="searchsubmit" class="btnSearch" value="Find It &raquo;" />
    </form>
  </div>
  <div id="menu-holder"><?php include ('navigation.php'); ?></div>
  <div id="title">
    <h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
    <?php bloginfo('description'); ?></div>
</div>
<div id="content">
  <div class="col01">
  <h2>Archives by Month:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archives by Subject:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>
  </div>
  <div class="col02">
    <div class="recent-posts">
    <?php
    query_posts('showposts=10');
	?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <ul>
    <li><a href="<?php the_permalink() ?>"><?php the_title() ?><br />
    <span class="listMeta"><?php the_time('g:i a') ?>, <?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span></a></li>
    </ul>
    <?php endwhile; endif; ?>
    </div>
    <div class="postit-bottom"></div>
    <?php get_sidebar(); ?>
  </div>
  <br clear="all" />
</div>
<?php get_footer(); ?>