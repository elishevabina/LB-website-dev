<?php get_header(); ?>

<?php if(!is_front_page()) { ?>

	<div id="subhead_container">
		
		<div class="row">

		<div class="twelve columns">
		
<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo (__( 'Archives for ', 'impulse' )); single_tag_title();
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'impulse' )); single_month_title();
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>	
			
	</div></div>
	
<?php } ?>


<!-- slider.  Display set to "none" via css; leaving this here just cause.-->
<?php if(is_front_page()) { ?>

<?php if(of_get_option('slider_boolean') != "off") { ?>
<div id="slider_container">

	<div class="row">

		<div class="twelve columns">
	
			<?php get_template_part( 'element-slider', 'index' ); ?>

		</div>
	</div>
</div>

<?php } } ?> <!-- slider end -->


<!--welcome:  moved to above the boxes. whole div only displays if there is a welcome text or button-->
	<?php if((of_get_option('welcome_text') != NULL) or (of_get_option('welcome_button') != NULL) ): ?> 
	<div class="row" id="welcome_container">
<hr />
		<div class="nine columns">
		
	<h1><?php { echo of_get_option('welcome_text');} ?></h1></div>
	
	<div class="three columns"><?php if(of_get_option('welcome_button') != NULL){ ?> 
	<a class="button large" href="<?php if(of_get_option('welcome_button_link') != NULL){ echo of_get_option('welcome_button_link');} ?>"><?php echo of_get_option('welcome_button'); ?></a> 
	<?php } else { }?> </div>
</div>
<?php endif;?> <!--welcome end--> 


<!-- home boxes-->
<?php if(is_front_page()) { ?>
	
	<div class="row" id="box_container">

	    <?php get_template_part( 'navigation' ); ?> 
	    <!--?php the_widget( 'WP_Nav_Menu_Widget' ); ?-->

        <div class="ten columns">
			<?php get_template_part( 'element-boxes', 'index' ); ?>
		</div>
		
		
	</div>

    
<!-- home boxes end -->


<div class="clear"></div>
<?php } ?> 
<!--content-->

<?php if(of_get_option('blog_home') != "off" || (!is_front_page())) { ?>

		<div class="row" id="content_container">
				
	<!--left col--><div class="eight columns">
	
		<div id="left-col">
			
			<?php get_template_part( 'loop', 'index' ); ?>

	</div> <!--left-col end-->
</div> <!--column end-->

<?php get_sidebar(); ?>

</div>
<?php } ?> <!--content end-->
		

<?php get_footer(); ?>