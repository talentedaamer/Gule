<?php
/**
 * The template for displaying all pages
 *
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="content" class="col-md-8 col-sm-8">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_sidebar('page'); ?>
<?php get_footer(); ?>