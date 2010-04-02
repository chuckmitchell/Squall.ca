<?php 
	$asides = 2;
	$aPosts = array();
	get_header(); ?>
		
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( in_category($asides) && !is_single() ) {
				array_push($aPosts,$post);
			} else { ?>
				<p class="border">&nbsp;</p>
				<h3><?php the_title(); ?></h3>
				<p class="bluetext"><?php the_author() ?></p>
				<p class="blacktext"><?php the_time('F jS, Y') ?></p>
				<?php the_content('continuar...'); ?>
				<h5>Comentarios: <span><?php comments_popup_link('0', '1', '%'); ?></span></h5>
				<p class="more"><a href="<?php the_permalink() ?>">Enlace</a></p>
			<?php } ?>


		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
		</div>

	<?php else : ?>

		<h3 class="center">Not Found</h3>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
<?php if (is_single()) comments_template(); ?>

<?php get_sidebar() ?>


<?php get_footer(); ?>




