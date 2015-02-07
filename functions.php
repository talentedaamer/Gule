<?php

/**
 *
 * Theme Main Functions file. Theme main functions are located here.
 * other files are included inside this file.
 *
 */

/*-----------------------------------------------------------------------------------*/
/* set theme content width */
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 780; // pixels

/*-----------------------------------------------------------------------------------*/
/* Custom Header Support */
/*-----------------------------------------------------------------------------------*/

$header_args = array(
    'default-image'          => get_template_directory_uri() . '/images/logo.png',
    'random-default'         => false,
    'width'                  => 200,
    'height'                 => 60,
    'flex-height'            => false,
    'flex-width'             => false,
    'header-text'            => false,
    'uploads'                => true,
);
add_theme_support( 'custom-header', $header_args );

/*-----------------------------------------------------------------------------------*/
/* custom Background support */
/*-----------------------------------------------------------------------------------*/

$background_args = array(
    'default-color'  => 'f0f0f0',
    'default-image'  => get_template_directory_uri() . '/images/pattern.png',
);
add_theme_support( 'custom-background', $background_args );

/*-----------------------------------------------------------------------------------*/
/* Path to Template directory */
/*-----------------------------------------------------------------------------------*/

$template_directory = get_template_directory();

/*-----------------------------------------------------------------------------------*/
/* include other function files */
/*-----------------------------------------------------------------------------------*/

require( $template_directory . '/inc/wp_bootstrap_navwalker.php');
require( $template_directory . '/inc/widget-areas.php' );
require( $template_directory . '/inc/theme-widgets.php' );
require( $template_directory . '/inc/template-tags.php' );

/*-----------------------------------------------------------------------------------*/
/* theme setup */
/*-----------------------------------------------------------------------------------*/

function gule_theme_setup() {


	/* Rss Feed in site head */
	add_theme_support( 'automatic-feed-links' );


	/* theme post format support */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
		)
	);

	/* register menus */
	add_action( 'init', 'gule_register_menus' );
	function gule_register_menus() {
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'gule' ),
			)
		);
	}

	/* Add Thumbnail support */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'recent-posts', 70, 70, true );

	/* Add editor style.*/
	add_editor_style();

}
add_action( 'after_setup_theme', 'gule_theme_setup' );

/*-----------------------------------------------------------------------------------*/
/* Register Scripts & Styles */
/*-----------------------------------------------------------------------------------*/

add_action('init', 'gule_reg_scripts');
function gule_reg_scripts() {
	// register styles
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 'style');
	wp_register_style('elusive-webfont', get_template_directory_uri() . '/css/elusive-webfont.css', 'style');
	wp_register_style('style', get_template_directory_uri() . '/style.css');
	// register scripts
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_register_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', 'jquery');
    wp_register_script('respond', get_template_directory_uri() . '/js/respond.min.js', 'jquery');
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue Scripts & Styles */
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'gule_init_scripts');
function gule_init_scripts() {
	// enqueue styles
	wp_enqueue_style( 'bootstrap');
	wp_enqueue_style( 'elusive-webfont');
	wp_enqueue_style( 'style');
	// enquene scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
}

/*-----------------------------------------------------------------------------------*/
/* Conditional Scripts */
/*-----------------------------------------------------------------------------------*/

add_action('template_redirect', 'gule_cond_scripts');
function gule_cond_scripts() {
	global $is_IE;

	if ( $is_IE ) {
		wp_enqueue_script('html5shiv');
		wp_enqueue_script('respond');
    }

	// load comment-reply on single
	if ( is_singular() ) wp_enqueue_script('comment-reply');
}


/*-----------------------------------------------------------------------------------*/
/* WP_TITLE filter */
/*-----------------------------------------------------------------------------------*/

function gule_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'gule' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'gule_wp_title', 10, 2 );


/*-----------------------------------------------------------------------------------*/
/* content nav below */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_content_nav' ) ) :
function gule_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav class="next-prev">
		<ul id="<?php echo $html_id; ?>" class="pager" role="navigation">
			<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'gule' ) ); ?></li>
			<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'gule' ) ); ?></li>
		</ul><!-- #<?php echo $html_id; ?> .navigation -->
	</nav>
	<?php endif;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Comments and Pingbacks */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_comment' ) ) :
function gule_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'gule' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'gule' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'gule' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'gule' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'gule' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'gule' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for gule_comment()

/*-----------------------------------------------------------------------------------*/
/* Comment Reply Link */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gule_comment_reply_link' ) ):
// Style comment reply links as buttons
function gule_comment_reply_link( $link ) {
	return str_replace( 'comment-reply-link', 'btn btn-default btn-xs', $link );
}
add_filter( 'comment_reply_link', 'gule_comment_reply_link' );
endif;

/*-----------------------------------------------------------------------------------*/
/* Numbered pagination blog/index/serch etc pages */
/*-----------------------------------------------------------------------------------*/

function gule_pagination_nav($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

    if(1 != $pages) {
		echo "<div class='pagination-wrap'><ul class='pagination'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages)
			echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
		if($paged > 1 && $showitems < $pages)
			echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages)
			echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
		if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages)
			echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
		echo "</ul></div>";
	}
}

/*-----------------------------------------------------------------------------------*/
/* Password protected post form */
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_password_form', 'gule_password_form' );
function gule_password_form() {
	global $post;
	$label = 'password-'.( empty( $post->ID ) ? rand() : $post->ID );
	$password_form = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
    '.__('<p>This post is password protected. To view it please enter your password below:</p>', 'gule').'
    <div class="protected-form input-group has-info col-md-6">
        <input class="form-control" value="' . get_search_query() . '" name="post_password" id="' . $label . '" type="password">
        <span class="input-group-btn"><button type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="Submit"><span class="glyphicon glyphicon-lock"></span></button>
        </span>
    </div>
</form>';
	return $password_form;
}