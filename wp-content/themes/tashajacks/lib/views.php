<?php

use Resknow\Assets;

/**
 * Get Context Utilities
 * @return array
 */
function get_context_utils() {
    return [
       'assets_dir' => Assets::assets_dir(),
       'has_post_thumbnail' => has_post_thumbnail(),
       'year' => date('Y'),
       'user_is_logged_in' => is_user_logged_in(),
       'logout_url' => wp_logout_url(home_url()),
       'is_front_page' => is_front_page(),
       'privacy_policy_link' => get_privacy_policy_url()
    ];
}

/**
 * Get Context with Fields
 *
 * Returns Timber Context and all custom fields
 *
 * @param array $merge Optional array to merge into the context
 */
function get_context_with_fields( $merge = [] ) {

    // Get main context from Timber
    $context['timber'] = Timber::get_context();

    // Current Post/Post
    $context['this'] = new Timber\Post();

    // Add our stuff
    $context['fields'] = get_fields();
    $context['current'] = get_full_post();

    // Global
    $context['globals'] = get_fields('options');

    // Menu
    $context['menu'] = get_menu('Main Menu');

    // Add some helpers
    $context['util'] = get_context_utils();

    // User
    $context['user'] = wp_get_current_user();

    // Query Parameters
    $context['request'] = $_GET;

    // Nonce for API Requests
    $context['api_nonce'] = wp_create_nonce( 'wp_rest' );

    // WooCommerce
    if ( class_exists( 'Woocommerce' ) ) {
        $context['cart'] = WC()->cart;
        $context['cart_url'] = wc_get_cart_url();
        $context['checkout_url'] = wc_get_checkout_url();
        $context['account_url'] = get_permalink( get_option('woocommerce_myaccount_page_id') );

        // Related Products for Single Product Page
        if ( get_post_type() === 'product' && is_single() ) {
            // Get the current category
            $terms = get_the_terms( get_the_ID(), 'product_cat' );

            // Look for related products
            $related_products = wc_get_products( [
                'limit' => 3,
                'status' => ['publish'],
                'category' => array_map( function($term) {
                    return $term->slug;
                }, $terms ),
                'return' => 'ids'
            ] );

            if ( $related_products || count($related_products) >= 3 ) {
                $context['related_products'] = $related_products;
            }
        }
    }

    return apply_filters( 'get_context_with_fields', array_merge($context, $merge) );
}
