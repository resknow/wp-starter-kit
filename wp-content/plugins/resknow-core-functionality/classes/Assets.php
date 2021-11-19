<?php

namespace Resknow;

class Assets {

    private static $instance;
    public $manifest;
    public $design_tokens;

    public function __construct() {
        $this->manifest = $this->load_manifest();
        $this->design_tokens = $this->load_design_tokens();
    }

    private function load_manifest() {
        $file = @file_get_contents( get_template_directory() . '/rev-manifest.json' );
        return json_decode($file, true);
    }

    private function load_design_tokens() {
        $file = @file_get_contents( get_template_directory() . '/design-tokens.json' );
        return json_decode($file, true);
    }

    /**
     * Get Instance
     */
    public static function get_instance()
    {

        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Asset filename
     *
     * @param string $key Filename
     * @return string
     */
    public static function filename( $key ) {
        if ( array_key_exists($key, self::get_instance()->manifest) ) {
            return self::get_instance()->manifest[$key];
        }
    }

    public static function add_style( $id, $src, $deps = [], $tag = false ) {
        $tag = (!$tag ? SITE_VERSION : $tag);
        wp_enqueue_style($id, $src, $deps, $tag);
    }

    public static function add_script( $id, $src, $deps = [], $tag = false ) {
        wp_enqueue_script($id, $src, $deps, $tag, true);
    }

    /**
     * Add
     *
     * Enqueue a new asset
     *
     * @param string $type script or style
     * @param string $id Unique ID
     * @param string $src Path to the file
     * @param array $deps Optional array of dependencies, whch should enqueue before this
     * @param string $tag Optional version tag, appended to the URL
     */
    public static function add( $type, $id, $src, $deps = [], $tag = false ) {

        // Handle dist directory
        if ( strpos($src, 'http') === false ) {
            $filename = self::filename($src);
            $src = self::dist_dir($filename);
        }

        if ( $type === 'style' ) {
            self::add_style($id, $src, $deps, $tag);
        }

        if ( $type === 'script' ) {
            self::add_script($id, $src, $deps, $tag);
        }
    }

    /**
     * Dist dir
     *
     * Returns the full path to the /dist directory
     *
     * @param string $suffix Optional Path to append to the dist directory path
     * @param bool $full_system_path Full system path for server side use
     */
    public static function dist_dir( $suffix = false, $full_system_path = false ) {
        $prefix = $full_system_path ? get_template_directory() : get_template_directory_uri();
        $dir = $prefix . '/dist';

        // Suffix, possible path to a file
        if ($suffix) {
            $dir .= '/' . $suffix;
        }

        return $dir;
    }

    /**
     * Assets dir
     *
     * Returns the full path to the /assets directory
     *
     * @param string $suffix Optional Path to append to the dist directory path
     * @param bool $full_system_path Full system path for server side use
     */
    public static function assets_dir( $suffix = false, $full_system_path = false ) {
        $prefix = $full_system_path ? get_template_directory() : get_template_directory_uri();
        $dir = $prefix . '/assets';

        // Suffix, possible path to a file
        if ($suffix) {
            $dir .= '/' . $suffix;
        }

        return $dir;
    }

    /**
     * Tokens
     *
     * @return array of design tokens
     */
    public static function tokens() {
        return self::get_instance()->design_tokens;
    }

}