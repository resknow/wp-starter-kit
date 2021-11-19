<?php

use Resknow\Assets;
use Resknow\PostTypes;

// Register Custom Post Types
new PostTypes;

/**
 * Site Version
 *
 * Set this in your wp-config if you need to update it
 */
if ( !defined('SITE_VERSION') ) define('SITE_VERSION', '1.0.0');

/**
 * Theme Setup
 *
 */
add_action('after_setup_theme', function () {

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Editor Styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'dist/style.min.css' );

    // Add Featured Image Support for posts
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'align-wide' );
    add_theme_support( 'woocommerce' );

    // Add HTML5 Support
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ] );

    // Set a better Thumbnail Size
    update_option( 'thumbnail_size_w', 240 );
    update_option( 'thumbnail_size_h', 240 );

    // Panel Image
    add_image_size( 'panel_image', 600, 300, true );

    // Hero Sizes
    add_image_size( 'hero', 1800, 840, true );
    add_image_size( 'hero_medium', 980, 457, true );
    add_image_size( 'hero_small', 480, 224, true );

    // Register Menu
    register_nav_menu( 'main-menu', __('Main Menu') );

    // Disable Default Custom Colors
    add_theme_support( 'disable-custom-colors' );

    // Register Block Editor Colours
    $theme = Assets::tokens();
    $colors = [];

    if ( array_key_exists( 'color', $theme ) ) {
        foreach ($theme['color'] as $key => $color) {
            $colors[] = [
                'name' => ucfirst($key),
                'slug' => $key,
                'color' => $color
            ];
        }
    }

    add_theme_support( 'editor-color-palette', $colors );
});

/**
 * Disable the Gutenberg editor for Products
 */
add_filter( 'use_block_editor_for_post_type', function ($can_edit, $post_type) {
    $disable_block_editor = ['product'];

    if ( in_array($post_type, $disable_block_editor) ) {
        $can_edit = false;
    }

    return $can_edit;
}, 10, 2 );