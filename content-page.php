<?php
/**
 * The template used for displaying page content in page.php
 *
 * @subpackage GuleTheme
 *
 */
?>

	<?php
		$post_class = array ('well');
	?>
	<article id="page-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
		<header class="page-header panel-heading">
			<h3 class="page-title"><?php the_title(); ?></h3>
		</header>

		<div class="page-content panel-body">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gule' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta panel-footer">
			<?php edit_post_link( __( 'Edit', 'gule' ), '<span class="edit-link label"><span class="el-icon-edit"></span> ', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
