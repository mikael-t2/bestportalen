<?php get_header();?>
	<div class="flex-boxes vy-single-case">
		<div class="flex-box flex-box-big">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Beställning</h3>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php $user = dco_get_user_info();?>
                <fieldset>
				<h1 class="flex-title"><span id="setKund"><?php the_field('kundnamn'); ?></span> - <span id="setOrdernummer"><?php the_title(); ?></span></h1>
				<p>Avtalstyp: <?php the_field('avtalstyp'); ?></p>
				<p>Beställare: <?php echo '<a href="mailto:' . $user->user_email . '">' . $user->full_name . '</a> '; ?> (<?php echo $user->userrole; ?>)</p>
				</fieldset>
                <br>
				<h1 class="flex-title">Delorder</h1>
				<p>(För att visa delordern tryck på servernamnet nedan)</p>
				<div class="divTable">
					 <div class="headRow">
						<div class="divCell25" align="center"><b>Delorder</b></div>
						<div  class="divCell25"><b>Order-Typ</b></div>
						<div  class="divCell50"><b>Status</b></div>
					 </div>
					<?php
						$parrent = get_the_ID();
						dco_init_case_status($parrent);
						$loop = new WP_Query( array( 'post_type' => 'delorder') );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post();
								if (get_field('parentid') == $parrent){;?>
									<div class="divRow">
										<div class="divCell25"><a href=<?php the_permalink(); ?>><?php echo get_the_title(); ?></a></div>
										<div class="divCell25"><?php the_field('ordertyp'); ?></div>
										<div class="divCell50"><?php the_field('orderstatus'); ?></div>
									</div>
									<?php 
									dco_set_new_case_status($parrent);
								} 
							endwhile;
						endif;

						wp_reset_postdata();
					?>

				</div>
				<br>
                <h1 class="flex-title">IP-plan för denna beställning.</h1>
				<p>(För att uppdatera ip-planen tryck på servernamnet nedan)</p>
				<div class="divTable">
					 <div class="headRow">
						<div class="divCell25" align="center"><b>Servernamn</b></div>
						<div  class="divCell25"><b>IP</b></div>
						<div  class="divCell25"><b>NAT</b></div>
						<div  class="divCell25"><b>Status</b></div>
					 </div>
					<?php
						$parrent = get_the_ID();

						$loop = new WP_Query( array( 'post_type' => 'delorder') );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post();
								if (get_field('parentid') == $parrent){;?>
									<div class="divRow">
										<?php if(get_field('ip-status') == 'OK'){?>
											<div class="divCell25"><?php echo get_the_title(); ?></div>
										<?php }	else{ ?>
											<?php if(get_field('ordertyp') == 'nod'){?>
												<div class="divCell25"><a href="/best/konf-ip/?typ=IP&serverid=<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></a></div>
											<?php } else{ ?>
												<div class="divCell25"><a href="/best/konf-sight/?typ=IP&serverid=<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></a></div>
											<?php } ?>
										<?php }; ?>
										<div class="divCell25"><?php the_field('ip'); ?></div>
										<div class="divCell25"><?php the_field('nat'); ?></div>
										<div class="divCell25"><?php the_field('ip-status'); ?></div>
									</div>
									<?php if (get_field('placering') != 'Virtuell i Vreten' AND get_field('placering') != 'Virtuell Hos kund' AND get_field('nod_har_ilo') != 'Nej'){;?>
										<div class="divRow">
											<?php if(get_field('ip-status') == 'OK'){?>
												<div class="divCell25"><?php echo "ilo" . get_the_title(); ?></div>
											<?php }	else{ ?>
												<div class="divCell25"><a href="/best/konf-sight/?typ=ILO&serverid=<?php echo get_the_id(); ?>"><?php echo "ilo" . get_the_title(); ?></a></div>
											<?php }; ?>
											<div class="divCell25"><?php the_field('ilo-ip'); ?></div>
											<div class="divCell25"><?php the_field('ilo-nat'); ?></div>
											<div class="divCell25"><?php the_field('ilo_status'); ?></div>
										</div>
									<?php } ?>
								<?php } 
							endwhile;
						endif;

						wp_reset_postdata();
					?>

				</div>

			<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<div class="flex-box">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Lägg till delorder</h3>
			<?php 
			$delorder = new delorder(get_the_ID());
			?>
			<form action="/best/delorder/" id="delorder-server" method="post">
			 
				<input type="hidden" name="order" id="submitted" value=<?php the_title(); ?> >
				<input type="hidden" name="kundforkortning" id="submitted" value="<?php the_field('kundforkortning'); ?>" >
				<input type="hidden" name="kundnamn" id="submitted" value="<?php the_field('kundnamn'); ?>" >
				<input type="hidden" name="avtalstyp" id="submitted" value="<?php the_field('avtalstyp'); ?>" >
				<input type="hidden" name="typ" id="submitted" value="server" >
				<input type="hidden" name="ordertyp" id="submitted" value="server" >
				<input type="hidden" name="parentid" id="submitted" value="<?php echo get_the_ID(); ?>" >
				<?php if(get_field('casetyp') == 'Ny' or get_field('casetyp') == 'server'){ ?>
					<button type="submit" form="delorder-server" name='submittype' value="server"><?php _e('Serverinstallation', 'framework') ?></button>
				<?php } ?>
				<?php if(get_field('casetyp') == 'Ny' or get_field('casetyp') == 'nod'){ ?>
					<button type="submit" form="delorder-server" name='submittype' value="nod"><?php _e('Nod i visionapp', 'framework') ?></button>
				<?php } ?>
<!--
				<button type="submit" form="delorder-server" name='submittype' value="backup"><?php _e('Backupserver / NAS', 'framework') ?></button>
-->
			</form>
			</br>
<!--			<form action="/best/delorder/" id="delorder-nodvisionapp" method="post">
			 
				<input type="hidden" name="order" id="submitted" value=<?php the_title(); ?> />
				<input type="hidden" name="kundforkortning" id="submitted" value=<?php the_field('kundforkortning'); ?> />
				<input type="hidden" name="kundnamn" id="submitted" value=<?php the_field('kundnamn'); ?> >
				<input type="hidden" name="avtalstyp" id="submitted" value=<?php the_field('avtalstyp'); ?> >
				<input type="hidden" name="typ" id="submitted" value="nod i visionapp" />
				<input type="hidden" name="parentid" id="submitted" value=<?php echo get_the_ID(); ?> >
				<button type="submit" form="delorder-nodvisionapp"><?php _e('Nod i visionapp', 'framework') ?></button>
			</form>-->
			<?php //echo get_the_ID();?>
			<fieldset>
                <h1 class="flex-title">Förklaring DCO-status:</h1>
				<fieldset>
					<h1 class="flex-title">DCO inväntar...</h1>
					<p>DCO saknar information eller utrustning för att kunna slutföra beställningen eller delmoment.</p>
				</fieldset>
				<fieldset>
					<h1 class="flex-title">DCO har mottagit...</h1>
					<p>DCO kommer att påbörja delmomentet innom kort.</p>
				</fieldset>
				<fieldset>
					<h1 class="flex-title">OK</h1>
					<p>DCO har fått den information som behövs för att slutföra ett eller flera delmoment.</p>
				</fieldset>
				<fieldset>
					<h1 class="flex-title">CaseTyp</h1>
					<p><?php echo the_field('casetyp');?></p>
					<p id="setParent"><?php echo $delorder->get_parentid();?></p>
				</fieldset>
			</fieldset>

		</div>
	</div>
<?php get_footer(); ?>