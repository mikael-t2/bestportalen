<?php /* Template Name: Konf IP */ ?>
<?php
	
if ( isset( $_GET['serverid'] ) ) {
	$serverid = $_GET['serverid'];
	$typ = $_GET['typ'];
};

if ( isset( $_POST['ip'] )){
	if($typ == 'IP'){
		update_field('field_5698e8d1c83f0', $_POST['ip'], $serverid);
		update_field('field_56990e76c6750', 'DCO Inväntar NAT', $serverid);
		
		// Update post for revision
		$my_post = array(
		'ID'           => $serverid,
		'post_content' => "Senaste ändringen. IP inskriven: " . $_POST['ip'],
		);

		// Update the post into the database
		wp_update_post( $my_post );
		
		if($_POST['nat'] != ''){
			$today = date("Y-m-d");
			update_field('field_5698e8d8c83f1', $_POST['nat'], $serverid);
			update_field('field_56990e76c6750', 'OK', $serverid);
			update_field('field_5719fe29ca352', $today, $serverid);

			// Update post for revision
			$my_post = array(
			'ID'           => $serverid,
			'post_content' => "Senaste ändringen. IP NAT inskriven: " . $_POST['nat'] . "<br> Beställning komplett.",
			);

			// Update the post into the database
			wp_update_post( $my_post );
		}
	}
	if($typ == 'ILO'){
		update_field('field_5698e8eac83f2', $_POST['ip'], $serverid);
		update_field('field_569912a005d15', 'DCO Inväntar NAT', $serverid);

		// Update post for revision
		$my_post = array(
		'ID'           => $serverid,
		'post_content' => "Senaste ändringen. ILO inskriven: " . $_POST['ip'],
		);

		// Update the post into the database
		wp_update_post( $my_post );

		if($_POST['nat'] != ''){
			update_field('field_5698e8f5c83f3', $_POST['nat'], $serverid);
			update_field('field_569912a005d15', 'OK', $serverid);
			// Update post for revision
			$my_post = array(
			'ID'           => $serverid,
			'post_content' => "Senaste ändringen. ILO NAT inskriven: " . $_POST['nat'],
			);

			// Update the post into the database
			wp_update_post( $my_post );
		}
	}
	wp_redirect( '/best/case/?p=' . get_field('parentid' , $serverid) );

};
	
?>
<?php get_header(); ?>
<div class="flex-boxes">
	<div class="flex-box flex-box-big">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<h1 class="flex-title">Konfiguration av <?php echo $typ; ?></h1>
			<fieldset>
				<?php if($typ == 'IP'){ ?>
					<form action="" id="konf-ip" method="POST">
						<label for="ip"><?php _e( $typ . '-adress *:', 'framework') ?></label>
						<input value="<?php echo get_field('ip' , $serverid); ?>" type="text" name="ip" id="ip" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" required />
						<label for="ip"><?php _e( 'NAT-adress :', 'framework') ?></label>
						<input value="" placeholder="<?php echo get_field('nat' , $serverid); ?>" type="text" name="nat" id="nat" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$"/>
						<button type="submit" form="konf-ip" id="submitted"><?php _e('Uppdatera ' . $typ . '-konfiguration', 'framework'); ?></button>
					</form>
				<?php } ?>
				<?php if($typ == 'ILO'){ ?>
					<form action="" id="konf-ip" method="POST">
						<label for="ip"><?php _e( $typ . '-adress *:', 'framework') ?></label>
						<input value="<?php echo get_field('ilo-ip' , $serverid); ?>" type="text" name="ip" id="ip" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$" required />
						<label for="ip"><?php _e( 'NAT-adress :', 'framework') ?></label>
						<input value="" placeholder="<?php echo get_field('ilo-nat' , $serverid); ?>" type="text" name="nat" id="nat" pattern="((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){3}$"/>
						<button type="submit" form="konf-ip" id="submitted"><?php _e('Uppdatera ' . $typ . '-konfiguration', 'framework'); ?></button>
					</form>
				<?php } ?>

			</fieldset>

	</div>
	<div class="flex-box">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<h1 class="flex-title">IP-info</h1>
		<fieldset>
			<h1 class="flex-title"><?php _e( $typ . '-adress:', 'framework') ?></h1>
			<p>Angen den ip-adress som du fått från kund eller networking.</p>
			<p>Denna information tas fram av beställare i samråd med den instans som äger ip-planen (tekniker, kund eller networking)</p>
		</fieldset>
		<fieldset>
			<h1 class="flex-title"><?php _e( 'NAT-adress:', 'framework') ?></h1>
			<p>Angen den NAT-adress som du fått från networking.</p>
			<p></br>Om du inte har denna information så måste du kontakta Networking</p>
		</fieldset>


	</div>
</div>


<?php get_footer(); ?>