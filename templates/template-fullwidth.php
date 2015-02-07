<?php
/**
 * Template Name: Full Width Template.
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="content" class="col-md-12 col-sm-12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #content -->

<?php get_footer(); ?>