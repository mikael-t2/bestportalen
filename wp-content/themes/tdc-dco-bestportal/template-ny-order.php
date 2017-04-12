<?php /* Template Name: Skapa order */ ?>
<?php
 
$postTitleError = '';
 
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
 
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Du glömde Ordernummret.';
        $hasError = true;
    }
    else if ( trim( $_POST['kund'] ) === '' ) {
        $postTitleError = 'Du glömde Kundnamnet.';
        $hasError = true;
    }
	else {
		 $post_information = array(
			'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
			//'post_content' => $_POST['postContent'],
			'post_type' => 'case',
			'post_status' => 'publish'
		);
	 
		$post_id = wp_insert_post( $post_information );
		update_field('field_566812f6b00ef', wp_strip_all_tags( $_POST['kund'] ), $post_id);
		update_field('field_56681383b00f1', wp_strip_all_tags( $_POST['postTitle'] ), $post_id);
		update_field('field_56681352b00f0', wp_strip_all_tags( $current_user->user_login ), $post_id);
		update_field('field_5673c23e1c0b3', wp_strip_all_tags( $_POST['avtalstyp'] ), $post_id);
		update_field('field_56d99b7e287d1', 'Ny', $post_id);
		update_field('field_56e28b76ffef3', 'Ny', $post_id);
		
		if ( $post_id ) {
			$headers = 'Content-type: text/html';
			wp_mail( 'mikael.holgersson@tdc.se', 'Ny beställning skapad: ' . $_POST['kund'] . ' - ' . $_POST['postTitle'] , 'Ny beställning skapad: ' . $_POST['kund'] . ' - ' . $_POST['postTitle'] );
			wp_mail( $current_user->user_email, 'Ny beställning skapad: ' . $_POST['kund'] . ' - ' . $_POST['postTitle'] , 
				'<h3>Tack för att du skapat din beställning för: ' . $_POST['kund'] . ' - ' . $_POST['postTitle'] . '.</h3> 
				<p>Nu är det dax att fylla på din beställning med delordrar.</p>
				<p>Här hittar du din beställning: http://infox/best/case/' . $_POST['postTitle'] . '</p>
				<p>mvh <br />DCO Beställningsportal.</p>',
				$headers );

			wp_redirect( '/best/case/' . wp_strip_all_tags( $_POST['postTitle'] ) );
			exit;
		}
	}
}
 
?>
<?php get_header(); ?>

<div class="flex-boxes">
	<div class="flex-box flex-box-big">
		<?php if ( $postTitleError != '' ) { ?>
			<span class="error"><?php echo "<h3>" . $postTitleError . "</h3>"; ?></span>
			<div class="clearfix"></div>
		<?php } ?>
		<form action="" id="primaryPostForm" method="POST">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Skapa ny beställning</h3>
			<fieldset>
				<label for="postTitle"><?php _e('Ordernummer i visma/fokus *:', 'framework') ?></label>
		 
				<input value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" type="number" name="postTitle" id="postTitle" class="required" min="2900000" max="4000000" required />
				<label for="kund"><?php _e('Kundnamn *:', 'framework') ?></label>
		 
				<input value="<?php if ( isset( $_POST['kund'] ) ) echo $_POST['kund']; ?>" type="text" name="kund" id="kund" class="required" min="2" required />
			</fieldset>
		 
			<fieldset>
				<label for="avtalstyp"><?php _e('Avtalstyp *:', 'framework') ?></label>
				<table>
					<tr>
						<td class="aright noborder"><input type="radio" name="avtalstyp" value="KST" required class="required"></td> <td class="aleft noborder"> KST</td>
					</tr>
					<tr>
						<td class="aright noborder"><input type="radio" name="avtalstyp" value="Serviceavtal" required class="required"></td> <td class="aleft noborder"> Serviceavtal</td>
					</tr>
					<tr>
						<td class="aright noborder"><input type="radio" name="avtalstyp" value="Serviceavtal (IT Management Basic)" required class="required"></td> <td class="aleft noborder">Serviceavtal (IT Management Basic)</td>
					</tr>
					<tr>
						<td class="aright noborder"><input type="radio" name="avtalstyp" value="Serviceavtal (IT Management Premium)" required class="required"></td> <td class="aleft noborder"> Serviceavtal (IT Management Premium)</td>
					</tr>
				</table>
			</fieldset>
		 
			<fieldset>
				<input type="hidden" name="submitted" id="submitted" value="true" />
				<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
				<button type="submit"><?php _e('Skapa beställning', 'framework') ?></button>
			</fieldset>
		 
		</form>
	</div>
	<div class="flex-box">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Info om avtal</h3>
			<fieldset>
				<h1 class="flex-title">KST</h1>
				<p>TDC-ägd Hårdvara + Licenser</p>
				<p>(Övervakning, antivirus, backup, Drift)</p>
			</fieldset>
		 
			<fieldset>
				<h1 class="flex-title">Serviceavtal</h1>
				<p>Kundägd Hårdvara + Licenser</p>
			</fieldset>
		 
			<fieldset>
				<h1 class="flex-title">Serviceavtal (ITM Basic)</h1>
				<p>Kundägd Hårdvara + Licenser</p>
				<p>(Övervakning)</p>
			</fieldset>
		 
			<fieldset>
				<h1 class="flex-title">Serviceavtal (ITM Premium)</h1>
				<p>Kundägd Hårdvara + Licenser</p>
				<p>(Övervakning, backup, Drift)</p>
			</fieldset>
		 
	
	</div>
</div>
<?php get_footer(); ?>