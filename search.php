<?php
/**
 * The template for displaying Search Results pages
 *
 * @subpackage GuleTheme
 * 
 */

get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">

		<?php if ( have_posts() ) : ?>

			<div class="alert alert-info search-info">
				<h3 class="page-title">
				<span class="glyphicon glyphicon-search"></span>
					<?php printf( __( 'Search Results for: %s', 'gule' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h3>
			</div>

			<?php gule_pagination_nav(); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php gule_pagination_nav(); ?>

		<?php else : ?>

			<article id="post-0" class="no-results not-found alert alert-danger">
				<header class="post-header">
					<h1 class="search-title">
						<span class="icon-bullhorn"></span>
						<?php _e( 'Nothing Found', 'gule' ); ?>
					</h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'gule' ); ?></p>
					<div class="col-lg-6 search-wrap">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>