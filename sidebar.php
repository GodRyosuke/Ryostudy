<div class="sidebars">
            <div class="card prof-card">
              <div class="card-body">
                <div class="prof-wrap">
                  <div class="my-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/walkingMan.jpg" alt="">
                  </div>
                  <div class="my-name"><h4>りょーすけ</h4></div>
                </div>
                <div class="profile">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, expedita recusandae! Nihil mollitia, placeat sint quo culpa excepturi porro! Earum perspiciatis itaque maiores ipsa minima alias voluptate eos in molestiae?
                </div>
                <a href="<?php echo esc_url(home_url('manager')); ?>">管理人情報</a>
              </div>
            </div>
            <div class="card card-popular">
              <div class="card-body">
                <div class="card-title popular-title">
                  <h3>よく読まれている記事  </h3>
                  <div class="titleLine"></div>
                </div>
                <div class="card">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/CreditCard.jpg" alt="">
                  <div class="card-dody text-center">
                    <div class="card-title"><h4>中学生からはじめる微分積分</h3></div>
                    <div class="btn btn-primary">詳しくみる</div>
                  </div>
                </div>
                <div class="card">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/CreditCard.jpg" alt="">
                  <div class="card-dody text-center">
                    <div class="card-title"><h4>中学生からはじめる微分積分</h3></div>
                    <div class="btn btn-primary">詳しくみる</div>
                  </div>
                </div>
                <div class="card">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/CreditCard.jpg" alt="">
                  <div class="card-dody text-center">
                    <div class="card-title"><h4>中学生からはじめる微分積分</h3></div>
                    <div class="btn btn-primary">詳しくみる</div>
                  </div>
                </div>
                <div class="card">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/CreditCard.jpg" alt="">
                  <div class="card-dody text-center">
                    <div class="card-title"><h4>中学生からはじめる微分積分</h3></div>
                    <div class="btn btn-primary">詳しくみる</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-category">
              <div class="card-header">
                カテゴリー
              </div>
              <div class="list-group list-group-flush">
                <?php
                  wp_nav_menu(
                    array(
                      'thme_location' => 'place_footer',
                      'container' => false,
                    )
                    );
                ?>
              </div>
            </div>
          </div>