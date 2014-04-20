
   <div class="row">
		<?php for ($i = 1; $i <= 2; $i++) { ?>
		        
             <div class="six columns element-box">
					
				<div class="title-box">						
					<?php echo '<div class="title-head" id="box-header-'.$i.'">';?>
	
				     <h1><?php if(of_get_option('box_head' . $i) != NULL)
				    { echo of_get_option('box_head' . $i);}  ?></h1>
				</div></div><!--title-box and title-head close-->
					
				<div class="box-content">
				
				<?php if(of_get_option('box_image' . $i) != NULL) : ?>
				    <img src="<?php echo of_get_option('box_image' . $i); ?>" />
				<?php endif; ?>
				
				<?php if(of_get_option('box_text' . $i) != NULL)
				    { echo do_shortcode( of_get_option('box_text' . $i) );} ?>
				
				</div> <!--box-content close-->
					
				<!--<span class="read-more"><a href="<?php echo of_get_option('box_link' . $i); ?>"><?php _e('Read More' , 'impulse'); ?></a></span>-->
			        
			</div> <!-- six columns close -->
 
		<?php } ?>
	</div> <!--first row end-->
	
	<div class="row">
	    
	    <?php for ($i = 3; $i <= 4; $i++) { ?>
	    <div class="column element-box">
	    	
	    	<div class="title-box">						
				<?php echo '<div class="title-head" id="box-header-'.$i.'">';?>
	
				     <h1><?php if(of_get_option('box_head' . $i) != NULL)
				    { echo of_get_option('box_head' . $i);}  ?></h1>
			</div></div><!--title-box and title-head close-->
					
			<div class="box-content">
			
			<?php if(of_get_option('box_image' . $i) != NULL) : ?>
 				<img src="<?php echo of_get_option('box_image' . $i);?>" />
 			<?php endif; ?>
 			
				<?php if(of_get_option('box_text' . $i) != NULL)
				    { echo do_shortcode( of_get_option('box_text' . $i) );} ?>
			</div> <!--box-content close-->
	    
	    </div><!--element-box close-->
	    <?php } ?>
	</div><!--end second "row". Because the element boxes inside aren't standard
	columns, this won't necessarily display as one row.-->
			
	<!--<div class="clear"></div>-->
