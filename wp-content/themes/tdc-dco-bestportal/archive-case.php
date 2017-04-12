<?php /* Template Name: case template */ ?>
<?php get_header(); ?>
	<div class="flex-boxes">
		<div class="flex-box flex-box-big">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<fieldset>
			<h3>Komplettering från beställare behövs</h3>
			<?php if(have_posts()): while(have_posts()): the_post(); 
				if (get_field('case_status') == 'Ny'){?>
<!--					if (get_field('case_status') == 'Nyskapad'){
						<script>window.location.href = "http://infox/best/";</script>
						exit;
					}?> -->
					<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
				<?php }	?>

			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>
			<fieldset>
			<h3>Nya Beställningar</h3>
			<?php if(have_posts()): while(have_posts()): the_post(); 
				if (get_field('case_status') == 'DCO har mottagit beställning'){?>
<!--					if (get_field('case_status') == 'Nyskapad'){
						<script>window.location.href = "http://infox/best/";</script>
						exit;
					}?> -->
					<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
				<?php }	?>

			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>
			<fieldset>
			<h3>Aktiva Beställningar</h3>
			<?php if(have_posts()): while(have_posts()): the_post(); 
				if (get_field('case_status') != 'Klar' AND get_field('case_status') != 'DCO har mottagit beställning' AND get_field('case_status') != 'Ny'){?>
<!--					if (get_field('case_status') == 'Nyskapad'){
						<script>window.location.href = "http://infox/best/";</script>
						exit;
					}?> -->
					<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
				<?php }	?>

			<?php endwhile; ?>
			<?php endif; ?>
			</fieldset>
			<fieldset>
			<h3>Slutförda Beställningar</h3>
				<?php if(have_posts()): while(have_posts()): the_post(); 
					if (get_field('case_status') == 'Klar'){?>
						<h1 class="flex-title"><a href=<?php the_permalink(); ?>><?php the_field('kundnamn'); ?> - <?php the_title(); ?> </a></h1>
					<?php }	?>

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