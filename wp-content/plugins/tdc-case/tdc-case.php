<?php
/*
Plugin Name: TDC Case
Plugin URL: http://hogeran.se/
Description: L&auml;gger till Beställninngsfunktion i databasen
Version: 0.6.1
Author: Mikael Holgersson
Author URI: http://hogeran.se/
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
 
if ( ! defined( 'TDC_CASE_BASE_FILE' ) )
    define( 'TDC_CASE_BASE_FILE', __FILE__ );
if ( ! defined( 'TDC_CASE_BASE_DIR' ) )
    define( 'TDC_CASE_BASE_DIR', dirname( TDC_CASE_BASE_FILE ) );
if ( ! defined( 'TDC_CASE_PLUGIN_URL' ) )
    define( 'TDC_CASE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	
/*
|--------------------------------------------------------------------------
| DEFINE THE CUSTOM POST TYPE
|--------------------------------------------------------------------------
*/
 
/**
 * Setup TDC Case
 *
 * @since 0.1
*/
 
function tdc_case_setup_post_types() {
 
    // Custom Post Type Labels
    $labels = array(
        'name' => esc_html__( 'Case', 'tdc_case' ),
        'singular_name' => esc_html__( 'Case', 'tdc_case' ),
        'add_new' => esc_html__( 'L&auml;gg till nytt case', 'tdc_case' ),
        'add_new_item' => esc_html__( 'L&auml;gg till nytt case', 'tdc_case' ),
        'edit_item' => esc_html__( '&Auml;ndra case', 'tdc_case' ),
        'new_item' => esc_html__( 'Nytt Case', 'tdc_case' ),
        'view_item' => esc_html__( 'Visa Case', 'tdc_case' ),
        'search_items' => esc_html__( 's&ouml;k Case', 'tdc_case' ),
        'not_found' => esc_html__( 'Inget Case hittades', 'tdc_case' ),
        'not_found_in_trash' => esc_html__( 'Ingen Case hittades i papperkorgen', 'tdc_case' ),
        'parent_item_colon' => ''
    );
 
    // Supports
    $supports = array( 'title', 'revisions' );
 
    // Custom Post Type Supports
    $args = array(
        'labels' 			=> $labels,
        'public' 			=> true,
        'publicly_queryable' => true,
        'show_ui' 			=> true,
        'query_var' 		=> true,
        'can_export' 		=> true,
        'rewrite' 			=> array( 'slug' => 'case', 'with_front' => true ),
        'capability_type' 	=> 'post',
        'hierarchical' 		=> false,
		'has_archive'  		=> true,
        'menu_position' 	=> 25,
        'supports' 			=> $supports,
  		'show_in_rest'      => true,
  		'rest_base'         => 'case',
        'menu_icon' => TDC_CUST_PLUGIN_URL . '/includes/images/Kunds_icon.png', // you can set your own icon here
    );
 
    // Finally register the "case" custom post type
    register_post_type( 'case' , $args );
	flush_rewrite_rules();
}
 
add_action( 'init', 'tdc_case_setup_post_types' );

	
?>