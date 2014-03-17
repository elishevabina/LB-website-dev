<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title><?php wp_title('&#124;', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
<!-- move loading of stylesheet below wp_head() so that my stylesheet will trump foundation.css and superfish.css-->
<!-- but this will also make the impulse parent stylesheet trump those...but that seems more logical anyway. 
If it breaks things, that's a fault in impulse, right? -->
			
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />

	

</head>

<body <?php body_class(); ?>>
	
	<!--headercontainer-->
	<div id="header_container">
	
		<!--header-->
	<div class="row">	
		<div class="three columns">

				<?php if ( ( of_get_option('logo_image') ) != '' ) { ?>
		<div id="logo"><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php echo of_get_option('logo_image'); ?>" alt="<?php echo of_get_option('footer_cr'); ?>" /></a></div><!--logo end-->
	<?php } else { ?>
			<div id="logo2"><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo( 'name' ); ?></a></div><!--logo end-->
	<?php } ?>
			
	</div>
		</div> <!--row end.  Moved in child theme.-->
		
	<!--top menu--><!--this is inside header_container and outside row, meaning it's no longer a sibling of the logo. 
	For some reason this also seems to put it outside the border of header_container?-->
			<div class="nine columns" id="menu_container" >
		
		<?php $navcheck = '' ; ?>
	
	<?php $navcheck = wp_nav_menu( array( 'container_class' => 'menu-header2', 'theme_location' => 'primary' , 'menu_id' => 'nav', 'fallback_cb' => '', 'echo' => false ) ); ?>

 <?php  if ($navcheck == '') { ?>
	
	<ul id="nav">
		<li class="page_item"><a href="<?php echo esc_url(home_url()); ?>" title="Home">Home</a></li>				
		<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>

	</ul>
<?php } else echo($navcheck); ?>  

	</div>
	
	
	
		
	</div><!--header container end-->	
			
	