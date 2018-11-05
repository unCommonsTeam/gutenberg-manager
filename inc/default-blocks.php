<?php
/**
 * Gutenberg Manager Default Blocks managing.
 * @since 1.0
 */

// Set PHP page as a JS page
header('Content-Type: application/javascript');

// Include WP Functions
$wp_root = explode( 'wp-content', dirname(__FILE__) );
$wp_root = $wp_root[0];
require_once( $wp_root . 'wp-load.php' );

define( 'GM_DIR', plugin_dir_path( __FILE__ ) );

// DEFAULT BLOCK DEFINTIONS
require_once( GM_DIR.'inc/blocks.php' );

echo "window.onload = function() {";

// Removal Loop

foreach( $gm_default_blocks as $cat=>$blocks ){
    foreach( $blocks as $block ){
        
        if( get_option($block['opt']) ){

            echo "wp.blocks.unregisterBlockType( '".$block['slug']."' );\n";

        }

        if( defined($block['const']) && constant($block['const']) ){

            echo "wp.blocks.unregisterBlockType( '".$block['slug']."' );\n";

        }
        
    }

}

echo "};";
