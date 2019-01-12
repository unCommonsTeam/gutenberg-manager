<?php
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

/**
 * Gutenberg Manager uninstall.
 * @since 1.0
 */

$all_installed_options = wp_load_alloptions();

foreach( $all_installed_options as $key => $value ){

    if(preg_match('/^gm-/', $key)) {

        delete_option( $key );

    }

}
