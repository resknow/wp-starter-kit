<?php

if ( ! class_exists( 'Woocommerce' ) ) return;

/**
 * Remove Default Content and Meta Data
 */
add_action( 'init', function () {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
} );

/**
 * Move Description to above the add to cart form
 */
add_action( 'woocommerce_single_product_summary', function () {
    $description = apply_filters( 'the_content', get_the_content() );
    printf('<div class="single-product__description">%s</div>', $description);
} );

/**
 * Remove Tabs
 */
add_filter( 'woocommerce_product_tabs', function ($tabs) {
    return [];
}, 98 );

/**
 * Automatically update basket count on change
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
	$fragments['.bag-link .bubble'] = sprintf('<span class="bubble" data-count="%1$s">%1$s</span>', WC()->cart->cart_contents_count);
 	return $fragments;
} );