<?php
/**
 * The template for displaying the footer
 *
 * @subpackage GuleTheme
 *
 */
?>
	</div><!-- #main .wrapper -->
</section> <!-- #container wrapper -->  

	<footer class="copy-rights" role="contentinfo">
		<div class="col-md-12 copy-wrap">
	    <p>  
	      <?php esc_attr_e( '&copy;', 'gule' ); ?> <?php date( 'Y' ); ?>
	       <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	        <?php bloginfo( 'name' ); ?>
	      </a>
	      <?php printf( '- Theme By : ', 'gule' ); ?> 
	      <a href="<?php echo esc_url( __( 'http://oopthemes.com/', 'gule' ) ); ?>" title="<?php esc_attr_e( 'OOPThemes', 'gule' ); ?>"> 
	          <?php printf( 'OOPThemes', 'gule' ); ?> 
	      </a>
		</p>
		</div><!-- .site-info -->
	</footer><!-- #copy -->

<?php wp_footer(); ?>
</body>
</html>