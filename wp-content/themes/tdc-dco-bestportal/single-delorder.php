<?php get_header();?>
<?php
if ( isset( $_POST['leveransadress'] )){
	update_field('field_56cd7d0e4f376', $_POST['leveransadress']);
	$headers = 'Content-type: text/html';
	wp_mail( get_field('dco-tekniker'), 'Din delorder har en ny status: ' . get_field('servernamn') . ' (Ny leveransadress)' , 
		'<h3>Meddelande till DCO-tekniker.</h3> 
		<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
		<p>Ny status: Ny leveransadress</p>
		<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
		<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
		<p></p>
		<p>mvh <br />DCO Beställningsportal.</p>',
		$headers );
		
	
	// Update post for revision
	$my_post = array(
      'ID'           => $post->ID,
      'post_content' => "Senaste ändringen. ny leveransadress: " . $_POST['leveransadress'],
	);

	// Update the post into the database
	wp_update_post( $my_post );
		
};
if ( isset( $_GET['nystatus'] ) ) {
	$post_date = get_the_date();
	$tidigare_dco_tekniker = get_field('dco-tekniker');
	update_field('field_5719fed6ca354', $post_date, $post_id);
	update_field('field_568fc749a7925', $_GET['nystatus'], $post_id);
	update_field('field_56cd7e7a82bd6', $current_user->user_email, $post_id);
	if ($_GET['nystatus'] == 'Grundinstallation Klar'){
		$today = date("Y-m-d");
		update_field('field_5719fe93ca353', $today, $serverid);
	}
	
	// Update post for revision
	$my_post = array(
      'ID'           => $post->ID,
      'post_content' => "Senaste ändringen. ny status: " . $_GET['nystatus'],
	);

	// Update the post into the database
	wp_update_post( $my_post );
};
$bestallare = get_user_by( 'login', get_field('bestallare', get_field('parentid')) );
$bestallare_mail = $bestallare->user_email;

