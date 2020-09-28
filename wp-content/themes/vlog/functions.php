<?php
/**
 * vlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vlog
 */

if ( ! function_exists( 'vlog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vlog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vlog, use a find and replace
	 * to change 'vlog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vlog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'vlog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vlog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function vlog_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'vlog_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'vlog_setup' );


/**
 * Add Welcome message to dashboard
 */
function vlog_reminder(){
        $theme_page_url = 'https://afterimagedesigns.com/vlog/?dashboard=1';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to vlog Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'vlog' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'vlog_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vlog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vlog_content_width', 1170 );
}
add_action( 'after_setup_theme', 'vlog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vlog_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'vlog' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'vlog' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
}
add_action( 'widgets_init', 'vlog_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function vlog_scripts() {
	// load bootstrap css
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'vlog-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'vlog-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
    } else {
        wp_enqueue_style( 'vlog-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'vlog-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }
	// load bootstrap css
	// load vlog styles
    wp_enqueue_style( 'vlog-owl-css', get_template_directory_uri() . '/inc/assets/css/owl.carousel.css' );
    wp_enqueue_style( 'vlog-owlmin-css', get_template_directory_uri() . '/inc/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'vlog-style', get_stylesheet_uri() );
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        wp_enqueue_style( 'vlog-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    
   wp_enqueue_style( 'vlog-opensans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
    
   

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
    	wp_enqueue_script('vlog-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('vlog-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    }
    wp_enqueue_script('vlog-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array(), '', true );
	wp_enqueue_script( 'vlog-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );
    wp_enqueue_script( 'owljs',get_template_directory_uri().'/inc/assets/js/owl.carousel.js', array(), '2.3.4', false );
    wp_enqueue_script( 'owlminjs',get_template_directory_uri().'/inc/assets/js/owl.carousel.min.js', array(), '2.3.4', false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vlog_scripts' );



/**
 * Add Preload for CDN scripts and stylesheet
 */
function vlog_preload( $hints, $relation_type ){
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
} 

add_filter( 'wp_resource_hints', 'vlog_preload', 10, 2 );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

 function custom_post_type()
{   
    $labels = array(

        'name' => _x('slide', 'Post Type General Name', 'mhh') ,
        'singular_name' => _x('slide', 'Post Type Singular Name', 'mhh') ,
        'menu_name' => __('Home Slider', 'mhh') ,
        'parent_item_colon' => __('Parent slide', 'mhh') ,
        'all_items' => __('All slide', 'mhh') ,
        'view_item' => __('View slide', 'mhh') ,
        'add_new_item' => __('Add New slide', 'mhh') ,
        'add_new' => __('Add New', 'mhh') ,
        'edit_item' => __('Edit slide', 'mhh') ,
        'update_item' => __('Update slide', 'mhh') ,
        'search_items' => __('Search slide', 'mhh') ,
        'not_found' => __('Not Found', 'mhh') ,
        'not_found_in_trash' => __('Not found in Trash', 'mhh') ,
    );

    $args = array(
        'label' => __('Home Slider', 'mhh') ,
        'description' => __('Home Page Slider', 'mhh') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'revisions',
            'custom-fields',
            'page-attributes',
        ) ,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'taxonomies'          => array( 'slidercategory' ),
    );
    register_post_type('slide', $args);
}
add_action('init', 'custom_post_type', 0);
function slide_taxonomy() {
  $labels = array(
    'name'              => _x( 'Slide Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Slide Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Slide Categories' ),
    'all_items'         => __( 'All Slide Categories' ),
    'parent_item'       => __( 'Parent Slide Category' ),
    'parent_item_colon' => __( 'Parent Slide Category:' ),
    'edit_item'         => __( 'Edit Slide Category' ), 
    'update_item'       => __( 'Update Slide Category' ),
    'add_new_item'      => __( 'Add New Slide Category' ),
    'new_item_name'     => __( 'New Slide Category' ),
    'menu_name'         => __( 'Slide Category' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'slide_category', 'slide', $args );
}
add_action( 'init', 'slide_taxonomy', 0 );
function vlog_custom_meta() {
    add_meta_box( 'vlog_meta', __( 'Whats Hot', 'vlog' ), 'vlog_meta_callback', 'post' );
}
function vlog_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
    <p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Display in Whats Hot Section', 'vlog' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'vlog_custom_meta' );

/**
 * Saves the custom meta input
 */
function vlog_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'vlog_nonce' ] ) && wp_verify_nonce( $_POST[ 'vlog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'vlog_meta_save' );
add_filter( 'big_image_size_threshold', '__return_false' );