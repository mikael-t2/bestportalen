    </div>
    <footer class="footer-2" role="contentinfo">

      <div class="footer-logo">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="Logo image">
      </div>
        <?php wp_nav_menu(array('theme_location'=>'foot_menu', 'container' => '')); ?>

        <div class="footer-secondary-links">
          <ul>
            <li><a href="javascript:void(0)">&copy; <?php echo date('Y');?> Hogeran</a></li>
          </ul>

        </div>
    </footer>


    <script src="<?php bloginfo('template_url');?>/js/jquery-2.1.4.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/functions.js" type="text/javascript"> </script>
    <script src="<?php bloginfo('template_url');?>/js/simple-slider.js" type="text/javascript"> </script>
	<?php wp_footer(); ?>

  </body>
</html>