    <footer>
        <div class="container footer">
          <?php
                  wp_nav_menu( array(
                      'theme_location'    => 'secondary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'footer-text',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker(),
                  ) );
          ?>
          <div class="footer-socialmedia">
            <a href="https://www.facebook.com/intotheoutdoorstv/" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/intotheoutdoorstv/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCE2bpogAXcKOA1MK1LCf4YQ" target="_blank"><i class="fab fa-youtube-square"></i></a>
          </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>