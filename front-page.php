<?php get_header(); ?>

    <main>
      <section class="conA">
        <div class="container">
          <div id="accHead" class="carousel slide">
            <ol class="carousel-indicators">
              <li data-target="#accHead" data-slide-to="0" class="active"></li>
              <li data-target="#accHead" data-slide-to="1"></li>
              <li data-target="#accHead" data-slide-to="2"></li>
              <li data-target="#accHead" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="accImg">
                  <a href="https://kakeibo.ryostudy.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/kakeibo2.jpg" alt=""></a>
                </div>
                <div class="carousel-caption">
                  <h3>無料の家計簿webアプリ!!</h3>
                </div>
              </div>
            <?php
              $args = array(
                'post_type' => 'any',
                'post__in' => array(31, 36, 38),
              );
              $query = new WP_Query($args);
              if ($query->have_posts()):
                while ($query->have_posts()):
                  $query->the_post();
            ?>
              <div class="carousel-item">
                <div class="accImg">
                  <a href="<?php the_permalink(); ?>"><div class="image">
                    <?php the_post_thumbnail('detail'); ?>
                  </div></a>
                </div>
                <div class="carousel-caption">
                  <h3><?php the_title(); ?></h3>
                </div>
              </div>
            <?php
                endwhile;
              endif;
              wp_reset_postdata();
            ?>
            </div>
          </div>
        </div>
      </section>

      <section class="conB">
        <div class="container mainWrap">
          <div class="cards">
            <div class="topCardTitle">
              <h2>おすすめ記事</h2>
              <div class="titleLine"></div>
            </div>
            <div class="topCards">
            <?php
              $args = array(
                'post__in' => array(31, 36, 38),
              );
              $query = new WP_Query($args);
              if ($query->have_posts()):
                while ($query->have_posts()):
                  $query->the_post();
            ?>
              <div class="card">
                <a href="<?php the_permalink(); ?>">
                  <div class="image">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="card-body">
                    <div class="card-title">
                        <?php the_title(); ?>
                    </div>
                  </div>
                </a>
              </div>
            <?php
                endwhile;
                wp_reset_postdata();
              endif;
            ?>
            </div>
            <?php 
            $term_obj = get_term_by('slug', 'post', 'category');
            ?>
            <div class="topCardTitle"><h2><?php echo $term_obj->name; ?></h2>
              <div class="titleLine"></div>
            </div>
            <div class="mainCards">
            <?php
              $paged = get_query_var('paged')?:1;
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5
              );
              $news_posts = new WP_Query($args);
              if ($news_posts->have_posts()):
                while($news_posts->have_posts()):
                  $news_posts->the_post();
            ?>
              <div class="card">
                <div class="badges">
                  <a href="#"><div class="badge badge-primary"><?php the_category(); ?></div></a>
                </div>
                <div class="image"><?php the_post_thumbnail('detail'); ?></div>
                <div class="card-dody text-center">
                  <div class="card-title"><h3><?php the_title(); ?></h3></div>
                  <div class="card-text"><?php echo get_the_excerpt(); ?></div>
                  <div class="btn btn-primary"><a href="<?php the_permalink(); ?>">詳しくみる</a></div>
                </div>
              </div>
          <?php
            endwhile;
          endif;
          if (function_exists('pagination')) { // ページネーションが404になるときは、ダッシュボードの表示設定をチェック!
            pagination($news_posts->max_num_pages, $paged);
          }
          wp_reset_postdata();
          ?>
            </div>
          </div>
          <div class="sidebar-wrap">
            <?php get_template_part('sidebar'); ?>
          </div>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
