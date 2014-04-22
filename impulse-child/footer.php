	<!--footer-->
		
		<div id="footer-container">

	<!--footer container--><div class="row">
		
		<div class="twelve columns" id="footer-widget">
			
			<?php
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
			
		</div><!-- footer container-->
					
	</div>
	
			<div id="footer-info">

				<!--footer container--><div class="row">
				
		<div class="twelve columns">					
			
			<div id="copyright">&copy; <?php echo date( 'Y' ); ?>
			<?php echo of_get_option('footer_cr'); ?> | 
			<?php _e( 'Powered by', 'impulse' ); ?> 
			<a href="http://www.wordpress.org">WordPress</a> 
			with some help from <a href="http://www.antthemes.com">AntThemes</a>
			 | Website issues? Contact <a href="mailto:webmaster@limmudboston.org">webmaster@limmudboston.org</a>
			</div>
			<div class="scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'impulse' ); ?>"><?php _e( '&uarr;', 'impulse' ); ?></a></div>
					
				</div>	
			</div>		
			</div><!--footer info end-->
	
	<?php wp_footer(); ?>

</body>

</html>