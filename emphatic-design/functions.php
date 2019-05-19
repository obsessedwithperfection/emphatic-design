<?php
/**
 * emphatic-design functions and definitions
 * Please browse readme.txt for credits information.
 *
*/
function emphaticdesign_load_theme_textdomain() {
load_theme_textdomain( 'emphatic-design', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'emphaticdesign_load_theme_textdomain' );

function emphaticdesign_scripts() {

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
	wp_enqueue_style( 'pushcss', get_template_directory_uri() . '/js/jquery.ma.infinitypush.css');

	/*
	| Only two svg files is being used from fontawesome website. One is fa-search and another is fa-angle-up. The whole
	| fontawesome file has been removed from the theme in order to make it lightweight.
	*/
	/*wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',true );*/

	wp_enqueue_style(  'bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style(  'emphatic-design-style',get_stylesheet_uri());	
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('jquery-ui-core');	
	
	wp_enqueue_script( 'infinityjs', get_template_directory_uri() . '/js/jquery.ma.infinitypush.min.js');

	wp_enqueue_script( 'emphatic-mobile', get_template_directory_uri() . '/js/emphatic-mobile.js',array(),'',true);
	
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/emphatic-design-smoothscroll.js',array(),'',true);
}
add_action( 'wp_enqueue_scripts', 'emphaticdesign_scripts' );

function emphaticdesign_add_editor_styles() {
    add_editor_style();
}
add_action( 'admin_init', 'emphaticdesign_add_editor_styles' );

/* Registering Navigation Menus */

function emphaticdesign_menus() {
	register_nav_menus(
		array('header-menu' => __('Header Menu','emphatic-design'))
		);
	}
	add_action('widgets_init', 'emphaticdesign_menus','emphatic-design');



/* Adding theme support */

function emphaticdesign_theme_support() {
	
// Adding custom logo theme support and their credentials
	add_theme_support( 'custom-logo', array(
    'height'      => 10,
    'width'       => 10,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description', )
	) );
	
// Adding post-thumbnail theme support
	
	add_theme_support('post-thumbnails');
	
// Adding custom background support and their credentials
	$background = array(	
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'center',
    'default-position-y' => 'center',
    'default-size' => 'cover',
    'default-repeat' => 'no-repeat',
    'default-attachment' => 'fixed',
    'default-color' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
);
	add_theme_support( 'custom-background',$background);
	
// Adding custom-header theme support here.
	$cHeader = array(
    'default-image' => '',
    'random-default' => false,
    'width' => 100,
    'height' => 44,
    'flex-height' => true,
    'flex-width' => true,
    'default-text-color' => '',
    'header-text' => false,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => false,
    'video-active-callback' => 'is_front_page',
);

	add_theme_support('custom-header',$cHeader);

// Adding automatic-feed-links theme support
	add_theme_support( 'automatic-feed-links' );

// Adding html5 theme support and their credentials
	add_theme_support( 'html5', array(
	'comment-form',
	'gallery',
	'caption',
	) );

// Adding title-tag theme support
	add_theme_support('title-tag','emphatic-design');
}
add_action('after_setup_theme', 'emphaticdesign_theme_support');

// Dynamic contents
function emphaticdesign_header_index() { ?>
	<div class="container-fluid featured-image" style="background:url(<?php echo esc_url(get_header_image()); ?>);background-size:cover;">
	</div>
<?php }

add_action('emphaticdesign_index_header', 'emphaticdesign_header_index');

function emphaticdesign_header_thumbnail() { ?>
	<div class="container-fluid featured-image" style="background: url(<?php 
	echo esc_url(get_the_post_thumbnail_url()); ?>);background-size: cover;overflow: hidden;" ></div>	
<?php }

add_action('emphaticdesign_thumbnail', 'emphaticdesign_header_thumbnail');


//Incorpation of directories


require get_template_directory() . '/inc/colors.php'; //Colors addition in Customizer appearance.

require get_template_directory() . '/inc/widgets.php'; // Widgets addition in Customizer appearance.