?>

	<div class="flex-boxes">
		<div class="flex-box flex-box-big">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Delorder</h3>
            <h1 class="flex-title"><?php the_title(); ?></h1>
			<div class="divTable">
				<div class="divRow">
					<div class="divCell50"><strong>Kund:</strong></div>
					<div class="divCell50"><?php echo get_field('kundnamn', get_field('parentid')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Servernamn:</strong></div>
					<div class="divCell50"><?php echo get_field('servernamn'); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Applikation:</strong></div>
					<div class="divCell50"><?php echo get_field('applikation'); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Placering:</strong></div>
					<div class="divCell50"><?php echo get_field('placering'); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Beställare:</strong></div>
					<div class="divCell50"><?php echo '<a href="mailto:' . $bestallare_mail . '">' . $bestallare_mail . '</a> '; ?></div>
				</div>
				<?php if(get_field('casetyp', get_field('parentid') ) != 'nod'){?>
					<div class="divRow">
						<div class="divCell50"><strong>Mottagande tekniker:</strong></div>
						<div class="divCell50"><?php echo '<a href="mailto:' . get_field('teknikermail') . '">' . get_field('teknikermail') . '</a> '; ?></div>
					</div>
				<?php } ?>
				<div class="divRow">
					<div class="divCell50"><strong>DCO tekniker:</strong></div>
					<div class="divCell50"><?php echo '<a href="mailto:' . get_field('dco-tekniker') . '">' . get_field('dco-tekniker') . '</a> '; ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Orderstatus:</strong></div>
					<div class="divCell50"><?php echo get_field('orderstatus'); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Ordertyp:</strong></div>
					<div class="divCell50"><?php echo get_field('ordertyp'); ?></div>
				</div>
				<?php if(get_field('casetyp', get_field('parentid') ) != 'nod'){?>
					<div class="divRow">
						<div class="divCell50"><strong>MS-SQL:</strong></div>
						<div class="divCell50"><?php echo get_field('mssql'); ?></div>
					</div>
				<?php } ?>
			</div>
			
			<?php if (get_field('sight_id' , $serverid) != 'Saknas'){ ?>
				<h1 class="flex-title"><br>Sight-specifik information.</h1>
			<div class="divTable">
				<div class="divRow">
					<div class="divCell50"><strong>Adress:</strong></div>
					<div class="divCell50"><?php echo get_field('adress', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Ort:</strong></div>
					<div class="divCell50"><?php echo get_field('ort', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Default gateway:</strong></div>
					<div class="divCell50"><?php echo get_field('dfg', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Nätmask:</strong></div>
					<div class="divCell50"><?php echo get_field('subnet_mask', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>DNS 1:</strong></div>
					<div class="divCell50"><?php echo get_field('dns_1', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>DNS 2:</strong></div>
					<div class="divCell50"><?php echo get_field('dns_2', get_field('sight_id')); ?></div>
				</div>
				<div class="divRow">
					<div class="divCell50"><strong>Vlan:</strong></div>
					<div class="divCell50"><?php echo get_field('vlan', get_field('sight_id')); ?></div>
				</div>
			</div>	
			<?php } ?>
			
			<h1 class="flex-title"><br>IP-plan för denna Server.</h1>
			<div class="divTable">
				 <div class="headRow">
					<div class="divCell25" align="center"><b>Servernamn</b></div>
					<div  class="divCell25"><b>IP</b></div>
					<div  class="divCell25"><b>NAT</b></div>
					<div  class="divCell25"><b>Status</b></div>
				 </div>
				<div class="divRow">
					<div class="divCell25"><?php echo get_the_title(); ?></div>
					<div class="divCell25"><?php the_field('ip'); ?></div>
					<div class="divCell25"><?php the_field('nat'); ?></div>
					<div class="divCell25"><?php the_field('ip-status'); ?></div>
				</div>
				<?php if (get_field('placering') != 'Virtuell i Vreten' AND get_field('placering') != 'Virtuell Hos kund' AND get_field('nod_har_ilo') != 'Nej'){;?>
					<div class="divRow">
						<div class="divCell25"><?php echo "ilo" . get_the_title(); ?></div>
						<div class="divCell25"><?php the_field('ilo-ip'); ?></div>
						<div class="divCell25"><?php the_field('ilo-nat'); ?></div>
						<div class="divCell25"><?php the_field('ilo_status'); ?></div>
					</div>
				<?php } ?>
			</div>	
			<?php if(get_field('casetyp', get_field('parentid') ) != 'nod'){?>
			
				<h1 class="flex-title"><br>Inloggningar.</h1>
				<div class="divTable">
					<div class="divRow">
						<div class="divCell33">Server</div>
						<div class="divCell33">root</div>
						<div class="divCell33">Toor!<?php echo get_field('kundforkortning', get_field('parentid')); ?>16!</div>
					</div>
					<?php if (get_field('placering') != 'Virtuell i Vreten' AND get_field('placering') != 'Virtuell Hos kund' AND get_field('nod_har_ilo') != 'Nej'){;?>
						<div class="divRow">
							<div class="divCell33">ILO</div>
							<div class="divCell33">iloroot</div>
							<div class="divCell33">Toor!<?php echo get_field('kundforkortning', get_field('parentid')); ?>16!</div>
						</div>
					<?php } ?>
					<?php if (get_field('mssql') == 'MSSQL-Standard'){;?>
						<div class="divRow">
							<div class="divCell33">MSSQL</div>
							<div class="divCell33">sa</div>
							<div class="divCell33">sa!rmc2015!</div>
						</div>
					<?php } ?>
				</div>	
				
				<?php if (get_field('placering') != 'Virtuell i Vreten' AND get_field('placering') != 'Virtuell Hos kund'){;?>
					<h1 class="flex-title"><br>Leveransadress.</h1>
					<fieldset>
						<form action="" id="leveransadress_form" method="POST">
							<label for="leveransadress"><?php _e( 'Leveransadress:', 'framework') ?></label>
							<textarea placeholder='DCO saknar en leveransadress, ange adressen här:' name="leveransadress" id="leveransadress" ><?php echo get_field('leveransadress'); ?></textarea>
							<button type="submit" form="leveransadress_form" id="submitted"><?php _e('Uppdatera leveransadress', 'framework'); ?></button>
						</form>
					</fieldset>
				<?php } ?>
			<?php } ?>

		</div>
		<div class="flex-box">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Meny Delorder</h3>
			<form action="<?php echo get_permalink(get_field('parentid')); ?>" id="retur_best" method="post">
	 
				<button type="submit" form="retur_best"><?php _e('Åter till beställning', 'framework') ?></button>
			</form>
			</br>
			<?php
				$userrole = array_shift($current_user->roles);
				if ($userrole == 'administrator') {?>
					<fieldset>
						<h1 class="flex-title">Ändra status:</h1>
					<?php
						$loop = new WP_Query( array( 'post_type' => 'status') );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php $status = get_the_title();?>
									<a href="?nystatus=<?php echo $status?>&statusid=<?php echo get_the_ID();?>"><?php echo $status ?></a>
									<br />
								<?php endwhile;
						endif;

						wp_reset_postdata();
						if ( isset( $_GET['nystatus'] ) ) {
							echo '<br /><h1 class="flex-title">Status uppdaterad till:</h1>' . $_GET['nystatus'] . '<br />ID:' . $_GET['statusid'];
							$headers = 'Content-type: text/html';
							$statusid = $_GET['statusid'];
							$skicka_rmc = get_field('mail_till_rmc', $statusid);
							$skicka_dco_tekniker = get_field('mail_till_dco-tekniker', $statusid);
							$skicka_bestallare = get_field('mail_till_bestallare', $statusid);
							$skicka_tekniker = get_field('mail_till_mottagande_tekniker', $statusid);
							
							
							if ( $skicka_rmc == 1 ){
								wp_mail( 'rmc@tdc.se', 'Din delorder har en ny status: ' . get_field('servernamn') . ' (' . $_GET['nystatus'] . ')' , 
									'<h3>Meddelande till RMC.</h3> 
									<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
									<p>Ny status: ' . $_GET['nystatus'] . '</p>
									<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
									<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
									<p>' . get_field('meddelande_till_rmc', $statusid) . '</p>
									<p>mvh <br />DCO Beställningsportal.</p>',
									$headers );
							};
							if ( $skicka_dco_tekniker == 1 ){
								wp_mail( get_field('dco-tekniker'), 'Din delorder har en ny status: ' . get_field('servernamn') . ' (' . $_GET['nystatus'] . ')' , 
									'<h3>Meddelande till DCO-tekniker.</h3> 
									<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
									<p>Ny status: ' . $_GET['nystatus'] . '</p>
									<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
									<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
									<p>' . get_field('meddelande_till_dco-tekniker', $statusid) . '</p>
									<p>mvh <br />DCO Beställningsportal.</p>',
									$headers );
							};
							if ( $skicka_bestallare == 1 ){
								wp_mail( $bestallare_mail, 'Din delorder har en ny status: ' . get_field('servernamn') . ' (' . $_GET['nystatus'] . ')' , 
									'<h3>Meddelande till Beställare.</h3> 
									<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
									<p>Ny status: ' . $_GET['nystatus'] . '</p>
									<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
									<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
									<p>' . get_field('meddelande_till_bestallare', $statusid) . '</p>
									<p>mvh <br />DCO Beställningsportal.</p>',
									$headers );
							};
							if ( $skicka_tekniker == 1 ){
								wp_mail( get_field('teknikermail'), 'Din delorder har en ny status: ' . get_field('servernamn') . ' (' . $_GET['nystatus'] . ')' , 
									'<h3>Meddelande till mottagande tekniker.</h3> 
									<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
									<p>Ny status: ' . $_GET['nystatus'] . '</p>
									<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
									<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
									<p>' . get_field('meddelande_till_motagande_tekniker', $statusid) . '</p>
									<p>mvh <br />DCO Beställningsportal.</p>',
									$headers );
							};
							if (isset ($tidigare_dco_tekniker)){
								if ( $tidigare_dco_tekniker != $current_user->user_email){
									wp_mail( $tidigare_dco_tekniker, 'Din delorder har en ny status: ' . get_field('servernamn') . ' (' . $_GET['nystatus'] . ')' , 
										'<h3>Meddelande till DCO-tekniker.</h3> 
										<h3>Ändrad status för följande utrustning: ' . get_field('servernamn') . '.</h3> 
										<p>Ny status: ' . $_GET['nystatus'] . '</p>
										<p>Utrustningen ovan tillhör beställning: ' . get_field('kundnamn', get_field('parentid')) . ' - ' . get_the_title(get_field('parentid')) . '.</p>
										<p>Här hittar du beställningens delorder: ' . get_permalink( $post->ID ) . '</p>
										<p>>Nuvarande DCO-tekniker: ' . $current_user->user_email . '<br/> Tidigare DCO-tekniker: ' . $tidigare_dco_tekniker . '</p>
										<p>mvh <br />DCO Beställningsportal.</p>',
										$headers );
								}
							};

							
						};
						
					?>
					</fieldset>
					<fieldset>
						<h1 class="flex-title">Pris-kalkylator</h1>
						<p>Vad kostar en server</p>

						<div class="silder-pos">
							<span id="cpu-output"><b>CPU</b></span>
							<input type="text" id="cpu-slider" name="pris" data-slider="true" data-slider-values="2,4,6,8,10,12,14,16,18,20" data-slider-equal-steps="true" data-slider-snap="true" />
						</div>
						<div class="silder-pos">
							<span id="minne-output"><b>Minne</b></span>				
							<input type="text" id="minne-slider" name="pris" data-slider="true" data-slider-values="1,2,4,6,8,10,12,14,16,18,20" data-slider-equal-steps="true" data-slider-snap="true" />
						</div>
						<div class="silder-pos">
							<p>Månadskostnad för avtalet</p>
						</div>

					</fieldset>
				<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>