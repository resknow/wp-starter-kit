<?php

namespace Resknow;

use Timber\Twig_Function as TwigFunction;

/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://www.resknow.co.uk
 * Description: Core Functionality for this site that doesn't belong in the theme code.
 * Author: Chris Galbraith
 * Author URI: https://chrisgalbraith.com
 * Version: 0.1.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: resknow
 */

if ( !class_exists( 'CoreFunctionality' ) ) {
    require_once __DIR__ . '/classes/Assets.php';
    require_once __DIR__ . '/classes/Block.php';
    require_once __DIR__ . '/classes/PostTypes.php';
    require_once __DIR__ . '/functions/helpers.php';
    require_once __DIR__ . '/functions/woocommerce.php';
    require_once __DIR__ . '/timber-library/timber.php';

    class CoreFunctionality {

        private $uri;
        private $dir;

        public function __construct() {
            $this->uri = plugin_dir_url( __FILE__ );
            $this->dir = plugin_dir_path( __FILE__ );

            $this->init();
        }

        public function init() {
            add_action( 'admin_enqueue_scripts', [$this, 'enqueue_admin_scripts'] );
            add_action( 'admin_menu', ['Resknow\\Block', 'show_reuseable_blocks_in_admin'] );
            add_filter( 'bpui/block_patterns/menu_position', [$this, 'change_block_patterns_menu_position'] );

            add_action( 'acf/init', [$this, 'register_options_pages'] );
            add_action( 'acf/init', [$this, 'register_custom_blocks'] );

            // Remove the Admin Bar because it's annoying :)
            add_filter( 'show_admin_bar', '__return_false' );

            add_action( 'timber/twig', [$this, 'register_twig_functions'] );

            add_filter( 'gettext', [$this, 'do_translations'], 20, 3 );

            $this->cleanup_head_output();
        }

        public function enqueue_admin_scripts() {
            wp_enqueue_style( 'resknow-admin-css', $this->uri . '/css/admin.css' );
        }

        public function register_options_pages() {
            acf_add_options_page([
                'page_title'    => 'Globals',
                'icon_url'      => 'dashicons-admin-site-alt',
                'position'      => '60.1',
                'redirect'      => false
            ]);
        }

        public function register_custom_blocks() {
            Block::auto_register();
        }

        public function cleanup_head_output() {
            // Remove Emoji Styles
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );

            // Remove Generator Meta tag
            remove_action( 'wp_head', 'wp_generator' );

            // Remove RSD Link
            remove_action( 'wp_head', 'rsd_link' );

            // Remove Manifest Link
            remove_action( 'wp_head', 'wlwmanifest_link' );

            // Remove Shortlink
            remove_action( 'wp_head', 'wp_shortlink_wp_head' );

            // Remove json api capabilities
            add_action( 'after_setup_theme', function() {

                // Remove the REST API lines from the HTML Header
                remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
                remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

                // Remove the REST API endpoint.
                remove_action( 'rest_api_init', 'wp_oembed_register_route' );

                // Turn off oEmbed auto discovery.
                add_filter( 'embed_oembed_discover', '__return_false' );

                // Don't filter oEmbed results.
                remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

                // Remove oEmbed discovery links.
                remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

                // Remove oEmbed-specific JavaScript from the front-end and back-end.
                remove_action( 'wp_head', 'wp_oembed_add_host_js' );

            } );
        }

        /**
         * Register Twig Functions
         *
         * @param object $twig Twig Instance
         */
        public function register_twig_functions( $twig ) {
            $twig->addFunction(new TwigFunction( 'assets_dir', ['Resknow\\Assets', 'assets_dir']) );
            $twig->addFunction(new TwigFunction( 'block_area', ['Resknow\\Block', 'render_block_area']) );
            $twig->addFunction(new TwigFunction( 'dump', 'dump') );
            $twig->addFunction(new TwigFunction( 'icon', function($name, $class = null) {
                $filename = sprintf( 'icons/%s.svg', $name );
                if ( !is_readable( Assets::assets_dir($filename, true) ) ) return;

                // Get icon SVG
                $svg = @file_get_contents( Assets::assets_dir($filename, true) );

                // Classname
                if ( $class ) {
                    $class_attr = sprintf( 'class="%s"', $class );
                    $svg = str_replace('viewBox', $class_attr . ' viewBox', $svg);
                }

                return $svg;
            }) );
            return $twig;
        }

        public function do_translations( $translated_text, $text, $domain ) {
            $translations = @file_get_contents( $this->dir . '/translations.json' );
            $translations = json_decode($translations, true);

            // Look for the translated text in our file
            if ( is_array($translations) && !empty($translations) ) {
                foreach ( $translations as $the_domain => $values ) {
                    if ( $domain === $the_domain && array_key_exists( $translated_text, $values ) ) {
                        $translated_text = __($values[$translated_text], $domain);
                        continue;
                    }
                }
            }

            return $translated_text;
        }

        /**
         * Change Block Patterns Menu Position
         */
        public function change_block_patterns_menu_position( $position ) {
            return 23;
        }

    }

    new CoreFunctionality;
}