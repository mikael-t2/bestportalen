<?php /* Template Name: Skapa delorder */ ?>
<?php
	$order = "Saknas";
	$typ = "Saknas";
	$ordertyp = "Saknas";
	$kundforkortning = "Saknas";
	$applikation = "Saknas";
	$placering = "Saknas";
	$parentid = "Saknas";
	$avtalstyp = "Saknas";
	$kundnamn = "Saknas";
	$servernamn = "Saknas";
	$tekniker = "Saknas";
	$mssql = "Saknas";
	$add_applikation_operativ = "Saknas";
	$add_applikation_namn = "Saknas";
	$add_applikation_forkortning = "Saknas";
//				echo $applikation;
	
if ( isset( $_POST['add_applikation_namn'] ) ) {
	 $post_information = array(
		'post_title' => wp_strip_all_tags( $_POST['add_applikation_namn'] ),
		//'post_content' => $_POST['postContent'],
		'post_type' => 'servertyp',
		'post_status' => 'publish'
	);
 
	$post_id = wp_insert_post( $post_information );
	update_field('field_568bac2171b1c', wp_strip_all_tags( $_POST['add_applikation_operativ'] ), $post_id);
	update_field('field_568baacdbb0f5', wp_strip_all_tags( $_POST['add_applikation_forkortning'] ), $post_id);
	
}
	
	
if ( isset( $_POST['order'] ) ) {
	$order = $_POST['order'];
	$typ = $_POST['submittype'];
	$submittype = $_POST['submittype'];
	$ordertyp = $_POST['ordertyp'];
	$kundforkortning = $_POST['kundforkortning'];
	if ( isset( $_POST['add_applikation_namn'] ) ) {
		$applikation = $_POST['add_applikation_namn'];
	}else{
		$applikation = $_POST['applikation'];
	}
	$placering = $_POST['placering'];
	$parentid = $_POST['parentid'];
	$avtalstyp = $_POST['avtalstyp'];
	$kundnamn = $_POST['kundnamn'];
	$servernamn = $_POST['servernamn'];
	$tekniker = $_POST['tekniker'];
	$mssql = $_POST['mssql'];
	$add_applikation_operativ = $_POST['add_applikation_operativ'];
	$add_applikation_namn = $_POST['add_applikation_namn'];
	$add_applikation_forkortning = $_POST['add_applikation_forkortning'];
	$nodnamn = $_POST['nodnamn'];
				echo $_POST['nodnamn'];
				echo $typ;


	if ($applikation == 'annan'){
		$typ = 'applikation';
	}
	if ($applikation == 'annan_nod'){
		$typ = 'applikation_nod';
	}
	
	if ($typ == 'server - del 2'){
		update_field('field_568bc107f50c3', wp_strip_all_tags( $kundforkortning ), $parentid);
	}
	if ($typ == 'server - del 3'){
		 $post_information = array(
			'post_title' => wp_strip_all_tags( $_POST['servernamn'] ),
			//'post_content' => $_POST['postContent'],
			'post_type' => 'delorder',
			'post_status' => 'publish'
		);
	 
		$post_id = wp_insert_post( $post_information );
		update_field('field_568fa89a4dff2', wp_strip_all_tags( $_POST['servernamn'] ), $post_id);
		update_field('field_568fa7e64dfef', wp_strip_all_tags( $_POST['parentid'] ), $post_id);
		update_field('field_568fa83a4dff0', $applikation , $post_id);
		update_field('field_568fa8704dff1', $placering , $post_id);
		update_field('field_568fa8ca4dff3', wp_strip_all_tags( $_POST['tekniker'] ), $post_id);
		update_field('field_568fc79785d53', wp_strip_all_tags( $_POST['ordertyp'] ), $post_id);
		update_field('field_5697a74d33b98', wp_strip_all_tags( $_POST['mssql'] ), $post_id);
		update_field('field_5698e8d1c83f0', 'Saknas', $post_id);
		update_field('field_5698e8d8c83f1', 'Saknas', $post_id);
		update_field('field_5698e8eac83f2', 'Saknas', $post_id);
		update_field('field_5698e8f5c83f3', 'Saknas', $post_id);
		update_field('field_5698e946c83f4', 'Saknas', $post_id);
		update_field('field_56990e76c6750', 'DCO inväntar IP', $post_id);
		update_field('field_56990fc59c67f', 'Saknas', $post_id);
		update_field('field_569912a005d15', 'DCO inväntar IP', $post_id);
		if($placering == 'Virtuell i Vreten'){
		update_field('field_568fc749a7925', wp_strip_all_tags( 'DCO har mottagit beställning' ), $post_id);
		}else{
		update_field('field_568fc749a7925', wp_strip_all_tags( 'DCO Inväntar server' ), $post_id);
		}

		if ( $post_id ) {
			$headers = 'Content-type: text/html';
			wp_mail( 'mikael.holgersson@tdc.se, rmc@tdc.se', 'Ny delorder skapad: ' . $_POST['servernamn'] , 
				'<h3>En ny delorder är skapad för följande utrustning: ' . $_POST['servernamn'] . '.</h3> 
				<p>Utrustningen ovan tillhör beställning: ' . $kundnamn . ' - ' . $order . '.</p>
				<p>Här hittar du din beställning: http://infox/best/case/' . $order . '</p>
				<p>mvh <br />DCO Beställningsportal.</p>',
				$headers );

			wp_mail( $current_user->user_email, 'Ny delorder skapad: ' . $_POST['servernamn'] , 
				'<h3>Tack för att du skapat din delorder för följande utrustning: ' . $_POST['servernamn'] . '.</h3> 
				<p>Utrustningen ovan tillhör beställning: ' . $kundnamn . ' - ' . $order . '.</p>
				<p>Här hittar du din beställning: http://infox/best/case/' . $order . '</p>
				<p>Glöm inte att fylla i ip-planen för ' . $_POST['servernamn'] . '. <br />Dessa uppgifter behöver vi för att kunna sätta upp övervakning, remoteaccess, visionapp mm</p>
				<p>DCO kommer innom kort att påbörja arbetat med din beställning. <br /> status-uppdateringar kommer att skickas till personen som står som beställare</p>
				<p>mvh <br />DCO Beställningsportal.</p>',
				$headers );
				
				
			wp_redirect( '/best/case/' . wp_strip_all_tags( $_POST['order'] ) );
			exit;
		}
	}
	if ($typ == 'nod - del 2'){
		 $post_information = array(
			'post_title' => wp_strip_all_tags( $_POST['nodnamn'] ),
			//'post_content' => $_POST['postContent'],
			'post_type' => 'delorder',
			'post_status' => 'publish'
		);
	 
		$post_id = wp_insert_post( $post_information );
		update_field('field_568fa89a4dff2', wp_strip_all_tags( $_POST['nodnamn'] ), $post_id);
		update_field('field_568fa7e64dfef', wp_strip_all_tags( $_POST['parentid'] ), $post_id);
		update_field('field_568fa83a4dff0', $applikation , $post_id);
		update_field('field_568fa8704dff1', $placering , $post_id);
		update_field('field_568fa8ca4dff3', 'Saknas', $post_id);
		update_field('field_568fc79785d53', wp_strip_all_tags( $_POST['ordertyp'] ), $post_id);
		update_field('field_5697a74d33b98', 'Saknas', $post_id);
		update_field('field_5698e8d1c83f0', 'Saknas', $post_id);
		update_field('field_5698e8d8c83f1', 'Saknas', $post_id);
		update_field('field_5698e8eac83f2', 'Saknas', $post_id);
		update_field('field_5698e8f5c83f3', 'Saknas', $post_id);
		update_field('field_5698e946c83f4', 'Saknas', $post_id);
		update_field('field_56990e76c6750', 'DCO inväntar IP', $post_id);
		update_field('field_56990fc59c67f', 'Saknas', $post_id);
		update_field('field_569912a005d15', 'DCO inväntar IP', $post_id);
		update_field('field_568fc749a7925', wp_strip_all_tags( 'DCO har mottagit beställning' ), $post_id);
		update_field('field_5759407fe45bc', wp_strip_all_tags( $_POST['ilo'] ), $post_id);
		if ( $post_id ) {
			$headers = 'Content-type: text/html';
			wp_mail( 'mikael.holgersson@tdc.se, rmc@tdc.se', 'Ny delorder skapad: ' . $_POST['nodnamn'] , 
				'<h3>En ny delorder är skapad för följande utrustning: ' . $_POST['nodnamn'] . '.</h3> 
				<p>Utrustningen ovan tillhör beställning: ' . $kundnamn . ' - ' . $order . '.</p>
				<p>Här hittar du din beställning: http://infox/best/case/' . $order . '</p>
				<p>mvh <br />DCO Beställningsportal.</p>',
				$headers );

			wp_mail( $current_user->user_email, 'Ny delorder skapad: ' . $_POST['nodnamn'] , 
				'<h3>Tack för att du skapat din delorder för följande utrustning: ' . $_POST['nodnamn'] . '.</h3> 
				<p>Utrustningen ovan tillhör beställning: ' . $kundnamn . ' - ' . $order . '.</p>
				<p>Här hittar du din beställning: http://infox/best/case/' . $order . '</p>
				<p>Glöm inte att fylla i ip-planen för ' . $_POST['nodnamn'] . '. <br />Dessa uppgifter behöver vi för att kunna sätta upp övervakning, remoteaccess, visionapp mm</p>
				<p>DCO kommer innom kort att påbörja arbetat med din beställning. <br /> status-uppdateringar kommer att skickas till personen som står som beställare</p>
				<p>mvh <br />DCO Beställningsportal.</p>',
				$headers );
				
				
			wp_redirect( '/best/case/' . wp_strip_all_tags( $_POST['order'] ) );
			exit;
		}
	}

}

