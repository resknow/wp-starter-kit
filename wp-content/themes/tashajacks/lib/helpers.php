<?php

/**
 * Excerpt Length
 */
add_filter( 'excerpt_length', function ($length) {
    return 15;
}, 999 );

/**
 * Posts per page
 */
add_action( 'pre_get_posts', function ($query) {

    if ( is_home() ) {
        $query->set('posts_per_page', 12);
    }

    return;
} );
