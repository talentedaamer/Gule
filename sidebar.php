<?php
/**
 * The sidebar containing the main widget area
 *
 * @subpackage GuleTheme
 * 
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<?php dynamic_sidebar( 'sidebar-main' ); ?>
		</div><!-- #sidebar -->
	<?php else : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<aside class="well widget">
		        <h3 class="widget-title">Main Sidebar</h3>
		        <p>
		          This is main sidebar. Go to widgets and add any widget to "Main Sidebar" to show on this page.
		        </p>
	        </aside>
	     </div>
	<?php endif; ?>