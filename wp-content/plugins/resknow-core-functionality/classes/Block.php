<?php

/**
 * TODO
 * * Document block.json
 * * Document block.php
 * * Document template.twig
 * * Document Block Patterns
 * * Document Reuseable Blocks
 * * Document Block Areas
 */

namespace Resknow;

use Timber;
use WP_Block_Type_Registry;

class Block {

    /**
     * Auto Register
     *
     * Scans the Blocks Directory in this theme for a block.json file
     * and will auto register the block
     */
    public static function auto_register() {
        $block_dir = get_template_directory() . '/views/blocks';
        $block_definitions = glob( $block_dir . '/**/block.json' );
        $block_logic = glob( $block_dir . '/**/block.php' );
        if ( empty( $block_definitions ) ) return;

        // Include Block Specific Logic
        if ( !empty( $block_logic ) ) {
            foreach ( $block_logic as $file ) {
                require_once $file;
            }
        }

        foreach ( $block_definitions as $file ) {
            $block = json_decode( file_get_contents($file), true );
            self::register($block);
        }
    }

    /**
     * Register a block with ACF & the Block Editor
     */
    public static function register($args = []) {
        $default_args = [
            'render_callback' => ['Resknow\\Block', 'render']
        ];

        // Custom Fields
        self::register_custom_fields($args);

        // Handle "Replaces" field
        if ( array_key_exists( 'replaces', $args ) ) {
            self::unregister_core_blocks($args['replaces']);
        }

        // Assets
        $args['enqueue_assets'] = function() use ($args) {
            self::enqueue_assets($args);
        };

        acf_register_block_type( array_merge( $default_args, $args ) );
    }

    /**
     * Register a Block Pattern
     */
    public static function pattern( $name, $properties ) {
        register_block_pattern('resknow/' . $name, $properties);
    }

    /**
     * Enqueue Assets
     *
     * Finds and enqueues Block specific assets
     */
    public static function enqueue_assets($block) {

        $types = [
            'scripts' => 'script',
            'stylesheets' => 'style'
        ];

        foreach ( $types as $key => $type ) {
            if ( array_key_exists( $key, $block ) ) {
                foreach ( $block[$key] as $asset ) {

                    // Don't enqueue Javascript in the editor
                    if ( !is_admin() || $type === 'style' ) {
                        Assets::add( $type, $asset['name'], self::replace_assets_path($block, $asset['src']) );
                    }

                }
            }
        }

        // Admin / Preview Only stylesheet
        $preview_css = self::replace_assets_path($block, '~/preview.css');
        if ( is_admin() ) {
            Assets::add( 'style', $block['name'] . '-preview', $preview_css );
        }
    }

    public static function replace_assets_path($block, $src) {
        $path = sprintf('%s/views/blocks/%s', get_template_directory_uri(), $block['name']);
        return str_replace( '~', $path, $src );
    }

    /**
     * Register Custom Fields
     *
     * @param array $block Block data
     */
    public static function register_custom_fields( array $block ) {
        if ( ! array_key_exists('fields', $block) || empty($block['fields']) ) return;

        // Setup Fields
        $fields = array_map( function($field) use ($block) {
            $field['key'] = $field['key'] ?? sprintf( 'field_%s-%s', $block['name'], $field['name'] );
            return $field;
        }, $block['fields'] );

        // Setup Field Group
        acf_add_local_field_group([
            'key' => sprintf( 'group_%s', $block['name'] ),
            'title' => sprintf( 'Block: %s', $block['title'] ),
            'fields' => $fields,
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => sprintf( 'acf/%s', $block['name'] )
                    ]
                ]
            ]
        ]);
    }

    /**
     * Render
     * This is the callback that displays the block.
     *
     * @param   array  $block      The block settings and attributes.
     * @param   string $content    The block content (empty string).
     * @param   bool   $is_preview True during AJAX preview.
     */
    public static function render($block, $content = '', $is_preview = false)
    {
        $context = Timber::context();
        $context['block'] = $block;
        $context['fields'] = get_fields();
        $context['globals'] = get_fields('option');
        $context['is_preview'] = $is_preview;

        $name = str_replace('acf/', '', $block['name']);
        $template = sprintf('blocks/%s/template.twig', $name);

        // Filter context
        $context = apply_filters('theme.block', $context); // Applies to every block
        $context = apply_filters(sprintf('theme.block.%s', $name), $context); // Block name specific

        Timber::render($template, $context);
    }

    /**
     * Render Block Area
     *
     * Renders Block Area content by slug
     *
     * @param string $slug
     * @return string HTML
     */
    public static function render_block_area( $slug ) {
        $block_area = get_posts_with_fields( [
            'name' => $slug,
            'post_type' => 'block_area',
            'post_status' => 'publish',
            'posts_per_page' => 1
        ] );

        if ( empty($block_area) ) return;

        printf(
            '<div id="block-area-%1$s" class="block-area block-area--%1$s">%2$s</div>',
            $slug,
            apply_filters( 'the_content', $block_area[0]->post_content )
        );
    }

    /**
     * Show Reuseable Blocks in the Admin
     */
    public static function show_reuseable_blocks_in_admin() {
        add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
    }

    /**
     * Unregister Core Blocks
     *
     * @param string|array $blocks Core blocks to unregister
     */
    public static function unregister_core_blocks( $blocks ) {

        // Convert to an array if we get a single string
        if ( is_string($blocks) ) {
            $blocks = [$blocks];
        }

        add_filter( 'theme.blocks.remove', function( $remove ) use ( $blocks ) {
            return array_merge( $remove, $blocks );
        } );

    }

}