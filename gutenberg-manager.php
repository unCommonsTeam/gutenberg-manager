<?php
/*
Plugin Name: Gutenberg Manager
Plugin URI: https://wordpress.org/plugins/gutenberg-manager/
Description: A simple and easy way to manage Gutenberg editor. You can disable/enable it for every post types.
Author: unCommons Team
Author URI: http://www.uncommons.pro
Version: 1.0
Text Domain: gutenberg-manager
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// CHECK GUTENBERG
add_action( 'admin_notices', 'gm_check_gutenberg' );
function gm_check_gutenberg() {

    global $pagenow;

    if ( !function_exists('gutenberg_init') && $pagenow == 'plugins.php' ) {

        echo '
        <div class="notice notice-error is-dismissible">
            <p>' . esc_html__('Error: Gutenberg Editor seems not to exist! Gutenberg Manager Plugin is only working with Gutenberg Editor.', 'gutenberg-manager') . '</p>
        </div>';

    }

}

// CONSTANTS
define( 'GM_DIR', plugin_dir_path( __FILE__ ) );
define( 'GM_URL', plugin_dir_url( __FILE__ ) );

// API/HOOKS
require_once( GM_DIR.'inc/hooks.php' );

// OPTIONS
require_once( GM_DIR.'inc/options.php' );

// CORE
require_once( GM_DIR.'inc/core.php' );

// ASSETS

// Plugin Assets
add_action( 'admin_enqueue_scripts', 'gm_admin_assets' );
function gm_admin_assets() {

    // Main Style
    wp_enqueue_style( 'gm-main-style', GM_URL . 'assets/css/main.css' );

    // Prism Style
    wp_enqueue_style( 'gm-prism-style', GM_URL . 'assets/css/prism.css' );

    // Main Scripts
    wp_enqueue_script(  'gm-main-scripts', GM_URL . 'assets/js/scripts.js', array( 'jquery' ) );

    // Prism Script
    wp_enqueue_script(  'gm-prism-script', GM_URL . 'assets/js/prism.min.js', array( 'jquery' ), null, true );

}

// Gutenberg Scripts
add_action( 'enqueue_block_editor_assets', 'gm_gutenberg_default_blocks' );
function gm_gutenberg_default_blocks() {
    wp_enqueue_script( 'gm-gutenberg-default-blocks', GM_URL . 'inc/default-blocks.php', array('wp-blocks', 'wp-element') );
}

// LANGUAGE
add_action('plugins_loaded', 'gm_language');

function gm_language() {

    load_plugin_textdomain( 'gutenberg-manager', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}

// SETTINGS LINK
add_filter( 'plugin_action_links_gutenberg-manager/gutenberg-manager.php', 'gm_settings_link' );

function gm_settings_link( $links ) {

    $settings_link = '<a href="admin.php?page=gutenberg-manager">' . esc_html__( 'Settings', 'gutenberg-manager' ) . '</a>';

    array_push( $links, $settings_link );

    return $links;

}
