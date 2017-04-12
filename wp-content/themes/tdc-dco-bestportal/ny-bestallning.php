<?php /* Template Name: case template */ ?>
<?php get_header(); ?>
	<div class="flex-boxes">
		<div class="flex-box flex-box-big">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Order</h3>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
                <h1 class="flex-title"><?php the_field('kundnamn'); ?> - <?php the_title(); ?></h1>
				<p>Beställare: Nisse Hult (SAM)</p>
				  <div class="divTable">
					 <div class="headRow">
						<div class="divCell" align="center"><b>Delorder</b></div>
						<div  class="divCell"><b>Typ</b></div>
						<div  class="divCell"><b>Status</b></div>
					 </div>
					<div class="divRow">
						  <div class="divCell"><a href=#>winbiliatrio01</a></div>
						<div class="divCell">Server</div>
						<div class="divCell">Ankommit till RMC</div>
					</div>
					<div class="divRow">
						<div class="divCell"><a href=#>winbiliatrio02</a></div>
						<div class="divCell">Server</div>
						<div class="divCell">Installation påbörjad</div>
				   </div>
					<div class="divRow">
						<div class="divCell"><a href=#>winbiliatrio01</a></div>
						<div class="divCell">Nod visionapp</div>
						<div class="divCell">Inväntar NAT</div>
				   </div>
					<div class="divRow">
						<div class="divCell"><a href=#>winbiliatrio02</a></div>
						<div class="divCell">Nod visionapp</div>
						<div class="divCell">Inväntar NAT</div>
				   </div>

			  </div>

			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="flex-box">
			<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<h3>Order - Meny</h3>

		</div>
	</div>
<?php get_footer(); ?>