<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @subpackage GuleTheme
 *
 */
?>

	<article id="post-0" class="post no-results not-found  alert alert-danger">
		<header class="post-header">
			<h1 class="entry-title">
				<span class="glyphicon glyphicon-bullhorn"></span>
				<?php _e( 'Nothing Found', 'gule' ); ?>
			</h1>
		</header>

		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'gule' ); ?></p>
			<div class="col-lg-6 search-wrap">
				<?php get_search_form(); ?>
			</div>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
