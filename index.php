<?php
/**
 * The main template file
 *
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="content" class="col-md-8 col-sm-8">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php gule_pagination_nav(); ?>

		<?php else : ?>

			<article id="post-0" class="alert alert-info not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="post-header">
					<h1 class="entry-title">
						<span class="glyphicon glyphicon-bullhorn"></span>
						<?php _e( 'No posts to display', 'gule' ); ?>
					</h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'gule' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
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
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>