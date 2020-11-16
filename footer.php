<footer>
      <div class="container">
        <div class="footer-wrapper">
          <div class="about footer-item">
            <h2>ABOUT</h2>
            <a href="<?php echo esc_url(home_url('manager')); ?>">管理人情報</a>
          </div>
          <div class="blog footer-item">
            <h2>CATEGORY</h2>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'place_footer',
                    'container' => false,
                )
            );
            ?>
          </div>
          <div class="sns footer-item">
            <h2>TWITTER</h2>
            twitter 埋め込み
          </div>
        </div>
      </div>
      <div class="copyRight">
        &copy; ryostudy.com 2020 All rights reserved.
      </div>
    </footer>
    <?php wp_footer(); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>