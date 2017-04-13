    </div>
    <footer class="footer-2" role="contentinfo">

      <div class="footer-logo">
        <img src="<?php bloginfo('template_url');?>/img/logo2.png" alt="Logo image">
      </div>
        <?php wp_nav_menu(array('theme_location'=>'foot_menu', 'container' => '')); ?>

        <div class="footer-secondary-links">
          <ul>
            <li><a href="javascript:void(0)">&copy; <?php echo date('Y');?> Tele2</a></li>
          </ul>

        </div>
    </footer>


	<?php wp_footer(); ?>

  </body>
</html>