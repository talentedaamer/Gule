<?php
/**
 * all widget areas - sidebars registered in the theme
 */

// THEME SIDEBARS/WIDGET AREAS
function gule_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'gule' ),
		'id' => 'sidebar-main',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'gule' ),
		'before_widget' => '<aside id="%1$s" class="well widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// single page sidebar widget
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'gule' ),
		'id' => 'sidebar-page',
		'description' => __( 'Appears on pages except the optional Front Page template, which has its own widgets', 'gule' ),
		'before_widget' => '<aside id="%1$s" class="well widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// single post sidebar widget
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'gule' ),
		'id' => 'sidebar-post',
		'description' => __( 'Appears on posts except the optional Front Page template, which has its own widgets', 'gule' ),
		'before_widget' => '<aside id="%1$s" class="well widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'gule_widgets_init' );