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
	<article id="page-<?php the_ID(); ?>" <?php //post_class($post_class); ?>>

		<div class="page-content panel-body">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</article><!-- #post -->
