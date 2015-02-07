<?php
/**
 * Sidebar for single page.
 *
 * @subpackage GuleTheme
 * 
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<?php dynamic_sidebar( 'sidebar-page' ); ?>
		</div><!-- #sidebar -->
	<?php else : ?>
		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<aside class="well widget">
		        <h3 class="widget-title">Single Page Sidebar</h3>
		        <p>
		          This is Page sidebar. Go to widgets and add any widget to "Page Sidebar" to show on this page.
		        </p>
	        </aside>
	     </div>
	<?php endif; ?>