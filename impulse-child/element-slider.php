<div class="flex-container">

	<!--slideshow-->
	
	<div class="flexslider">
	 	<ul class="slides">

<?php for ($i = 1; $i <= 2; $i++) { ?>
			<li>
			    <a href="<?php echo of_get_option('slider_link'.$i); ?>">
			    <img src="<?php if(of_get_option('slider_image'.$i) != NULL){
			                   echo of_get_option('slider_image'.$i);} ?>" 
			         alt="<?php echo of_get_option('slider_head'.$i); ?>" />
			    </a>
			 
			<p class="flex-caption">
			  <?php if(of_get_option('slider_head'.$i) != NULL) { 
			       echo of_get_option('slider_head'.$i);} ?></p>
			 
			</li>
			
			<?php } ?>
		
		</ul>
</div> <!--slideshow end-->

  </div><!--flex container end-->
  
  <div class="clear"></div>	