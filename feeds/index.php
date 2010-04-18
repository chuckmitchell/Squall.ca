<?php 
      require_once('../lib/simplepie/simplepie.inc');
      $feed = new SimplePie('http://www.google.com/reader/public/atom/user%2F05206281886015490759%2Fstate%2Fcom.google%2Fbroadcast', '../tmp');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Things that Charles Mitchell has read recently</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

	<script type="text/javascript" src="../lib/jquery/jquery-1.3.2.min.js"></script>

</head>

<body>

     <p>I use <a href="http://www.google.com/reader">Google Reader</a>, and share the stuff that I want people to think I'm interested in ;)</p>

     
	<div class="header">
	  <h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
	  <p><?php echo $feed->get_description(); ?></p>
	</div>
 

	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	$index = 0;
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
		  <h2><span id="<? echo "clickme_" . $index ?>">+</span>&nbsp;&nbsp;<a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
		  <div id="<? echo 'description_' . $index ?>" class="description" style="display:none;">
			
			<p><?php echo $item->get_description(); ?></p>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		  </div>
		  <script type="text/javascript">
		    $('#clickme_<? echo $index ?>').click(function() {
		    $('#description_<? echo $index ?>').slideToggle('slow', function() {
		      // Animation complete.
		    });
		    if ($('#clickme_<? echo $index ?>').html() == '+' ) {
		      $('#clickme_<? echo $index ?>').html('&ndash;');
		    } else {
		      $('#clickme_<? echo $index ?>').html('+');
		    }
		  });
		  </script>
		</div>
 
	<?php $index++; ?>
	<?php endforeach; ?>

</body>



</html>
