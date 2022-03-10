<?php

use Resknow\Assets;

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

/**
 * Get Icons from directory as key => value pairs
 * Compatible with ACF $field['choices]
 *
 * @param string $dir Directory to look in
 * @param string $suffix File extension/suffix
 * @param callable $filter Optional function to filter the returned values
 * @param array $default Default values
 * @return array
 */
function get_files_from_directory( $dir, $suffix, $filter, $default = [] ) {

    $items = $default;
    $available_files = glob( sprintf( '%s*%s', $dir, $suffix ) );

    if ( !empty( $available_files ) ) {
        foreach ( $available_files as $file ) {
            $filename = str_replace( $dir, '', $file );
            $key = str_replace( $suffix, '', $filename );
            $file = @file_get_contents( $file );

            if ( is_callable( $filter ) ) {
                $file = call_user_func( $filter, $file, $key );
            }

            $items[$key] = $file;
        }
    }

    return $items;

}

/**
 * Get List of Icons
 *
 * @return array key => value array of icons
 */
function get_list_of_icons() {
    $dir = get_template_directory() . '/dist/assets/icons/';
    $suffix = '.svg';
    return get_files_from_directory( $dir, $suffix, function($file, $name) {
        $file = str_replace( '<svg', '<svg style="width: 1.2em; height: 1.2em;"', $file );
        return sprintf( '<div style="display: flex; align-items: center; gap: 4px">%s <span>%s</span></div>', $file, $name );
    }, [
        'none' => 'No icon'
    ] );
}