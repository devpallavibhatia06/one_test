<?php 

/**
 *
 * 
 *
 * @wordpress-plugin
 * Plugin Name:			Theme Option
 * Plugin URI:			http://www.digitalhive.in
 * Description:       	This is a custom theme option plugin. Powered by Digital Hive  
 * Version:           	1.0
 * Author:       		DigitalHive Team
 * Author URI:       	http://www.digitalhive.in
 */
?>
<?php

include_once('settings.php');
include_once('maintheme.php');
include_once('themeWidgets.php');
// create custom plugin settings menu
add_action('admin_menu', 'theme_option_create_menu');

function theme_option_create_menu() {

	//create new top-level menu
	add_menu_page('Theme Options Settings', 'Theme Options', 'administrator', __FILE__, 'theme_option_settings_page' ,'dashicons-admin-multisite' );

	//call register settings function
	add_action( 'admin_init', 'register_theme_option_settings' );
}
function wp_gear_manager_admin_scripts() {
	wp_enqueue_media();
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
}

function wp_gear_manager_admin_styles() {
wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');
?>