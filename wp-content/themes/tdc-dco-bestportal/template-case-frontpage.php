<?php /* Template Name: case-frontpage template */ ?>
<?php get_header(); ?>
	<div class="flex-boxes">
		<div class="flex-box flex-box-big">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">


			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'Ny' );
			$query = new WP_Query( $args );
			if($query->have_posts()):
			?>
				<fieldset>
				<p>( Delorder saknas )</p>
				<h3>Komplettering från beställare behövs!!</h3>
				<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
				<div class="divTable">
					 <div class="headRow">
						<div class="divCell50" align="center"><b>Beställningar</b></div>
						<div  class="divCell50"><b>Order-status</b></div>
					 </div>
					<div class="divRow">
						<div class="divCell50"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></div>
						<div class="divCell50">Delorder saknas</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				</fieldset>
			<?php endif; ?>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'DCO har mottagit beställning' );
			$query = new WP_Query( $args );
			?>
			<h3>Nya Beställningar</h3>
				<div class="divTable">
					 <div class="headRow">
						<div class="divCell50" align="center"><b>Beställningar</b></div>
						<div  class="divCell25"><b>Order-typ</b></div>
						<div  class="divCell25"><b>Skapad</b></div>
					 </div>
					<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
						<div class="divRow">
							<div class="divCell50"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></div>
							<div class="divCell25"><?php the_field('casetyp'); ?></div>
							<div class="divCell25"><?php the_date('Y-m-d'); ?></div>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</fieldset>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case');
			$query = new WP_Query( $args );
			?>
			<h3>Aktiva Beställningar</h3>
			<div class="divTable">
				<div class="headRow">
					<div class="divCell50" align="center"><b>Beställningar</b></div>
					<div  class="divCell50"><b>Order-status</b></div>
				</div>
				<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
					<?php if (get_field('case_status') != 'Klar' AND get_field('case_status') != 'DCO har mottagit beställning' AND get_field('case_status') != 'Ny'){?>
						<div class="divRow">
							<div class="divCell50"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></div>
							<div class="divCell50"><?php the_field('case_status'); ?></div>
						</div>
					<?php }	?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			</fieldset>



			<fieldset>
			<?php 
			$args = array( 
				'post_type' => 'case',
				'meta_key'		=> 'case_status',
				'meta_value'	=> 'Klar' );
			$query = new WP_Query( $args );
			?>
			<h3>Slutförda Beställningar</h3>
			<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
				<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>

		</div>
		<div class="flex-box">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Meny</h3>
			<button id="skapaNyBest">Ny Beställning</button>

		</div>
	</div>
<?php get_footer(); ?>