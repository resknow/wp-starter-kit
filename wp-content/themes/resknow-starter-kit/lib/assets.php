<?php

use Resknow\Assets;
use Resknow\Block;

add_action( 'wp_enqueue_scripts', function() {
    global $post;

    // Remove jQuery for non-WooCommerce sites
    if ( ! class_exists( 'woocommerce' ) ) {
        wp_dequeue_script( 'jquery' );
    }

    // Stylesheets
    Assets::add( 'style', 'global', 'style.css' );

    // Scripts
    Assets::add( 'script', 'bundle', 'bundle.js' );

});

add_action( 'admin_enqueue_scripts', function() {
    Assets::add( 'style', 'admin-css', get_template_directory_uri() . '/admin.css' );
} );

// Remove WooCommerce styles
if ( class_exists( 'woocommerce' ) ) {
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}