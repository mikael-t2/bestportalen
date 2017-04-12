<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div class="flex-boxes">
            <div class="flex-box">
                <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="loggo">
                <h1 class="flex-title"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="flex-boxes no-marg">
	        <p><?php the_content(); ?></p>
	</div>

        <?php endwhile; ?>
    <?php else: ?>
        <h2>Innehåll saknas: page</h2>
    <?php endif; ?>
<?php get_footer(); ?>