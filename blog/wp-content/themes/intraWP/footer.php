<div id="footermainPan">
  <div id="footerPan">
  	<ul>
  	<li><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a>| </li>
  <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
			<?php wp_register('<li>','</li>'); ?>
  </ul>
  <p class="copyright">©<?php bloginfo('name'); ?> 2006 all right reaserved</p>
  <div id="footerPanhtml"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></div> 
   
   <div id="footerPancss"><a href="<?php bloginfo('comments_rss2_url'); ?>" >COMMENTS</a></div>
   <ul class="templateworld">
  	<li>Design By:</li>
	<li><a href="http://www.templateworld.com">Template World</a>, Wordpress template by<a href="http://www.anieto2k.com">aNieto2k</a></li>
  </ul>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
