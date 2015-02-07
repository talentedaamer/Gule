<?php
/**
 * The template for displaying Category pages
 *
 * @subpackage GuleTheme
 * 
 */

get_header(); ?>

	<div id="content" class="col-md-8 col-sm-8">

		<?php if ( have_posts() ) : ?>
			<div class="alert alert-info cat-info">
				<h3 class="archive-title">
				<span class="glyphicon glyphicon-folder-close"></span>
					<?php printf( __( 'Category Archives: %s', 'gule' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				</h3>
				<?php if ( category_description() ) : // Show an optional category description ?>
					<?php echo category_description(); ?>
				<?php endif; ?>
			</div><!-- .cat info -->

			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );

			endwhile;
				gule_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>