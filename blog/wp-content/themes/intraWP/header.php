<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php if(is_single()) : ?>
	<script type="text/javascript">
		imgLoading = '<?php bloginfo("stylesheet_directory"); ?>/images/loading.gif';
		urlComments = '<?php bloginfo("stylesheet_directory");  ?>/php/comments_ajax.php';
		urlImages = '<?php bloginfo("stylesheet_directory"); ?>/img/';
		newComent = '<?php echo get_settings('home'); ?>/wp-comments-post.php';
	</script>	
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body>
<div id="mainPan">
  <div id="leftPan">
  	<div id="logoPan"><a href="<?php echo get_settings('home'); ?>/"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/logo.jpg" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" style="width:317;height:125;border:0;" /><span style="display:none;"><?php bloginfo('name'); ?></span></a></div>
	   <div id="leftbodyPan">
	   <div id="search">
	   <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
				<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search" /></div>
			</form>
			</div>
			<h2>Ultimas entradas</h2>
			<ul>
				<?php if(function_exists("get_my_archives")) get_my_archives(5);?>
			</ul>
	

