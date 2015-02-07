<?php
/*
 * Action hooks for Post/Index/Blog entry header & Footer
 * Entry Header	: 	Post Date
 *					Post Author
 *					Comments/Leave Comment
 * Entry Footer	:	Categories
 *					Post Tags
 *
 * Action hooks for Recent post widget
 * 1 - Recent Post posted Date
 * 2 - Recent Post Comments
 *
 * Action Hook for Header Logo
 * Hooked in	:	Header-layout-1,
 *					Header-layout-2,
 *					Header-layout-3
 */

/*-----------------------------------------------------------------------------------*/
/* Opening markup for Entry Header */
/*-----------------------------------------------------------------------------------*/

function gule_entry_header_markup_open() {
	echo '<header class="entry-header panel-heading">';
}
add_action( 'gule_entry_header', 'gule_entry_header_markup_open', 5 );

/*-----------------------------------------------------------------------------------*/
/* Posted date on Index/Post */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_do_posted_on' ) ) :
function gule_do_posted_on() {

	printf( __( '<span class="published-date"><span class="el-icon-calendar"></span> <a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', 'gule' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'gule_entry_header', 'gule_do_posted_on', 6 );
endif;

/*-----------------------------------------------------------------------------------*/
/* Post Author on Index/Post */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_do_post_author' ) ) :
function gule_do_post_author() {

	printf( __( '<span class="byline"><span class="el-icon-user"></span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'gule' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'gule' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
add_action( 'gule_entry_header', 'gule_do_post_author', 7 );
endif;

/*-----------------------------------------------------------------------------------*/
/* Comments/Leave a comment on Index/Post */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_do_post_comments_link' ) ):
function gule_do_post_comments_link() {

	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="comments-link">
			<span class="el-icon-comment"></span>
			<?php comments_popup_link( __( ' Leave a comment', 'gule' ), __( ' 1 Comment', 'gule' ), __( ' % Comments', 'gule' ) ); ?>
		</span>
	<?php }
}
add_action( 'gule_entry_header', 'gule_do_post_comments_link', 8 );
endif;

/*-----------------------------------------------------------------------------------*/
/* Closing markup for Entry Header */
/*-----------------------------------------------------------------------------------*/

function gule_entry_header_markup_close() {
	echo '</header>';
}
add_action( 'gule_entry_header', 'gule_entry_header_markup_close', 9 );

/*-----------------------------------------------------------------------------------*/
/* List of categories on Index/Post */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_do_post_categories' ) ):
function gule_do_post_categories() {

	$post_categories = get_the_category();
	if ( $post_categories ) {

		echo '<span class="cat-links"><span class="glyphicon glyphicon-folder-open"></span> ';
		$num_categories = count( $post_categories );
		$category_count = 1;

		foreach ( $post_categories as $category ) {
			$html_before = '<a href="' . get_category_link( $category->term_id ) . '" class="cat-text">';
			$html_after = '</a>';

			if ( $category_count < $num_categories )
				$sep = ', ';
			elseif ( $category_count == $num_categories )
				$sep = '';
				echo $html_before . $category->name . $html_after . $sep;
				$category_count++;
			}
		echo '</span>';
	}
}
add_action( 'gule_entry_footer', 'gule_do_post_categories', 6 );
endif;

/*-----------------------------------------------------------------------------------*/
/* List post tags on Index/Posts */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_do_post_tags' ) ):
function gule_do_post_tags() {


	$post_tags = get_the_tags();
	if ( $post_tags ) {

		echo '<span class="tags-links"><span class="glyphicon glyphicon-tag"></span> ';
		$num_tags = count( $post_tags );
		$tag_count = 1;

		foreach( $post_tags as $tag ) {
			$html_before = '<a href="' . get_tag_link($tag->term_id) . '" rel="tag nofollow" class="tag-text">';
			$html_after = '</a>';

			if ( $tag_count < $num_tags )
				$sep = ', ';
			elseif ( $tag_count == $num_tags )
				$sep = '';

			echo $html_before . $tag->name . $html_after . $sep;
			$tag_count++;
		}
		echo '</span>';
	}
}
add_action( 'gule_entry_footer', 'gule_do_post_tags', 7 );
endif;

/*-----------------------------------------------------------------------------------*/
/* Recent post widget date & comments Hook : gule_recent_post_widget_meta */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_recent_widget_date' ) ) :
function gule_recent_widget_date() {
	printf( __( '<span class="post-date">
					<span class="meta-icon glyphicon glyphicon-time"></span>
					<a href="%1$s" title="%2$s">
						<time class="entry-date" datetime="%3$s">%4$s</time>
					</a>
				</span>', 'gule' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'gule_recent_post_widget_meta', 'gule_recent_widget_date', 2 );
endif;

// comment link
if ( ! function_exists( 'gule_recent_widget_comments' ) ):
function gule_recent_widget_comments() {
	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="post-comment pull-right">
			<span class="meta-icon glyphicon glyphicon-comment"></span>
			<?php comments_popup_link( __( ' 0', 'gule' ), __( ' 1', 'gule' ), __( ' %', 'gule' ) ); ?>
		</span>
	<?php }
}
add_action( 'gule_recent_post_widget_meta', 'gule_recent_widget_comments', 3 );
endif;

/*-----------------------------------------------------------------------------------*/
/* Header Logo Section - hook: gule_header_logo */
/*-----------------------------------------------------------------------------------*/

add_action( 'gule_header_logo', 'gule_do_header_logo' );
function gule_do_header_logo() { ?>
    <div class="container container-center">
    	<header id="site-header" class="site-header row" role="banner">
            <hgroup class="col-md-5">
                <?php
                $header_image = get_header_image();
                if ( ! empty($header_image) ) { ?>
                <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
                  <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                </a>
                <?php } else { ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php } ?>
            </hgroup>
        </header><!-- #site header -->
    </div>
<?php }
