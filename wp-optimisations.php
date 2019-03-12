<?php
/**
 * Plugin Name: WP-Optimisations
 * Description: Various small optimisations to WordPress such as removing unused assets or functionality
 * Author: E. Adams
 * Author URI: https://edadams.io
 */

defined( 'ABSPATH' ) or die();

/**
 * Remove unused CSS and JS files.
 */
function optimisations_remove_unused_css() {
    wp_dequeue_style( 'wp-block-library' );
    
    wp_deregister_script( 'jquery' );
    wp_deregister_script( 'jquery-migrate' );
}
add_action( 'wp_enqueue_scripts', 'optimisations_remove_unused_css', 100 );


/**
 * Remove WP oEmbed support. 
 */
function optimisations_disable_embeds_code_init() {
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
    add_filter( 'embed_oembed_discover', '__return_false' );
    add_filter( 'tiny_mce_plugins', 'optimisations_disable_embeds_tiny_mce_plugin' );
    add_filter( 'rewrite_rules_array', 'optimisations_disable_embeds_rewrites' );
}
function optimisations_disable_embeds_tiny_mce_plugin($plugins) {
    return array_diff($plugins, array('wpembed'));
}
function optimisations_disable_embeds_rewrites($rules) {
    foreach($rules as $rule => $rewrite) {
        if(false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}
add_action( 'init', 'optimisations_disable_embeds_code_init', 9999 );
