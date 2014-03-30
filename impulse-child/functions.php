<?php

/** Tell WordPress to run impulse_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'impulse_setup' );

if ( ! function_exists( 'impulse_setup' ) ):

function impulse_setup() {

	 global $content_width;
	 
     if (!isset($content_width))
            $content_width = 620;

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );	
	
	// Add support for custom backgrounds
	$args = array(
	'default-color' => 'ffffff',
	'wp-head-callback' => '_custom_background_cb'
);
add_theme_support( 'custom-background', $args );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'impulse', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
	// This theme uses wp_nav_menu() in two location.	
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'impulse' ),
	) );

	// Add support for woocommerce
	$template = get_option( 'template' );
	update_option( 'woocommerce_theme_support_check', $template );
	add_theme_support( 'woocommerce' );

}
endif;
?>
<?php
function impulse_list_pings($comment, $args, $depth) { 
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'impulse_comment_count', 0);
function impulse_comment_count( $count ) {
	if ( ! is_admin() ) {
	global $id;
	$get_comments_status= get_comments('status=approve&post_id=' . $id);
	$comments_by_type = separate_comments($get_comments_status);
	return count($comments_by_type['comment']);
} else {
return $count;
}
}
?>
<?php
if ( ! function_exists( 'impulse_comment_callback' ) ) :
function impulse_comment_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'impulse' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'impulse' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'impulse' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'impulse' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'impulse' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'impulse'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override impulse_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 */
function impulse_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'impulse' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'impulse' ),
		'before_widget' => '<div id="%1$s" class="widget-container-primary %2$s">',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
	
	// Area 2, located at the right sidebar.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'impulse' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'impulse' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
	
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'impulse' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'impulse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'impulse' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'impulse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'impulse' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'impulse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
if ( ! function_exists( 'impulse_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own impulse_posted_on to override in a child theme
 *
 */
function impulse_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'impulse' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'impulse' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/** Register sidebars by running impulse_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'impulse_widgets_init' );

/** Excerpt */
function impulse_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'impulse_excerpt_length' );

function impulse_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'impulse_auto_excerpt_more' );


/** filter function for wp_title */
function impulse_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'impulse_filter_wp_title', 10, 3 );

// custom function
function impulse_of_analytics(){
$googleanalytics= of_get_option('go_code');
echo stripslashes($googleanalytics);
}
add_action( 'wp_footer', 'impulse_of_analytics' );

function impulse_favicon() {
	if (of_get_option('favicon_image') != '') {
	echo '<link rel="shortcut icon" href="'. of_get_option('favicon_image') .'"/>'."\n";
	}
}

add_action('wp_head', 'impulse_favicon');

// custom function
/*-----------------------------------------------------------------------------------*/
/* Exclude categories from displaying on the "Blog" page template.
/*-----------------------------------------------------------------------------------*/

// Exclude categories on the "Blog" page template.
add_filter( 'impulse_blog_template_query_args', 'impulse_exclude_categories_blogtemplate' );

function impulse_exclude_categories_blogtemplate ( $args ) {

	if ( ! function_exists( 'impulse_prepare_category_ids_from_option' ) ) { return $args; }

	$excluded_cats = array();

	// Process the category data and convert all categories to IDs.
	$excluded_cats = impulse_prepare_category_ids_from_option( 'exclude_cat' );


	if ( count( $excluded_cats ) > 0 ) {

		// Setup the categories as a string, because "category__not_in" doesn't seem to work
		// when using query_posts().

		foreach ( $excluded_cats as $k => $v ) { $excluded_cats[$k] = '-' . $v; }
		$cats = join( ',', $excluded_cats );

		$args['cat'] = $cats;
	}

	return $args;

}

/*-----------------------------------------------------------------------------------*/
/* impulse_prepare_category_ids_from_option()
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'impulse_prepare_category_ids_from_option' ) ) {

	function impulse_prepare_category_ids_from_option ( $option ) {

		$cats = array();

		$stored_cats = of_get_option( $option );

		$cats_raw = explode( ',', $stored_cats );

		if ( is_array( $cats_raw ) && ( count( $cats_raw ) > 0 ) ) {
			foreach ( $cats_raw as $k => $v ) {
				$value = trim( $v );

				if ( is_numeric( $value ) ) {
					$cats_raw[$k] = $value;
				} else {
					$cat_obj = get_category_by_slug( $value );
					if ( isset( $cat_obj->term_id ) ) {
						$cats_raw[$k] = $cat_obj->term_id;
					}
				}

				$cats = $cats_raw;
			}
		}

		return $cats;

	}

}

function impulse_date_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s', 'impulse' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}

function impulse_of_register_js() {
	if (!is_admin()) {
		
		wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery', '1.0', TRUE);
		wp_register_script('impulse_custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery', '1.0', TRUE);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', TRUE);
		wp_register_script('selectnav', get_template_directory_uri() . '/js/selectnav.js', 'jquery', '0.1', TRUE);
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', 'jquery', '2.1', TRUE);
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', 'jquery', '2.6.1', false);
		wp_register_script('responsive', get_template_directory_uri() . '/js/responsive-scripts.js', 'jquery', '1.2.1', TRUE);
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('superfish');
		wp_enqueue_script('impulse_custom');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('flexslider');		
		wp_enqueue_script('selectnav');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('responsive');
	}
}
add_action('init', 'impulse_of_register_js');

function impulse_of_single_scripts() {
	if(is_singular()) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments 
}
add_action('wp_print_scripts', 'impulse_of_single_scripts');

function impulse_of_styles() {
		wp_register_style( 'superfish', get_template_directory_uri() . '/css/superfish.css' );
		wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
		wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );

		
		wp_enqueue_style( 'superfish' );
		wp_enqueue_style( 'flexslider' );		
		wp_enqueue_style( 'foundation' );		
		
}
add_action('wp_print_styles', 'impulse_of_styles');

// WooCommerce

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'impulse_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'impulse_wrapper_end', 10);

function impulse_wrapper_start() {
  echo '	<div id="subhead_container">
		<div class="row">
		<div class="twelve columns">
		<h1><?php the_title(); ?>
  </h1>
  </div>
  </div>
  </div>
  <!--content-->
  <div class="row" id="content_container"> 
    <!--left col-->
    <div class="eight columns">
      <div id="left-col">
        <div class="post-entry">';
}
          
function impulse_wrapper_end() {
          echo '
          <div class="clear"></div>
          ';
          wp_link_pages( array( 'before' => '' . __( 'Pages:', 'impulse' ), 'after' => '' ) );
          echo ' </div>
        <!--post-entry end--> 
      </div>
      <!--left-col end--> 
    </div>
    <!--column end-->';
    get_sidebar();
    echo '</div>
  <!--content end-->';
}

// include panel file.
if ( !function_exists( 'optionsframework_init' ) ) {

	/*-----------------------------------------------------------------------------------*/
	/* Options Framework Theme
	/*-----------------------------------------------------------------------------------*/

	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

	if ( get_stylesheet_directory() == get_template_directory_uri() ) {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	}

	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}