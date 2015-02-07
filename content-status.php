<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @subpackage GuleTheme
 *
 */
?>



	<?php
		$post_class = array ('well');
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
		<header class="status-header">
			<h3 class="entry-title panel-heading">
			<span class="glyphicon glyphicon-comment"></span>
				<?php _e( 'Status', 'gule' ); ?>
			</h3>
		</header>

		<div class="entry-content panel-body">
			<div class="author-avatar">
				<?php
					$status_avatar = apply_filters( 'gule_status_avatar', 48 );
					echo get_avatar( get_the_author_meta( 'ID' ), $status_avatar );
				?>
			</div>
			<?php do_action('gule_entry_header'); ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gule' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta panel-footer">
			<?php do_action('gule_entry_footer'); ?>
			<?php edit_post_link( __( 'Edit', 'gule' ), '<span class="edit-link label"><span class="el-icon-edit"></span> ', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
