<?php
/**
 * The template for displaying Tag pages
 *
 *
 * @subpackage GuleTheme
 * 
 */

get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">

		<?php if ( have_posts() ) : ?>
			<header class="tag-header alert alert-info tag-info">
				<h3 class="archive-title">
					<span class="glyphicon glyphicon-tag"></span>
					<?php printf( __( 'Tag Archives: %s', 'gule' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
				</h3>
				<?php if ( tag_description() ) : // Show an optional tag description ?>
					<?php echo tag_description(); ?>
				<?php endif; ?>
			</header><!-- .alert -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

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