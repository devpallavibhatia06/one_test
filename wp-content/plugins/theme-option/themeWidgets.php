<?php 
/**
 *
 * @package   theme_option
 * @author    Thakur Suryaveer Singh <thakursuryaveersingh@gmail.com>
 * @copyright 2016 Suryaveer Singh
 */
 
 
 if (function_exists('register_sidebar')) {
	

	register_sidebar(array(
		'name' => 'Footer Left',
		'id'   => 'footer-left',
		'class' =>' navbar-nav',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Footer Middle',
		'id'   => 'footer-middle',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Footer Right',
		'id'   => 'footer-right',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));	
}

					
?>