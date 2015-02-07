<?php
/**
 * The Template for displaying all single posts
 *
 * @subpackage GuleTheme
 * 
 */
get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<nav class="next-prev">
					<ul class="pager">
						<li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'gule' ) . '</span> %title' ); ?></li>
						<li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'gule' ) . '</span>' ); ?></li>
					</ul><!-- .pagination -->
				</nav>
				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_sidebar('post'); ?>
<?php get_footer(); ?>