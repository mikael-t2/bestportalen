<!DOCTYPE html>
<html lang="sv">
  <head>
    <title><?php wp_title(''); ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="SHORTCUT ICON" href="<?php bloginfo('template_url');?>/img/tdc_smal_white.ico"/>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>"/>
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/simple-slider.css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/simple-slider-volume.css"/>

  </head>
<body>
      
<header class="navigation" role="banner">
    <div class="navigation-wrapper">
        <a href="<?php bloginfo('url');?>" class="logo">
            <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="Logo Image">
        </a>
        <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
        <nav role="navigation">
         <?php wp_nav_menu(array('theme_location'=>'main_menu', 'container' => '', 'items_wrap' => '<ul id="js-navigation-menu" class="%2$s navigation-menu show">%3$s</ul>' )); ?>
        </nav>
    </div>
</header>




<div class="hero">
	<div class="hero-inner">
    <a href="" class="hero-logo"><img src="<?php bloginfo('template_url');?>/img/logo2.png
" alt="Logo Image"></a>
		<div class="hero-copy">
			<h1><?php bloginfo('name');?></h1>
			<p><?php bloginfo('description');?></p>	
		</div>
	</div>
</div>
<div class="content-container">