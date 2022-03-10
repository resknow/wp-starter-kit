<?php

/**
 * This file defines custom routes that we use for functionality that falls
 * outside of standard posts and pages.
 */

add_filter( 'template_include', function( string $template ) {
    $normalized_uri = ltrim(strtolower($_SERVER['REQUEST_URI']), '/');

    // Store URI for later
    $GLOBALS['tashajacks__order_form_uri'] = $normalized_uri;

    // Order Form Template
    if ( str_starts_with( $normalized_uri, 'order-form' ) ) {
        return locate_template( ['order-form.php'] );
    }

    return $template;
} );

add_filter( 'pre_get_document_title', function( $title ) {
    $normalized_uri = trim(strtolower($_SERVER['REQUEST_URI']), '/');

    $titles = [
        'order-form' => 'Place an Order'
    ];

    if ( array_key_exists( $normalized_uri, $titles ) ) {
        $title = $titles[$normalized_uri];
    }

    return $title;
} );