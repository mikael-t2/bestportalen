<?php /* Template Name: Konf Sight */ ?>
<?php
	
if ( isset( $_GET['serverid'] ) ) {
	$serverid = $_GET['serverid'];
	$typ = $_GET['typ'];
};

if ( isset( $_POST['adress'] )){
	$post_information = array(
		'post_title' => $_POST['adress'],
		//'post_content' => $_POST['postContent'],
		'post_type' => 'sight',
		'post_status' => 'publish'
	);
 
	$post_id = wp_insert_post( $post_information );

	update_field('field_56a88b4c0f9e9', $_POST['adress'], $post_id);
	update_field('field_56a88b650f9ea', $_POST['ort'], $post_id);
	update_field('field_56a88b780f9eb', $_POST['dfg'], $post_id);
	update_field('field_56a88b910f9ec', $_POST['netmask'], $post_id);
	update_field('field_56a88bdf0f9ed', $_POST['dns1'], $post_id);
	update_field('field_56a88be90f9ee', $_POST['dns2'], $post_id);
	update_field('field_56990fc59c67f', $post_id , $serverid);
	
	wp_redirect( '/best/konf-ip/?typ=' . $typ . '&serverid=' . $serverid );

};
if (get_field('sight_id' , $serverid) != 'Saknas'){
	//echo get_field('sight_id' , $serverid);
	wp_redirect( '/best/konf-ip/?typ=' . $typ . '&serverid=' . $serverid );
}
if ($typ == 'ILO'){
	//echo get_field('sight_id' , $serverid);
	wp_redirect( '/best/konf-ip/?typ=' . $typ . '&serverid=' . $serverid );
}
	
?>
<?php get_header(); ?>
<div class="flex-boxes">
	<div class="flex-box flex-box-big">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<h1 class="flex-title">Konfiguration av Sight</h1>
		<p>(Ange sight-specifik information)</p>
			<fieldset>
				<h1 class="flex-title">Utrustningen kommer att vara <?php echo get_field('placering' , $serverid); ?></h1>
				</br>
				<form action="" id="konf-sight" method="POST">
					<?php if (get_field('placering' , $serverid) == 'Virtuell i Vreten'){ ?>
						<label for="adress"><?php _e( 'Adress där utrustningen ska placeras :', 'framework') ?></label>
						<p>Torggatan 4</p>
						<p>SOLNA</p>
						<input type="hidden" name="adress" id="submitted" value="Torggatan 4" >
						<input type="hidden" name="ort" id="submitted" value="SOLNA" >
						<label for="Vlan"><?php _e( 'Vlan i den virtuella miljön :', 'framework') ?></label>
						<input value="" type="text" name="vlan" id="adress" />
					<?php } elseif (get_field('placering' , $serverid) == 'Fysisk i Vreten'){ ?>
						<label for="adress"><?php _e( 'Adress där utrustningen ska placeras :', 'framework') ?></label>
						<p>Torggatan 4</p>
						<p>SOLNA</p>
						<input type="hidden" name="adress" id="submitted" value="Torggatan 4" >
						<input type="hidden" name="ort" id="submitted" value="SOLNA" >
					<?php } else { ?>
						<label for="adress"><?php _e( 'Gatuadress där utrustningen ska placeras (obligatorisk):', 'framework') ?></label>
						<input value="" type="text" name="adress" id="adress"  required />
						<label for="adress"><?php _e( 'Ort där utrustningen ska placeras (obligatorisk):', 'framework') ?></label>
						<input value="" type="text" name="ort" id="ort"  required />
					<?php } ?>
					<label for="dfg"><?php _e( 'Default Gateway (obligatorisk):', 'framework') ?></label>
					<input value="" type="text" name="dfg" id="dfg" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" required />
					<label for="netmask"><?php _e( 'Nätmask (obligatorisk):', 'framework') ?></label>
					<input value="255.255.255.0" type="text" name="netmask" id="netmask" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" required />
					<label for="dns1"><?php _e( 'DNS 1 :', 'framework') ?></label>
					<input value="" type="text" name="dns1" id="dns1" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" />
					<label for="dns2"><?php _e( 'DNS 2 :', 'framework') ?></label>
					<input value="" type="text" name="dns2" id="dns2" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" />
					<button type="submit" form="konf-sight" id="submitted"><?php _e('Uppdatera Sight-konfiguration', 'framework'); ?></button>
				</form>
			</fieldset>

	</div>
	<div class="flex-box">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<h1 class="flex-title">Sight-info</h1>
		<fieldset>
			<h1 class="flex-title"><?php _e( 'Adress:', 'framework') ?></h1>
			<p>Angen den adress där utrustningen fysiskt ska vara placerad.</p>
			<p>(Om servern är virtuell så ska ni ange var den virtuella miljön är placerad)</p>
		</fieldset>


	</div>
</div>


<?php get_footer(); ?>