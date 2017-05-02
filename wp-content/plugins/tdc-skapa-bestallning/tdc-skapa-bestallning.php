<?php
/*
Plugin Name: TDC skapa best&auml;llning
Plugin URI: http://hogeran.se
Description: TDC skapa best&auml;llning via Contact Form 7
Author: Hogeran
Version: 0.1
Author URI: http://hogeran.se
*/
 

/**
*
* Register Custom Post Types and Custom taxonomies.
*
*/

add_action( 'init', 'tdcInfoxBest_custom_post_types' );
function tdcInfoxBest_custom_post_types()
{
/**
* Delorder.
*/
	
	$labels = array(
		'name' => 'Delorder',
		'singular_name' => 'Delorder',
		'menu_name' => 'Delorder',
		'name_admin_bar' => 'Delorder',
		'all_items' => 'Alla delordrar',
		'add_new' => 'Skapa ny',
		'add_new_item' => 'Skapa ny delorder',
		'edit_item' => 'Redigera delorder',
		'new_item' => 'Ny delorder',
		'view_item' => 'Visa delorder',
		'search_items' => 'Sök delorder',
		'not_found' =>  'Hittade inga delordrar',
		'not_found_in_trash' => 'Inga delordrar hittades i papperskorgen.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => null,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'delorder','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','editor','author','revisions' ),
	);
	register_post_type( 'delorder', $args );
	
	
	
/**
* Servertyp.
*/
	
	$labels = array(
		'name' => 'Servertyp',
		'singular_name' => 'Servertyp',
		'menu_name' => 'Servertyp',
		'name_admin_bar' => 'Servertyp',
		'all_items' => 'Alla inlägg',
		'add_new' => 'Add New',
		'add_new_item' => 'Skapa nytt inlägg',
		'edit_item' => 'Redigera inlägg',
		'new_item' => 'Nytt inlägg',
		'view_item' => 'Visa inlägg',
		'search_items' => 'Sök inlägg',
		'not_found' =>  'Hittade inga inlägg.',
		'not_found_in_trash' => 'Inga inlägg hittades i papperskorgen.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => null,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'servertyp','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','author','revisions' ),
	);
	register_post_type( 'servertyp', $args );


/**
* Sight.
*/
	$labels = array(
		'name' => 'Sight',
		'singular_name' => 'Sight',
		'menu_name' => 'Sight',
		'name_admin_bar' => 'Sight',
		'all_items' => 'Alla inlägg',
		'add_new' => 'Add New',
		'add_new_item' => 'Skapa nytt inlägg',
		'edit_item' => 'Redigera inlägg',
		'new_item' => 'Nytt inlägg',
		'view_item' => 'Visa inlägg',
		'search_items' => 'Sök inlägg',
		'not_found' =>  'Hittade inga inlägg.',
		'not_found_in_trash' => 'Inga inlägg hittades i papperskorgen.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => null,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'sight','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','author','revisions' ),
	);
	register_post_type( 'sight', $args );



/**
* Status.
*/
	$labels = array(
		'name' => 'Status',
		'singular_name' => 'Status',
		'menu_name' => 'Status',
		'name_admin_bar' => 'Status',
		'all_items' => 'Alla inlägg',
		'add_new' => 'Add New',
		'add_new_item' => 'Skapa nytt inlägg',
		'edit_item' => 'Redigera inlägg',
		'new_item' => 'Nytt inlägg',
		'view_item' => 'Visa inlägg',
		'search_items' => 'Sök inlägg',
		'not_found' =>  'Hittade inga inlägg.',
		'not_found_in_trash' => 'Inga inlägg hittades i papperskorgen.',
		'parent_item_colon' => 'Parent Page',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'has_archive' => false,
		'menu_position' => null,
		'menu_icon' => null,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'status','with_front' => true,'feeds' => false,'pages' => true ),
		'query_var' => true,
		'can_export' => true,
		'supports' => array( 'title','author','revisions' ),
	);
	register_post_type( 'status', $args );
	
	
	
/**
* Case.
*/
    $labels = array(
        'name' => 'Case',
        'singular_name' => 'Case',
        'add_new' => 'L&auml;gg till nytt case',
        'add_new_item' => 'L&auml;gg till nytt case',
        'edit_item' => '&Auml;ndra case',
        'new_item' => 'Nytt Case',
        'view_item' => 'Visa Case',
        'search_items' => 's&ouml;k Case',
        'not_found' => 'Inget Case hittades',
        'not_found_in_trash' => 'Ingen Case hittades i papperkorgen',
        'parent_item_colon' => ''
    );
 
 
    // Custom Post Type Supports
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'case', 'with_front' => true, 'pages' => true ),
        'capability_type' => 'post',
        'hierarchical' => false,
		'has_archive'  => true,
        'menu_position' => 25,
		'show_in_rest' => true,
        'supports' => array( 'title','author','revisions' ),
    );
    register_post_type( 'case' , $args );

}

