<?php /* Template Name: Skapa Formulär */ ?>
<?php 
get_header(); 
dco_get_application_list()
?>

<div class="flex-boxes">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<div class="flex-box flex-box-big">
			<a href=<?php the_permalink(); ?> >
				<img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
				<h1 class="flex-title"><?php the_title(); ?></h1>
			</a>
			<fieldset>
				<p><?php the_content(); ?></p>
			</fieldset>
		</div>
		<div class="flex-box">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
			<?php the_field('hoger_info'); ?>
		</div>

	<?php endwhile; ?>
	<?php else: ?>
		<h2>Innehåll saknas här</h2>
	<?php endif; ?>
</div>
<?php get_footer(); ?>