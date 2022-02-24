<?php

use Resknow\Block;

/**
 * Manage Core Blocks
 */
add_filter( 'allowed_block_types_all', function ( $allowed_blocks, $context ) {
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
    $blocks = array_keys($registered_blocks);

    $blocks_to_remove = apply_filters( 'theme.blocks.remove', [] );

    foreach ( $blocks as $key => $block ) {
        if ( ! in_array( $block, $blocks_to_remove ) ) {
            $filtered_block_list[] = $block;
        }
    }

    return $filtered_block_list;
}, 10, 2 );