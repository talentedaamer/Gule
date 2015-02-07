<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @subpackage GuleTheme
 *
 */
?>

	<?php
		$post_class = array ('well');
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
		<header class="gallery-header">
			<h3 class="entry-title panel-heading">
				<span class="glyphicon glyphicon-picture"></span>
				<?php if ( is_singular() ) : ?>
					<?php the_title(); ?>
				<?php else : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				<?php endif; ?>
			</h3>
			<?php do_action('gule_entry_header'); ?>
		</header> <!-- link-header -->

		<div class="entry-content panel-body">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gule' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta panel-footer">
			<?php do_action('gule_entry_footer'); ?>
			<?php edit_post_link( __( 'Edit', 'gule' ), '<span class="edit-link label"><span class="el-icon-edit"></span> ', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
