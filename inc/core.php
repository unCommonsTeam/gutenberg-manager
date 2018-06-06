<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Gutenberg Manager Core.
 * @since 1.0
 */


// GLOBAL DISABLING
if( get_option('gm-global-disable') ){

    add_action( 'plugins_loaded', 'gm_gutenberg_removal' );

}

// CUSTOM DISABLING
add_action( 'current_screen', 'gm_custom_removal' );

function gm_custom_removal() {

    // Intercept Post Type
    $current_screen = get_current_screen();
    $current_post_type = $current_screen->post_type;

    // Pages
    if( get_option('gm-page-disable') && $current_post_type == 'page' ){

        gm_gutenberg_removal();

    }

    if( $current_post_type == 'page' && defined('GM_DISABLE_page') && GM_DISABLE_page ){

        gm_gutenberg_removal();

    }

    // Posts
    if( get_option('gm-post-disable') && $current_post_type == 'post' ){

        gm_gutenberg_removal();

    }

    if( $current_post_type == 'post' && defined('GM_DISABLE_post') && GM_DISABLE_post ){

        gm_gutenberg_removal();

    }

    // Other Post Types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'object');

    foreach( $post_types as $name=>$obj ){

        if( get_option('gm-'.$name.'-disable') && $current_post_type == $name ){

            gm_gutenberg_removal();

        }

        if( $current_post_type == $name && defined('GM_DISABLE_'.$name) && constant('GM_DISABLE_'.$name) ){

            gm_gutenberg_removal();

        }

    }

}


// HELPER

// Gutenberg Removal Actions and Filters
function gm_gutenberg_removal() {

    remove_filter( 'replace_editor', 'gutenberg_init' );
    remove_action( 'load-post.php', 'gutenberg_intercept_edit_post' );
    remove_action( 'load-post-new.php', 'gutenberg_intercept_post_new' );
    remove_action( 'admin_init', 'gutenberg_add_edit_link_filters' );
    remove_filter( 'admin_url', 'gutenberg_modify_add_new_button_url' );
    remove_action( 'admin_print_scripts-edit.php', 'gutenberg_replace_default_add_new_button' );
    remove_action( 'admin_enqueue_scripts', 'gutenberg_editor_scripts_and_styles' );
    remove_filter( 'screen_options_show_screen', '__return_false' );

}


