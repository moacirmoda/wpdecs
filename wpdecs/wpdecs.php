<?php
/*
Plugin Name: WPDeCS
Description: The WPDeCS consumes the DeCS service and append into posts or pages in your WP.
Version: 0.1
Author: Moacir Moda - BIREME/OPAS/OMS
Author URI: http://github.com/moacirmoda
*/

define('WPDECS_URL', plugins_url() . "/wpdecs");

add_action('admin_menu', 'my_plugin_menu');
function my_plugin_menu() {
	add_options_page('My Options', 'WPDeCS', 'manage_options', 'wpdecs-options.php', 'wp_decs_options_call');
}
function wp_decs_options_call() {
	include "wpdecs-options.php";
}

// register the meta box
add_action( 'add_meta_boxes', 'decs_metabox' );
function decs_metabox() {
    add_meta_box(
        'decs_id',          // this is HTML id of the box on edit screen
        'DeCS',    // title of the box
        'decs_metabox_content',   // function to be called to display the checkboxes, see the function below
        'post',        // on which edit screen the box should appear
        'normal',      // part of page where the box should appear
        'default'      // priority of the box
    );
}

// display the metabox
function decs_metabox_content( $post_id ) {
    // nonce field for security check, you can have the same
    // nonce field for all your meta boxes of same plugin
    wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_nonce' );

    include "metabox.php";
}

// save data from checkboxes
add_action( 'save_post', 'decs_metabox_data' );
function decs_metabox_data() {

    // check if this isn't an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    // // security check
    // if ( !wp_verify_nonce( $_POST['myplugin_nonce'], plugin_basename( __FILE__ ) ) )
    //     return;

    // // further checks if you like, 
    // // for example particular user, role or maybe post type in case of custom post types

    // // now store data in custom fields based on checkboxes selected
    // if ( isset( $_POST['my_plugin_paid_content'] ) )
    //     update_post_meta( $post_id, 'my_plugin_paid_content', 1 );
    // else
    //     update_post_meta( $post_id, 'my_plugin_paid_content', 0 );

    // if ( isset( $_POST['my_plugin_network_wide'] ) )
    //     update_post_meta( $post_id, 'my_plugin_network_wide', 1 );
    // else
    //     update_post_meta( $post_id, 'my_plugin_network_wide', 0 );
}