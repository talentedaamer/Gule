<?php
/**
 * The template for displaying Comments.
 *
 *
 * @subpackage GuleTheme
 *
 */

if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="comments-area">
	<div class="alert alert-info">
		<h2 class="comments-title">
			<?php
			printf( _nx( '<span class="badge">1</span> Thought on &ldquo;%2$s&rdquo;', '<span class="badge">%1$s</span> Thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'gule' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
	</div>
		<ul class="comment-list">
		<?php
			wp_list_comments( array(
				'callback' => 'gule_comment',
				) );
		?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<ul class="pager">
					<li class="pull-right"><?php previous_comments_link( __( 'Older Comments &raquo;', 'gule' ) ); ?></li>
					<li class="pull-left"><?php next_comments_link( __( '&laquo; Newer Comments', 'gule' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	</div><!-- #comments -->
<?php endif; // have_comments() ?>

<?php
// If comments are closed and there are comments
if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<div class="alert alert-info"><?php _e( 'Comments are closed.', 'gule' ); ?></div>
<?php endif;

$args = array(
	'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="12" aria-required="true"></textarea></p>',
	'fields'        => array(
		'author' => '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input class="form-control input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true"></p>',
		'email'  => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input class="form-control input-comment-email" id="email" name="email" type="text" value="" size="30" aria-required="true"></p>',
		'url'    => '<p class="comment-form-url"><label for="url">Website</label> <input class="form-control input-comment-url" id="url" name="url" type="text" value="" size="30"></p>',
	),
	'cancel_reply_link' => '<button class="btn btn-danger btn-xs">Cancel reply</button>',
	'label_submit' => 'Post Comment',

);
	ob_start();
	comment_form( $args );
	$form = ob_get_clean(); 
	$form = str_replace('class="comment-form"','class="comment-form my-class"', $form);
	echo str_replace('id="submit"','class="btn btn-primary"', $form);
?>
