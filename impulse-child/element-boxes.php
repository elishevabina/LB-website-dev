<!--this template has been changed in impulse-child.  Specifically: 
1.reduce number of "boxes" to 2 and change each box's outside div class to "six columns"
2. Remove box heads.
3. Comment out "read more"
4. add do_shortcode inside the box_text so that it can parse shortcodes (to display slideshow)
-->

			<?php for ($i = 1; $i <= 2; $i++) { ?>
		
				<div class="six columns">
				
					
				<div class="title-box">						
						
				<div class="title-head"><h1><?php if(of_get_option('box_head' . $i) != NULL)
				    { echo of_get_option('box_head' . $i);} else echo "Box heading" ?></h1></div></div>
					
					<div class="box-content">

				<?php if(of_get_option('box_text' . $i) != NULL)
				    { echo do_shortcode( of_get_option('box_text' . $i) );} ?>
					</div> <!--box-content close-->
					
				<!--<span class="read-more"><a href="<?php echo of_get_option('box_link' . $i); ?>"><?php _e('Read More' , 'impulse'); ?></a></span>-->
			
				</div><!--boxes  end-->
				
		<?php } ?>
			
	<div class="clear"></div>
