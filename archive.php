<?php
/**
 * The template for displaying Archive pages
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">

		<?php if ( have_posts() ) : ?>
			<section class="archive-header cat-info alert alert-info">
				<h3 class="archive-title">
				<span class="el-icon-calendar"></span>
				<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'gule' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'gule' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'gule' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'gule' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'gule' ) ) . '</span>' );
					else :
						_e( 'Archives', 'gule' );
					endif;
				?></h3>
			</section><!-- .archive-header -->

			<?php /* Start the Loop */

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