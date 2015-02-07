<?php
/**
 * The template for displaying Author Archive pages
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

	<div id="content" class="col-md-8 col-sm-8">
		<?php if ( have_posts() ) : ?>
			<?php the_post(); ?>

			<section class="author-header  alert alert-info">
				<h3 class="author-title">
				<span class="el-icon-user"></span>
					<?php printf( __( 'Author Archives: %s', 'gule' ), '<span class="vcard">
						<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
				</h3>
			</section><!-- .author-header -->

			<?php rewind_posts(); ?>

			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-avatar thumbnail">
					<?php
					$author_bio_avatar_size = apply_filters( 'gule_author_avatar_size', 70 );
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h3><?php printf( __( 'About %s', 'gule' ), get_the_author() ); ?></h3>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description	-->
			</div><!-- .author-info -->
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php gule_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>