<?php /* Template Name: Nytt Case */ ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class="flex-boxes">
	<div class="flex-box flex-box-big">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<?php 
			$args = array(
				'post_id' => 'new',
				'field_groups' => array( 2367 ),
				'submit_value' => 'Skapa ny order'
			);
			 
			acf_form( $args );				
			?>

			<?php endwhile; ?>



			</div><!-- #content -->
		</div><!-- #primary -->	
	</div>
</div>
<?php get_footer(); ?>