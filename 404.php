<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="error404 alert alert-danger">
				<header class="post-header">
					<h1 class="error-title">
						<span class="glyphicon glyphicon-bullhorn"></span>
						<?php _e( '404', 'gule' ); ?>
					</h1>
				</header> <!-- .post-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gule' ); ?></p>
					
					<div class="col-lg-6 search-wrap">
						<?php get_search_form(); ?>
					</div>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>