?>
<?php get_header(); ?>
<div class="flex-boxes">
	<div class="flex-box flex-box-big">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<?php //echo "<h3>Ordernummer: " . $order . "</h3>";?>
		<?php //echo "<h1 class=\"flex-title\">Ordertyp: " . $typ . "</h1>";?>
		<?php //echo "<h1 class=\"flex-title\">kundförkortning: " . $kundforkortning . "</h1>";?>

		<h1 class="flex-title">Lägg till <?php echo $typ; ?></h1>
		<?php //echo "<h1 class=\"flex-title\">Ordernummer i visma/fokus : " . $order . "</h1>";?>


<!--********************nod del 1***************************-->		
		<?php if ($typ =='nod'){?>
			<form action="" id="server-step1" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="nod - del 2" >
				<input type="hidden" name="ordertyp" id="submitted" value="nod" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
				<label for="kund"><?php _e('Ange namnet på noden som du vill lägga till i visionapp <br />(Nodens riktiga namn)*:', 'framework') ?></label>
				<input type="text" name="nodnamn" id="nodnamn" class="required" pattern="{2,25}" required />
			 
				</fieldset>
				<fieldset>
					<label for="applikation"><?php _e('Ange den applikation som ligger på noden *:', 'framework') ?></label>
					<table>
					<?php
						$loop = new WP_Query( array( 'orderby' => 'title', 'order'   => 'ASC', 'post_type' => 'servertyp') );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php $appnamn = get_the_title();?>
								<tr>
									<td class="aright noborder"><input type="radio" name="applikation" value="<?php echo $appnamn; ?>" required class="required"></td> <td class="aleft noborder"> <?php echo get_the_title(); ?></td>
								</tr>
							<?php endwhile;
						endif;

						wp_reset_postdata();
					?>
						<tr>
							<td class="aright noborder"><input type="radio" name="applikation" value="annan_nod" required class="required"></td> <td class="aleft noborder"><font color="red">Annan Konfig </font></td>
						</tr>
					</table>
				</fieldset>
			 
				<fieldset>
					<label for="placering"><?php _e('Ange var noden är placerad*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Virtuell i Vreten" required class="required"></td> <td class="aleft noborder">Virtuell i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i Vreten" required class="required"></td> <td class="aleft noborder">Fysisk i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i TDC-serverhall" required class="required"></td> <td class="aleft noborder">Fysisk i TDC-serverhall </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Kundplacerad" required class="required"></td> <td class="aleft noborder">Kundplacerad </td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<label for="ilo"><?php _e('Har noden ILO-interface*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="ilo" value="Ja" required class="required"></td> <td class="aleft noborder">Ja </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="ilo" value="Nej" required class="required"></td> <td class="aleft noborder">Nej </td>
						</tr>
					</table>
				</fieldset>
			 
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
			 
			</form>
		<?php } ?>
<!--********************SLUT nod del 1***************************-->		


<!--********************backup del 1***************************-->		
		<?php if ($typ =='backup'){?>
			<form action="" id="server-step1" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="backup - del 2" >
				<input type="hidden" name="ordertyp" id="submitted" value="backup" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
				
				
					<?php if ($kundforkortning !=''){?>
						<label for="kund"><?php _e('Förkortning som kommer att användas som del av servernamnet:', 'framework') ?></label>
						<?php echo "<h1 class=\"flex-title\">\"" . $kundforkortning . "\"</h1>";?>
					<?php }else{?>
						<label for="kund"><?php _e('Ange en förkortning som beskriver kunden med 2-5 tecken <br />(endast a-z får användas) *:', 'framework') ?></label>
						<input value="<?php if ( isset( $_POST['kundforkortning'] ) ) echo $_POST['kundforkortning']; ?>" type="text" name="kundforkortning" id="kund" class="required" pattern="[a-z]{2,5}" required />
					<?php }?>

				</fieldset>
			 
				<fieldset>
					<label for="placering"><?php _e('Ange var backupservern kommer att placeras*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="TDC-serverhall" required class="required"></td> <td class="aleft noborder">TDC-serverhall </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Kundplacerad" required class="required"></td> <td class="aleft noborder">Kundplacerad </td>
						</tr>
					</table>
				</fieldset>
			 
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
				<fieldset>
					<h1 class="flex-title">Kostnad</h1>
				<fieldset>

			 
			</form>
		<?php } ?>
<!--********************SLUT backup del 1***************************-->		


<!--********************Server del 1***************************-->		
		<?php if ($typ =='server'){?>
			<form action="" id="server-step1" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="server - del 2" >
				<input type="hidden" name="ordertyp" id="submitted" value="server" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
				<?php if ($kundforkortning !=''){?>
					<label for="kund"><?php _e('Förkortning som kommer att användas som del av servernamnet:', 'framework') ?></label>
					<?php echo "<h1 class=\"flex-title\">\"" . $kundforkortning . "\"</h1>";?>
				<?php }else{?>
					<label for="kund"><?php _e('Ange en förkortning som beskriver kunden med 2-5 tecken <br />(endast a-z får användas) *:', 'framework') ?></label>
					<input value="<?php if ( isset( $_POST['kundforkortning'] ) ) echo $_POST['kundforkortning']; ?>" type="text" name="kundforkortning" id="kund" class="required" pattern="[a-z]{2,5}" required />
				<?php }?>
			 
				</fieldset>
				<fieldset>
					<label for="applikation"><?php _e('Ange den applikation som kommer att ligga på servern *:', 'framework') ?></label>
					<table>
					<?php
						$loop = new WP_Query( array( 'orderby' => 'title', 'order'   => 'ASC', 'post_type' => 'servertyp') );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php $appnamn = get_the_title();?>
								<tr>
									<td class="aright noborder"><input type="radio" name="applikation" value="<?php echo $appnamn; ?>" required class="required"></td> <td class="aleft noborder"> <?php echo get_the_title(); ?></td>
								</tr>
							<?php endwhile;
						endif;

						wp_reset_postdata();
					?>
						<tr>
							<td class="aright noborder"><input type="radio" name="applikation" value="annan" required class="required"></td> <td class="aleft noborder"><font color="red">Annan Konfig </font></td>
						</tr>
					</table>
				</fieldset>
			 
				<fieldset>
					<label for="placering"><?php _e('Ange var servern ska vara placerad*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Virtuell i Vreten" required class="required"></td> <td class="aleft noborder">Virtuell i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i Vreten" required class="required"></td> <td class="aleft noborder">Fysisk i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i TDC-serverhall" required class="required"></td> <td class="aleft noborder">Fysisk i TDC-serverhall </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Kundplacerad" required class="required"></td> <td class="aleft noborder">Kundplacerad </td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
			 
			</form>
		<?php } ?>
<!--********************SLUT Server del 1***************************-->		


<!--********************Server del 2***************************-->		
		<?php if ($typ =='server - del 2'){?>
			<?php
//				echo $applikation;
//				echo "<h1 class=\"flex-title\">Applikation : " . $applikation . "</h1>";
				$loop = new WP_Query( array( 'post_type' => 'servertyp') );
				if ( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php if ($applikation == get_the_title()){;
							$servernamndel = get_field('operativ') . $kundforkortning . get_field('forkortning') . "0";
							$nameindex = 1;
							$servernamn = $servernamndel . $nameindex;
							while (dco_post_exists($servernamndel . $nameindex)){;
								$nameindex ++;
								$servernamn = $servernamndel . $nameindex;
							};
							//echo "<h1 class=\"flex-title\">Servernamn : " . $servernamn . "</h1>";
							//echo "<h1 class=\"flex-title\">Placering : " . $placering . "</h1>";
						};?>
					<?php endwhile;
				endif;

				wp_reset_postdata();
			?>
			<form action="" id="server-step2" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="server - del 3" >
				<input type="hidden" name="ordertyp" id="submitted" value="server" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="applikation" id="submitted" value="<?php echo $applikation; ?>" >
				<input type="hidden" name="placering" id="submitted" value="<?php echo $placering; ?>" >
				<input type="hidden" name="servernamn" id="submitted" value="<?php echo $servernamn; ?>" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
					<label for="tekniker"><?php _e('Mottagande tekniker:</br>Mailadress till tekniker som ska fortsätta med serven när DCO är klara</br> (Måste vara en tdc-adress) *:', 'framework') ?></label>
					<input value="" type="email" name="tekniker" id="tekniker" class="required" pattern="[a-z0-9._%+-]+@tdc.se$" required />
				</fieldset>
			 
				<fieldset>
					<label for="mssql"><?php _e('Ska servern ha MSSQL *:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="mssql" value="Ingen MSSQL" required class="required"></td> <td class="aleft noborder">Ingen MSSQL </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="mssql" value="MSSQL Express" required class="required"></td> <td class="aleft noborder">MSSQL Express </td>
						</tr>
						<?php if ($avtalstyp == 'KST'){; ?>
							<tr>
								<td class="aright noborder"><input type="radio" name="mssql" value="MSSQL-Standard" required class="required"></td> <td class="aleft noborder">MSSQL Standard</td>
							</tr>
						<?php }; ?>
					</table>
					<?php if ($avtalstyp == 'KST'){; ?>
						<h1 class="flex-title">OBS!! MSSQL-standard kostar 5.000 - 16.000/månad</h1>
					<?php }; ?>

				</fieldset>
			 
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
			 
			</form>
		<?php } ?>
<!--********************SLUT Server del 2***************************-->		




<!--********************Applikation***************************-->		
		<?php if ($typ =='applikation'){?>
			<form action="" id="add_applikation" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="server - del 2" >
				<input type="hidden" name="ordertyp" id="submitted" value="server" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
					<label for="add_applikation_operativ"><?php _e('Ange det operativsystem som applikationen behöver *:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="add_applikation_operativ" value="lin" required class="required"></td> <td class="aleft noborder">Linux </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="add_applikation_operativ" value="win" required class="required"></td> <td class="aleft noborder">Windows </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="add_applikation_operativ" value="apl" required class="required"></td> <td class="aleft noborder">Appliance </td>
						</tr>
					</table>
					<label for="add_applikation_namn"><?php _e('Ange den applikation som kommer att ligga på servern *:', 'framework') ?></label>
					<input value="" type="text" name="add_applikation_namn" id="add_applikation_namn" class="required" pattern="{2,20}" required />

					<label for="add_applikation_forkortning"><?php _e('Ange en förkortning som beskriver applikationen med 2-5 tecken (endast a-z får användas) *:', 'framework') ?></label>
					<input value="" type="text" name="add_applikation_forkortning" id="add_applikation_forkortning" class="required" pattern="[a-z]{2,5}" required />
	
				</fieldset>
			 
				<fieldset>
					<label for="placering"><?php _e('Ange var servern ska vara placerad*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Virtuell i Vreten" required class="required"></td> <td class="aleft noborder">Virtuell i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i Vreten" required class="required"></td> <td class="aleft noborder">Fysisk i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk kundplacerad" required class="required"></td> <td class="aleft noborder">Fysisk kundplacerad </td>
						</tr>
					</table>
				</fieldset>
			 
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
			 
			</form>
		<?php } ?>
<!--********************SLUT Applikation***************************-->		



<!--********************Applikation_nod***************************-->		
		<?php if ($typ =='applikation_nod'){?>
			<form action="" id="add_applikation" method="POST">
				<input type="hidden" name="order" id="submitted" value="<?php echo $order; ?>" >
				<input type="hidden" name="submittype" id="submitted" value="nod - del 2" >
				<input type="hidden" name="ordertyp" id="submitted" value="nod" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php echo $kundnamn; ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php echo $avtalstyp; ?>" >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php echo $kundforkortning; ?>" >
				<input type="hidden" name="submitted" id="submitted" value="true" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo $parentid; ?>" >
				<fieldset>
					<label for="kund"><?php _e('Ange namnet på noden som du vill lägga till i visionapp <br />(Nodens riktiga namn)*:', 'framework') ?></label>
					<input type="text" value="<?php echo $nodnamn?>" name="nodnamn" id="nodnamn" class="required" pattern="{2,25}" required />
				</fieldset>
				<fieldset>
					<label for="add_applikation_operativ"><?php _e('Ange det operativsystem som ligger på noden *:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="add_applikation_operativ" value="lin" required class="required"></td> <td class="aleft noborder">Linux </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="add_applikation_operativ" value="win" required class="required"></td> <td class="aleft noborder">Windows </td>
						</tr>
					</table>
					<label for="add_applikation_namn"><?php _e('Ange den applikation som ligger på noden *:', 'framework') ?></label>
					<input value="" type="text" name="add_applikation_namn" id="add_applikation_namn" class="required" pattern="{2,20}" required />

					<label for="add_applikation_forkortning"><?php _e('Ange en förkortning som beskriver applikationen med 2-5 tecken (endast a-z får användas) *:', 'framework') ?></label>
					<input value="" type="text" name="add_applikation_forkortning" id="add_applikation_forkortning" class="required" pattern="[a-z]{2,5}" required />
	
				</fieldset>
			 
				<fieldset>
					<label for="placering"><?php _e('Ange var noden är placerad*:', 'framework') ?></label>
					<table>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Virtuell i Vreten" required class="required"></td> <td class="aleft noborder">Virtuell i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk i Vreten" required class="required"></td> <td class="aleft noborder">Fysisk i Vreten </td>
						</tr>
						<tr>
							<td class="aright noborder"><input type="radio" name="placering" value="Fysisk kundplacerad" required class="required"></td> <td class="aleft noborder">Fysisk kundplacerad </td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<button type="submit"><?php _e('Nästa >>', 'framework') ?></button>
					<?php// echo "parentid: " . $parentid;?>
				</fieldset>
			 
			</form>
		<?php } ?>
<!--********************SLUT Applikation_nod***************************-->		



	</div>
	<div class="flex-box">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
		<h1 class="flex-title">Delorder-info</h1>
		<fieldset>
			<h1 class="flex-title">Visma/Fokus: <?php echo $order; ?></h1>
			<h1 class="flex-title">Kundnamn: <?php echo $kundnamn; ?></h1>
			<h1 class="flex-title">Kundförkortning: <?php echo $kundforkortning; ?></h1>
		</fieldset>

		<?php if ($typ =='server'){?>
		
		<?php } ?>

		<?php if ($typ =='server - del 2'){?>
		<fieldset>
			<h1 class="flex-title">Servernamn: <?php echo $servernamn; ?></h1>
			<h1 class="flex-title">Applikation: <?php echo $applikation; ?></h1>
			<h1 class="flex-title">Palcering: <?php echo $placering; ?></h1>
		</fieldset>
		
		<?php } ?>

	</div>
</div>


<?php get_footer(); ?>