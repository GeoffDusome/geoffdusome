<?php 
/* --------------------------------------------------------------------------------
	GLOBAL VARIABLES
================================================================================== */
$theme_version = '2.58';

// INIT SESSION VARIABLE
if ( ! isset( $_SESSION ) )
{
	session_start();
}

/* --------------------------------------------------------------------------------
	REQUIRED FILES
================================================================================== */


/* --------------------------------------------------------------------------------
	ADD FRONT JAVASCRIPT
================================================================================== */
if ( ! function_exists('gd_add_front_scripts') )
{
	function gd_add_front_scripts()
	{
		global $theme_version;

		if ( file_exists( get_template_directory().'/dist/css/main.css') )
		{
			wp_register_style('gd_style', get_template_directory_uri().'/dist/css/main.css', array(), $theme_version);
			wp_enqueue_style('gd_style');
		}

		if ( file_exists( get_template_directory().'/dist/js/front.min.js') )
		{
			wp_register_script('gd_script', get_template_directory_uri().'/dist/js/front.min.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('gd_script');
		}
	}
}
add_action('wp_enqueue_scripts', 'gd_add_front_scripts', 1000);

/* --------------------------------------------------------------------------------
	HANDLE CREATION OF NEW MENUS (HEADER, FOOTER, MOBILE)
================================================================================== */
function gd_register_menus()
{
	register_nav_menu( 'Header', __( 'Header', get_option('stylesheet') ) );
	register_nav_menu( 'Footer', __( 'Footer', get_option('stylesheet') ) );
	register_nav_menu( 'Mobile', __( 'Mobile', get_option('stylesheet') ) );
}
add_action( 'after_setup_theme', 'gd_register_menus' );

/* --------------------------------------------------------------------------------
	REMOVE RESPONSIVE IMAGES
================================================================================== */
function gd_remove_srcset_theme($attr)
{
	unset($attr['srcset']);
	unset($attr['sizes']);
	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'gd_remove_srcset_theme');
remove_filter('the_content','wp_make_content_images_responsive');
