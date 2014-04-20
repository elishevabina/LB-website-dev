<!--this template has been changed in impulse-child.  Specifically: 
1.reduce number of "boxes" to 2 and change each box's outside div class to "five columns"
2. Remove box heads.
3. Comment out "read more"
-->
  
		<?php for ($i = 1; $i <= 4; $i++) { ?>
		  
			<?php if ($i==1 or $i==3) : ?>
                  <div class="row">
            <?php endif; ?>
                
             <div class="six columns element-box">
					
				<div class="title-box">						
					<?php echo '<div class="title-head" id="box-header-'.$i.'">';?>
	
				     <h1><?php if(of_get_option('box_head' . $i) != NULL)
				    { echo of_get_option('box_head' . $i);}  ?></h1>
				</div></div><!--title-box and title-head close-->
					
				<div class="box-content">
				<img src="<?php if(of_get_option('box_image' . $i) != NULL){ 
				 					echo of_get_option('box_image' . $i);}?>" />
				<?php if(of_get_option('box_text' . $i) != NULL)
				    { echo do_shortcode( of_get_option('box_text' . $i) );} ?>
				</div> <!--box-content close-->
					
				<!--<span class="read-more"><a href="<?php echo of_get_option('box_link' . $i); ?>"><?php _e('Read More' , 'impulse'); ?></a></span>-->
			        
			</div> <!-- five columns close -->
				
                <?php if ($i==2 or $i==4) : ?> <!--put boxes 3&4 on separate line-->
                    </div> <!--row close-->  
                <?php endif; ?> 
 
				
		<?php } ?>
	
			
	<!--<div class="clear"></div>-->