add_action( 'after_switch_theme', 'cptg_rewrite_flush' );
function cptg_rewrite_flush()
{
	flush_rewrite_rules();
}




/*
* The wpcf7_before_send_mail is used to catch form data before mailing it
*/


function tdc_wpcf7_skapaBestallning( $contact_form ) {
    $title = $contact_form->title;
    $submission = WPCF7_Submission::get_instance();
  
    if ( $submission ) {
    	$posted_data = $submission->get_posted_data();
		if ( 'nyBest' == $title ) {
			
			
			$current_user = wp_get_current_user();
			$order = $posted_data['ordernummer'];
			$kund = $posted_data['kund'];
			$avtalstyp = $posted_data['avtalstyp'];
				
			/* Put your code here to manipulate the data - simples ?? */
			$output = $order . " " . $kund . " " . $avtalstyp;
			file_put_contents("tdcOutputTest.txt", $output);


			/* Skapa ärende i databasen */

			$post_information = array(
				'post_title' => wp_strip_all_tags( $order ),
				//'post_content' => $_POST['postContent'],
				'post_type' => 'case',
				'post_status' => 'publish'
			);
		 
			$post_id = wp_insert_post( $post_information );
			update_field('field_566812f6b00ef', wp_strip_all_tags( $kund ), $post_id);
			update_field('field_56681383b00f1', wp_strip_all_tags( $order ), $post_id);
			update_field('field_56681352b00f0', wp_strip_all_tags( $current_user->user_login ), $post_id);
			update_field('field_5673c23e1c0b3', wp_strip_all_tags( $avtalstyp ), $post_id);
			update_field('field_56d99b7e287d1', 'Ny', $post_id);
			update_field('field_56e28b76ffef3', 'Ny', $post_id);
			
		}
		else if ( 'nyNod' == $title ) {
			
			
			$current_user = wp_get_current_user();
			$nodNamn = $posted_data['nodNamn'];
			$app = $posted_data['app'];
			$placering = $posted_data['placering'];
			$ilo = $posted_data['ilo'];
			$kund = $posted_data['kund'];
			$getOrder = $posted_data['getOrder'];
			$email = $posted_data['email'];
			$parent = $posted_data['parent'];
			$reciveOrder = "DCO har mottagit best&auml;llning";
			$rekIp = "DCO inv&auml;ntar IP";
				
			/* Put your code here to manipulate the data - simples ?? */
			$output = $nodNamn . " " . $app . " " . $placering . " " . $ilo . " " . $kund . " " . $getOrder . " " . $email . " " . $parent;
			file_put_contents("tdcOutputTest.txt", $output);


			/* Skapa post i databasen */
			$post_information = array(
				'post_title' => wp_strip_all_tags( $nodNamn ),
				//'post_content' => $_POST['postContent'],
				'post_type' => 'delorder',
				'post_status' => 'publish'
			);
		 
			$post_id = wp_insert_post( $post_information );
			update_field('field_568fa7e64dfef', wp_strip_all_tags( $parent ), $post_id);
			update_field('field_568fa83a4dff0', wp_strip_all_tags( $app ), $post_id);
			update_field('field_568fa8704dff1', wp_strip_all_tags( $placering ), $post_id);
			update_field('field_568fa89a4dff2', wp_strip_all_tags( $nodNamn ), $post_id);
			update_field('field_568fc79785d53', 'nod', $post_id);
			update_field('field_5698e8d1c83f0', 'Saknas', $post_id);
			update_field('field_5698e8d8c83f1', 'Saknas', $post_id);
			update_field('field_5698e8eac83f2', 'Saknas', $post_id);
			update_field('field_5698e8f5c83f3', 'Saknas', $post_id);
			update_field('field_5698e946c83f4', 'Saknas', $post_id);
			update_field('field_56990e76c6750', wp_strip_all_tags( $rekIp ), $post_id);
			update_field('field_56990fc59c67f', 'Saknas', $post_id);
			update_field('field_569912a005d15', wp_strip_all_tags( $rekIp ), $post_id);
			update_field('field_568fc749a7925', $reciveOrder , $post_id);
			
		}
	}
	
}
add_action( 'wpcf7_before_send_mail', 'tdc_wpcf7_skapaBestallning' ); 


?>