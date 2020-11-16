<?php get_header(); ?>

    <main>
      <section class="conB">
        <div class="container mainWrap">
          <div class="cards">
            <div class="topic-title">
                <h2><i class="fas fa-search"></i>
                <?php
                    if (get_search_query()):
                    the_search_query();
                ?>
                の検索結果: <?php echo $wp_query->found_posts; ?>件</h2>
                <?php elseif (!get_search_query()): ?>
                <h2>検索ワードが入力されていません</h2>
                <?php else: ?>
                <h2>該当する記事が見つかりませんでした</h2>
                <?php endif; ?>
                <div class="line"></div>
            </div>
            <div class="mainCards">
                <?php 
                if (have_posts() && get_search_query()):
                    while(have_posts()):
                        the_post();
                ?>
              <div class="card">
                <div class="badges">
                  <a href="#"><div class="badge badge-primary">数学</div></a>
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
                  else:
              ?>
              まだ記事はありません
              <?php
                endif;
                if (function_exists('pagination')) {
                  pagination($wp_query->max_num_pages, get_query_var('paged'));
                }
                ?>
            </div>
          </div>
          <?php get_template_part('sidebar'); ?>
          
        </div>
      </section>
    </main>

 <?php get_footer(); ?>
