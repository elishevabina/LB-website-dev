<?php /* Template Name: Sidebar
With widget sidebar 
*/ ?> 


<?php get_header(); ?>

	<!--div id="subhead_container">
		
		<div class="row">

		<div class="twelve columns">
		
		 
			
			</div>	
			
	</div></div-->
	
		<!--content-->
		<div class="row" id="content_container">
		
		
		<?php get_template_part( 'navigation' ); ?>
		
		
			<!--middle col--><div class="seven columns">
		
				<div id="middle-col">
					<?php get_template_part( 'breadcrumbs' ); ?>
		            <h1><?php the_title(); ?></h1> 

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="post-entry">

						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'impulse' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->
					
					<!--?php comments_template( '', true ); ?-->

<?php endwhile; ?>
	</div> <!--middle-col end-->

</div> <!--column end-->

	<?php get_sidebar(); ?>

</div>
<!--content end-->
		

<?php get_footer(); ?>