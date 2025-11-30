<?php

namespace NHREPO;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class NHREPO_Enqueue{

    public function __construct(){
        
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
    }

    public function wp_enqueue_scripts(){

        $css = NHREPO_PLUGIN_PATH . 'assets/main.css';

        wp_enqueue_style( 'nhrepo-css', NHREPO_PLUGIN_URL . 'assets/main.css', array(), filemtime($css) );
    }

}