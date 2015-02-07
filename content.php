<?php
/**
 * The default template for displaying content
 *
 *
 * @subpackage GuleTheme
 *
 */
?>
	<?php
		$post_class = array ('well');
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="post-format-icon">
			<span class=" el-icon-paper-clip" title="Featured Post"></span>
		</div>
		<?php endif; ?>
		<header class="post-header">
			<?php if ( is_singular() ) : ?>
				<h1 class="entry-title panel-heading"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="entry-title panel-heading">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; // is_single() ?>
			<?php do_action('gule_entry_header'); ?>
		</header><!-- .post-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary panel-body">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<?php elseif ( is_home() ) : ?>
		<div class="entry-content panel-body">
			<?php if ( '' != get_the_post_thumbnail() ) { ?>
				<div class="thumbnail">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
			<?php } ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gule' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gule' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php else : ?>
		<div class="entry-content panel-body">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gule' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'gule' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta panel-footer">
			<?php do_action('gule_entry_footer'); ?>
			<?php edit_post_link( __( 'Edit', 'gule' ), '<span class="edit-link label"><span class="el-icon-edit"></span> ', '</span>' ); ?>
		</footer><!-- .entry-meta -->	
	</article><!-- #post -->
	<?php if ( is_single() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php printf( __( 'About %s', 'gule' ), get_the_author() ); ?>
			</div> <!-- end panel heading -->	
			<div class="panel-body">
			<div class="author-avatar thumbnail">
				<?php
				/** This filter is documented in author.php */
				$author_bio_avatar_size = apply_filters( 'GuleTheme_author_bio_avatar_size', 68 );
				echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
			</div><!-- .author-avatar -->
			<div class="author-description">
				<p><?php the_author_meta( 'description' ); ?></p>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'gule' ), get_the_author() ); ?>
					</a>
				</div><!-- .author-link	-->
			</div><!-- .author-description -->
			</div> <!-- end panel body -->
		</div><!-- .panel -->
	<?php endif; ?>