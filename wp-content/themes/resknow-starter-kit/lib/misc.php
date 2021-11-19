<?php

/**
 * Misc Functions
 *
 * Most of this is for removing the bloat
 * that WordPress likes to add to the <head>
 * of each page.
 */

// Add Google Maps API Key to Advanced Custom Fields
if ( defined('GOOGLE_API_KEY') ) {
    add_action( 'acf/init', function () {
        acf_update_setting( 'google_api_key', GOOGLE_API_KEY );
    } );
}