<?
if ($_POST['comment_post_ID'])
{
require( '../../../../wp-config.php' );
global $userdata;
      get_currentuserinfo();
$comment_post_ID = (int) $_POST['comment_post_ID'];

$status= $wpdb->get_row("SELECT post_status, comment_status FROM $wpdb->posts WHERE ID = '".$_POST['comment_post_ID']."'");
$commentCount = 1;
}

$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '".$_POST['comment_post_ID']."' ORDER BY comment_date");
	$oddcomment = 'alt';

if ($comments) : ?>
<p class="bluetext">Comentarios</p> 
	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<span><cite><?php comment_author_link() ?></cite> Says:</span>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>

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
			</div>
		</div>
