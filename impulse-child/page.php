<?php get_header(); ?>

	<!--div id="subhead_container">
		
		<div class="row">

		<div class="twelve columns">
		
		 
			
			</div>	
			
	</div></div-->
	
		<!--content-->
		<div class="row" id="content_container">
		<?php get_sidebar(); ?>
			
			<!--right col--><div class="eight columns">
		
				<div id="left-col">
		            <h1><?php the_title(); ?></h1> 

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="post-entry">

						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'impulse' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->
					
					<!--?php comments_template( '', true ); ?-->

<?php endwhile; ?>
	</div> <!--left-col end-->
</div> <!--column end-->



</div>
<!--content end-->
		

<?php get_footer(); ?>