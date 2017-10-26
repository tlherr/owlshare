<?php
/*
 * Plugin Name: owlshare
 * Version: 1.0
 * Plugin URI: https://tlherr.com
 * Description: Provide font awesome sharing buttons on posts
 * Author: Thomas Herr
 * Author URI: https://tlherr.com
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: owlshare
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Thomas Herr
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-owlshare.php' );
require_once( 'includes/class-owlshare-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-owlshare-admin-api.php' );
require_once( 'includes/lib/class-owlshare-post-type.php' );
require_once( 'includes/lib/class-owlshare-taxonomy.php' );

/**
 * Returns the main instance of owlshare to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object owlshare
 */
function owlshare () {
	$instance = owlshare::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = owlshare_Settings::instance( $instance );
	}

	return $instance;
}

owlshare();

add_filter( 'the_content', 'owlshare_add_share_media' );

/**
 * Add share media to end of post
 *
 * @uses is_single()
 */
function owlshare_add_share_media( $content ) {

	if ( is_single() ) {
		$content .= '<div class="share-link-wrapper row">';
		$content .= '<h3 class="page-level-title col-12" id="share-title"><i class="fa fa-share-alt"></i> Share</h3>';
		$content .= '<div id="post-sharing" data-share-url="'.get_permalink().'" data-share-title="'.get_the_title().'" ></div>';
		$content .= '</div>';
	}

	// Returns the content.
	return $content;
}


function owlshare_register_js() {
	wp_register_script('owlshare_lib_script','/wp-content/plugins/owlshare/assets/js/frontend.min.js', array('jquery'), '1.0', true);
	wp_register_script('owlshare_share_script','/wp-content/plugins/owlshare/assets/js/share.js', array('jquery'), '1.0', true);

	wp_enqueue_script('owlshare_lib_script');
	wp_enqueue_script('owlshare_share_script');
}
add_action('wp_enqueue_scripts', 'owlshare_register_js');