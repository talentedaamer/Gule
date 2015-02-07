<?php
/**
 * The template for displaying image attachments
 *
 * @subpackage GuleTheme
 *
 */

get_header(); ?>

<div id="content" class="col-md-8 col-sm-8">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment well' ); ?>>

			<?php
			$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
			foreach ( $attachments as $k => $attachment ) :
				if ( $attachment->ID == $post->ID )
					break;
			endforeach;
			$k++;
			// If there is more than 1 attachment in a gallery
			if ( count( $attachments ) > 1 ) :
				if ( isset( $attachments[ $k ] ) ) :
					// get the URL of the next image attachment
					$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
				else :
					// or get the URL of the first image attachment
					$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
				endif;
			else :
				// or, if there's only 1 image, get the URL of the image
				$next_attachment_url = wp_get_attachment_url();
			endif;
			?>
			<div class="entry-content panel-body">
			<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
			$attachment_size = apply_filters( 'gule_attachment_size', array( 960, 960 ) );
			echo wp_get_attachment_image( $post->ID, $attachment_size );
			?></a>
			</div>
			<?php if ( ! empty( $post->post_excerpt ) ) : ?>
			<?php endif; ?>

			<div class="caption panel-body">
				<header class="post-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<footer class="entry-meta">
						<?php
							$metadata = wp_get_attachment_metadata();
							printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'gule' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( wp_get_attachment_url() ),
								$metadata['width'],
								$metadata['height'],
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
								get_the_title( $post->post_parent )
							);
						?>
						<?php edit_post_link( __( 'Edit', 'gule' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->

				</header><!-- .post-header -->

				<?php the_excerpt(); ?>
				
				<div class="entry-description">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gule' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-description -->

				<ul class="pager">
					<li><?php previous_image_link( false, __( '&larr; Previous', 'gule' ) ); ?></li>
					<li><?php next_image_link( false, __( 'Next &rarr;', 'gule' ) ); ?></li>
				</ul>
				
			</div> <!-- end caption -->

		</article><!-- #post -->

		<?php comments_template(); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>