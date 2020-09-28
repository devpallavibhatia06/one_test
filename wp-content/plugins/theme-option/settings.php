<?php 
/**
 *
 * @package   theme_option
 * @author    Thakur Suryaveer Singh <thakursuryaveersingh@gmail.com>
 * @copyright 2016 Suryaveer Singh
 */

include_once('includes/wp-bootstrap-navwalker-4.php');
add_action( 'after_setup_theme', 'theme_option_setup' );
$args = array(
	'default-color' => 'ffffff',
	
);
add_theme_support( 'custom-background', $args );
function theme_option_setup() {
	
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme_option' ) );

	register_nav_menu( 'footer_menu', __( 'Footer Menu', 'theme_option' ) );

	

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	$custom_header_support = array(
		/*
		 * The default image to use.
		 * The %s is a placeholder for the theme template directory URI.
		 */
		'default-image' => '%s/images/header/sunset.jpg',
		// The height and width of our custom header.
		/**
		 * Filter the theme_option default header image width.
		 *
		 * @since theme_option 1.0
		 *
		 * @param int The default header image width in pixels. Default 940.
		 */
		'width' => apply_filters( 'theme_option_header_image_width', 940 ),
		/**
		 * Filter the theme_option defaul header image height.
		 *
		 * @since theme_option 1.0
		 *
		 * @param int The default header image height in pixels. Default 198.
		 */
		'height' => apply_filters( 'theme_option_header_image_height', 198 ),
		// Support flexible heights.
		'flex-height' => true,
		// Don't support text inside the header image.
		'header-text' => false,
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'theme_option_admin_header_style',
	);
	
	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR', '' );
		define( 'NO_HEADER_TEXT', true );
		define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( '', $custom_header_support['admin-head-callback'] );
		add_custom_background();
	}

	/*
	 * We'll be using post thumbnails for custom header images on posts and pages.
	 * We want them to be 940 pixels wide by 198 pixels tall.
	 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	 */
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// ... and thus ends the custom header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	
}
function theme_option_admin_header_style() {
?>
<style type="text/css" id="theme_option-admin-header-css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;

}
/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}

function theme_option_login_logo() {
	if(has_header_image()){?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php header_image(); ?>) !important;
			width: auto !important;
			background-size: contain !important;
			height: 70px !important;
			background-position: center bottom !important;
        }
	</style>
<?php } }
add_action( 'login_enqueue_scripts', 'theme_option_login_logo' );

/**
* Change the login page icon and URL to our site instead of WordPress.org
*/
add_filter( 'login_headerurl', 'xs_login_headerurl' );
function xs_login_headerurl( $url ) {
return esc_url( home_url( '/' ) );
}
add_filter( 'login_headertitle', 'xs_login_headertitle' );
function xs_login_headertitle( $title ) {
return get_bloginfo ( 'name' ) . ' – ' . get_bloginfo ( 'description' );
}
function default_style_script()
{

	wp_enqueue_style('default-style',plugins_url('/css/default.css', __FILE__));


}
add_action('wp_enqueue_scripts','default_style_script');

?>