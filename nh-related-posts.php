<?php
/*
Plugin Name: NH Related Posts
Description: Display related posts automatically at the end of single posts based on categories.
Version: 1.0
Author: Nazmul Hasan
Author URI: https://bmnazmul21.github.io/portfolio/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: nh-related-posts
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class NHREPO_Main_Path {

    private static $instance;

    private function __construct() {
        $this->define_constants();
        $this->load_classes();
    }

    public static function get_instance() {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function define_constants() {
        define( 'NHREPO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
        define( 'NHREPO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    }

    private function load_classes() {
        require_once NHREPO_PLUGIN_PATH . 'includes/post.php';
        require_once NHREPO_PLUGIN_PATH . 'includes/enqueue.php';

        new NHREPO\NHREPO_Post();
        new NHREPO\NHREPO_Enqueue();
    }
}

NHREPO_Main_Path::get_instance();
