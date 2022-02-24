<?php

/**
 * 👋
 *
 * This is your themes "functions.php", which is a place you'll often
 * see mentioned in tutorials or answers to questions about how to add
 * or edit functionality in WordPress.
 *
 * Please don't paste things in to this file, it can get very messy
 * and hard to reason about. Instead, place your snippet under the "lib/"
 * directory in a relevant php file.
 *
 * For example, if you're modifying something in WooCommerce, "lib/woocommerce.php"
 * makes sense. You don't need to worry about including the file, that's done
 * for you below.
 */

/**
 * Include functions from lib/
 */
$functions_to_load = glob(__DIR__ . '/lib/*.php');

if ( ! empty( $functions_to_load ) ) {
    foreach ( $functions_to_load as $file ) {
        require_once $file;
    }
}