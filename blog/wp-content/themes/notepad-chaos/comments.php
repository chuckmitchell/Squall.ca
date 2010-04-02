<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<small><?php comments_number('No Comments', 'One Comment', '% Comments' );?> to</small>
	<h4 id="comments">&#8220;<?php the_title(); ?>&#8221;</h4>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<span class="commentdate"><a href="#comment-<?php comment_ID() ?>" title="">On <?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></span>
            <cite><?php comment_author_link() ?></cite> Says:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<?php comment_text() ?>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
<?php else : ?>
<p><label for="author"><span class="name">Name:</span></label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="2" class="comment-field" /></p>
<p><label for="email"><span class="email">Email:</span></label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" class="comment-field" />
<span class="txt-email-sub">Email will not be published</span></p>
<p><label for="url"><span class="website">Website Address:</span></label> <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" class="comment-field" />
<span class="txt-website-example">Website example</span></p>
<?php endif; ?>
<p><span class="comments">Your Comment:</span> <textarea name="comment" id="comment" rows="10" tabindex="1" class="comment-box"></textarea></p>
<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
<p><input name="submit" type="submit" id="submit" class="btnComment" tabindex="5" value="Add Comment &raquo;" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>