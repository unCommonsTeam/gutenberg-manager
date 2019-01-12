<?php
/*
Plugin Name: Gutenberg Manager
Plugin URI: https://wordpress.org/plugins/manager-for-gutenberg/
Description: A simple and easy way to manage Gutenberg editor. You can disable/enable it for every post types and restore the Classic Editor. You can remove/add single blocks and more.
Author: unCommons Team
Author URI: http://www.uncommons.pro
Requires at least: 4.9
Tested up to: 5.0.3
Stable tag: 1.5
Version: 1.5
Requires PHP: 5.3
Text Domain: gutenberg-manager
Domain Path: /languages
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// CHECK GUTENBERG
add_action( 'admin_notices', 'gm_check_gutenberg' );
function gm_check_gutenberg() {

    global $pagenow;

    if ( is_plugin_active('classic-editor/classic-editor.php') ) {

        echo '
        <div class="notice notice-warning is-dismissible">
            <p>' . esc_html__('Gutenberg Manager Warning: "Classic Editor" plugin is enabled, but you don\'t need it if you are using Gutenberg Manager. However our disabling options will be inhibited to allow "Classic Editor" to work properly (we always respect the other plugins).', 'gutenberg-manager') . '</p>
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

// DEFAULT BLOCKS MANAGING
require_once( GM_DIR.'inc/default-blocks.php' );

// ASSETS
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

// LANGUAGE
add_action('plugins_loaded', 'gm_language');

function gm_language() {

    load_plugin_textdomain( 'gutenberg-manager', false, GM_DIR . 'languages/' );

}

// SETTINGS LINK
add_filter( 'plugin_action_links_manager-for-gutenberg/gutenberg-manager.php', 'gm_settings_link' );

function gm_settings_link( $links ) {

    $settings_link = '<a href="options-general.php?page=gutenberg-manager">' . esc_html__( 'Settings', 'gutenberg-manager' ) . '</a>';

    array_push( $links, $settings_link );

    return $links;

}