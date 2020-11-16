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
