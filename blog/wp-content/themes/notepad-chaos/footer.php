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
</body></html>