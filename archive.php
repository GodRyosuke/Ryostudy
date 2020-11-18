<?php get_header(); ?>

<main>
    <section class="conB">
        <div class="container mainWrap">
            <div class="cards">
                <div class="topic-title">
                    <h2><i class="fas fa-book"></i><?php single_cat_title(); ?></h2>
                    <div class="line"></div>
                </div>
                <div class="mainCards">
                    <?php 
                        if (have_posts()):
                            while(have_posts()):
                                the_post();
                    ?>
                    <div class="card">
                        <div class="badges">
                            <a href="#"><div class="badge badge-primary"><?php the_category(); ?></div></a>
                        </div>
                        <div class="image"><?php the_post_thumbnail(); ?></div>
                        <div class="card-body text-center">
                            <div class="card-title"><h3><?php echo the_title(); ?></h3></div>
                            <div class="card-text"><?php echo get_the_excerpt(); ?></div>
                            <div class="btn btn-primary"><a href="<?php the_permalink(); ?>">詳しく見る</a></div>
                        </div>
                    </div>
                <?php
                    endwhile;
                endif;
                if (function_exists('pagination')) {
                    pagination($wp_query->max_num_pages, get_query_var('paged'));
                }
                ?>
                </div>
            </div>
            <div class="sidebar-wrap">
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
                  こんにちは！りょーすけといいます。某国公立大学で情報系を専攻している、現役大学生です。このサイトでは、僕が大学で学んだこと、今までの受験経験で学んだことなどを公開していきたいと思っています。学生だけにとどまらず、多くの方々にとって使える情報を届けて行きます！
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
                <?php
                  setPostViews(get_the_ID());
                  $args = array(
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => 3
                  );
                  $query = new WP_Query($args);
                  if ($query->have_posts()):
                    while ($query->have_posts()):
                      $query->the_post();
                ?>
                <div class="card">
                  <div class="image">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="card-dody text-center">
                    <div class="card-title"><h4><?php the_title(); ?></h3></div>
                    <div class="btn btn-primary">詳しくみる</div>
                  </div>
                </div>
                <?php
                    endwhile;
                  wp_reset_postdata();
                  endif;
                ?>
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
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>