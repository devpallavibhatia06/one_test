<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vlog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vlog' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo vlog_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'vlog_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'vlog_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><h1><?php esc_url(bloginfo('name')); ?></h1><?php
                            
                            if(get_theme_mod( 'header_banner_tagline_setting' )){ ?><div class="tagline"><small><?php
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }?></small></div>
                        </a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="slider" class="owl-carousel">

<?php 

$i=1;

$slidequery = new WP_Query( array( 'post_type' => 'slide', 'orderby' => 'menu_order',
    'order' => 'ASC') );

while( $slidequery->have_posts() ) : $slidequery->the_post();

$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 

$thumbnail_id = get_post_thumbnail_id( $post->ID );

$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 

?>

<?php if(!empty($image)){ ?>


<div class="custom_overlay_wrapper">
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />

<div class="custom_overlay">

<span class="custom_overlay_inner">
    <div class="container">
        <div class="top_content">
            <div class="featuredorder"><span class="blue_bx"><?php echo $i; ?></span> - Featured</div>
        </div>
        <div class="bottom_content">
            <div class="post_cat"><?php $terms = get_the_terms($post->ID, 'slide_category' );
if($terms) { foreach ($terms as $term) {
                        echo $term_name = $term->name.'<span class="seperator"> | </span>';
                    } } ?></div>
            <h2><?php the_title(); ?> </h2>
            <div class="post_info"><span class="auth">By <?php the_author(); ?></span>  &#8226;  <span class="post_date"><i class="fa fa-signal"></i>  <?php echo get_the_date(); ?></span></div>
        </div>
    </div>
</span>
</div>
</div>

<?php }else{ ?>

<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />

<?php } ?>

<?php $i++; endwhile; ?>

</div>   

<section class="whatshotsection">
    <h2>What's Hot</h2>
    <?php
    $args = array(
        'posts_per_page' => 5,
        'meta_key' => 'meta-checkbox',
        'meta_value' => 'yes'
    );
    $featured = new WP_Query($args);
 
    if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
        <div class="row">
            <div class="col-3 left_content">
                <?php if (has_post_thumbnail()) : ?>
                    <figure> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(100, 100)); ?></a> </figure>
                <?php endif; ?>
            </div>
            <div class="col-9 right_content">
                 <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                <p class="details"><?php echo get_the_date(); ?></p>
            </div>
        </div>
   <?php
    endwhile; else:
    endif; wp_reset_postdata(); 
    ?>
</section>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>