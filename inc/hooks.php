<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Gutenberg Manager API/hooks.
 * @since 1.0
 */

// HOOKS (AFTER SETUP THEME)
add_action( 'admin_menu', 'gm_hooks_1' );

function gm_hooks_1() {

    // GLOBAL HOOK
    do_action( 'gm_global' );

    // POST TYPES
    do_action( 'gm_post_types' );

}

add_action( 'after_setup_theme', 'gm_hooks_2' );

function gm_hooks_2() {

    // DEFAULT BLOCKS
    do_action( 'gm_default_blocks' );

}

// HELPING FUNCTIONS

// Hide Options
function gm_set_hidden( $value = false ) {

    if( $value ) {
        add_action( 'admin_menu', function(){ remove_submenu_page( 'options-general.php', 'gutenberg-manager' ); }, 105 );

        $all_wp_options = wp_load_alloptions();

        foreach( $all_wp_options as $key => $value ){

            if(preg_match('/^gm-/', $key)) {

                if( get_option($key) ) {
                    update_option($key, '0');
                }

            }

        }

    }

}

// Global Disabling
function gm_global_disable( $value = false ) {

    if( $value ) {
        gm_gutenberg_removal();
    }

}

// Disable Post Type
function gm_disable_post_type( $types ) {

    foreach ( $types as $name ) {

        define('GM_DISABLE_' . $name, true);

    }

}

// Disable Default Blocks
function gm_disable_blocks( $blocks = array() ) {

    foreach ( $blocks as $name ) {

        define('GM_DISABLE_BLOCK_'.$name, true);

    }

}