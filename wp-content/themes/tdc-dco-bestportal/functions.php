<?php
/** 
	@package functions
	@category functions
	@since tdc-dco-bestportal 0.1
*/



	function Tdc_Dco_Hack_Wp_Title_For_Home( $title )
	{
		if( empty( $title ) && ( is_home() || is_front_page() ) ) {
			// return __( 'DCO', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
			return __( 'DCO', 'theme_domain' );
		}
			return $title;
	 }
	add_filter( 'wp_title', 'Tdc_Dco_Hack_Wp_Title_For_Home' );



	function Tdc_Dco_Theme_Setup(){

		add_theme_support('menus');

		register_nav_menu('main_menu', 'Main Menu');
		register_nav_menu('foot_menu', 'Foot Menu');

	}
	add_action('init', 'Tdc_Dco_Theme_Setup');
	
	// custom jquery
	wp_register_script( 'custom_js', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );
	wp_enqueue_script( 'custom_js' );
	 
	// validation
	wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'validation' );
	
	function my_pre_save_post( $post_id ) {

	// check if this is to be a new post
	if( $post_id != 'new' )
	{
		return $post_id;
	}

	// Create a new post
	$post = array(
		'post_status'  => 'publish' ,
		'post_title'  =>  $_POST['fields']['ordernummer_i_visma/fokus'],
		'post_type'  => 'case',
	);

	// insert the post
	$post_id = wp_insert_post( $post );

	// update $_POST['return']
	$_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

	// return the new ID
	return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );
	
function dco_post_exists($title, $content = '', $date = '') {
    global $wpdb;
 
    $post_title = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date = wp_unslash( sanitize_post_field( 'post_date', $date, 0, 'db' ) );
 
    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();
 
    if ( !empty ( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }
 
    if ( !empty ( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }
 
    if ( !empty ( $content ) ) {
        $query .= 'AND post_content = %s';
        $args[] = $post_content;
    }
 
    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );
 
    return 0;
}

/* 
	@since tdc-dco-bestportal 0.1
	dco_get_user_role
*/
function dco_get_user_info(){
	$user = get_user_by( 'login', get_field('bestallare') );
	$userrole = array_shift($user->roles);
	if ($userrole == 'administrator') {
		$userrole = 'Administratör';
		} elseif ($userrole == 'chef') {
		$userrole = 'Chef';
		} elseif ($userrole == 'ny_anvndare') {
		$userrole = 'Ny användare';
		} elseif ($userrole == 'projektledare') {
		$userrole = 'Projektledare';
		} elseif ($userrole == 'sam') {
		$userrole = 'SAM';
		} elseif ($userrole == 'tekniker') {
		$userrole = 'Tekniker';
		} else {
	}
	$user->userrole = $userrole;
	if($user->first_name != ''):
		$user->full_name = $user->first_name . ' ' . $user->last_name;
	else:
		$user->full_name = $user->user_email;
	endif;
	//echo $user->full_name;
	return $user;
}

function dco_init_case_status($parrent){
	if (get_field('case_status') != 'Ny'){
		update_field('field_56d99b7e287d1', 'Klar', $parrent);
	}
}

function dco_set_new_case_status($parrent){
	if (get_field('orderstatus') != 'Klar'){
		update_field('field_56d99b7e287d1', get_field('orderstatus'), $parrent);
		update_field('field_56e28b76ffef3', get_field('ordertyp'), $parrent);
	}	
}

class delorder{
	var $parentid;
	var $order;
	var $typ;
	var $ordertyp;
	var $kundforkortning;
	var $applikation;
	var $placering;
	var $avtalstyp;
	var $kundnamn;
	var $servernamn;
	var $tekniker;
	var $mssql;
	var $add_applikation_operativ;
	var $add_applikation_namn;
	var $add_applikation_forkortning;
	
	function __construct($create_parentid){
		$this->parentid = $create_parentid;
	}
	function set_parentid($new_parentid){
		$this->parentid = $new_parentid;
	}
	function get_parentid(){
		return $this->parentid;
	}


}

function dco_get_application_list(){
	$loop = new WP_Query( array( 'orderby' => 'title', 'order'   => 'ASC', 'post_type' => 'servertyp') );
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); 
			$appnamn[] = get_the_title();
			endwhile;
			echo "<div id=\"json-app\">" . json_encode($appnamn) . "</div>";
		endif;
	wp_reset_postdata();
}
























