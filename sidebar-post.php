<?php
/**
 * Sidebar for single post.
 *
 * @subpackage GuleTheme
 * 
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-post' ) ) : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<?php dynamic_sidebar( 'sidebar-post' ); ?>
		</div><!-- #sidebar -->
	<?php else : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<aside class="well widget">
		        <h3 class="widget-title">Single Post Sidebar</h3>
		        <p>
		          This is post sidebar. Go to widgets and add any widget to "Post Sidebar" to show on this post.
		        </p>
	        </aside>
	     </div>
	<?php endif; ?>