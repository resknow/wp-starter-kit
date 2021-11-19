<?php

namespace Resknow;

class PostTypes {

    public function __construct() {
        add_action( 'init', [$this, 'register_post_types'], 0 );
    }

    public function register_post_types() {
        $post_types = @file_get_contents( plugin_dir_path( __FILE__ ) . '/../post-types.json' );
        if ( !$post_types ) return;
        $post_types = json_decode($post_types, true);

        foreach ( $post_types as $name => $args ) {
            register_post_type( $name, $args );
        }
    }

}