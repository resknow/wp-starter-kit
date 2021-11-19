<?php

/**
 * Hide Paid delivery when free delivery is available
 */
add_filter( 'woocommerce_package_rates', function($rates) {

    if ( array_key_exists( 'free_shipping:1', $rates ) ) {
        unset($rates['flat_rate:2']);
    }

    return $rates;
} );