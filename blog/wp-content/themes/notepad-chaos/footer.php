<div id="footer-holder">
  <div class="footer"></div>
  <div class="txt">
    <?php query_posts('pagename=about'); ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <span class="smashing"><a href="http://jobs.smashingmagazine.com">Smashing Magazine</a></span> <span class="rss"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></span></div>
<!---- begin google analytics --->
  <script type="text/javascript"> 
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 
<script type="text/javascript"> 
  try {
    var pageTracker = _gat._getTracker("UA-10697311-1");
    pageTracker._trackPageview();
  } catch(err) {}
</script>
<!---- end gooogle analytics --->
</body></html>