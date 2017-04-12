<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div class="flex-boxes">
            <div class="flex-box">
                <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2_dark.png" alt="loggo">
                <h1 class="flex-title"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="flex-boxes no-marg">
            <div class="flex-box flex-box-big">
                <p><?php the_content(); ?></p>
            </div>
            <div class="flex-box">
                <h3>Beställningmeny</h3>
            </div>
        </div>

        <?php endwhile; ?>
    <?php else: ?>
        <h2>Innehåll saknas: page</h2>
    <?php endif; ?>
<?php get_footer(); ?>