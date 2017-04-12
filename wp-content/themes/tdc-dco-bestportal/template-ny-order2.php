<?php /* Template Name: Skapa order 2 */ ?>
<?php get_header(); ?>

<div class="flex-boxes">
	<div class="flex-box flex-box-big">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<a href=<?php the_permalink(); ?> >
					<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
					<h1 class="flex-title"><?php the_title(); ?></h1>
				</a>
				<fieldset>
					<p><?php the_content(); ?></p>
				</fieldset>

			<?php endwhile; ?>
		<?php else: ?>
			<h2>Innehåll saknas här</h2>
		<?php endif; ?>
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