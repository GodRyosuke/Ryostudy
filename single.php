<?php get_header(); ?>

    <main>
      <section class="contents">
        <div class="container mainWrap">
          <div class="mainContents">
          <?php 
            if(function_exists('bread_crumb')) {
              bread_crumb();
            }
          ?>
            <div class="post">
                <?php
                if (have_posts()):
                    while(have_posts()):
                        the_post();
                ?>
                <div class="title">
                    <span class="time"><?php the_time('Y.m.d'); ?></span>
                    <h2><?php echo get_the_title(); ?></h2>
                    <div class="category-item badge badge-primary"><?php the_category(); ?></div>
                </div>
                <div class="image">
                  <?php the_post_thumbnail('detail'); ?>
                </div>
                <?php the_content(); ?>
                <?php
                    endwhile;
                endif;
                ?>
              <!-- <div class="tags">
                  <ul>
                      <a href="#"><li><span><i class="fas fa-tag"></i></span>微分積分</li></a>
                      <a href="#"><li><span><i class="fas fa-tag"></i></span>高校数学</li></a>
                      <a href="#"><li><span><i class="fas fa-tag"></i></span>解析学</li></a>
                  </ul>
              </div> -->
              <div class="sns">
                <?php
                  $tags = get_the_tags();
                ?>
                <div class="btn btn-primary">twitter</div>
                <div class="btn btn-danger">google+</div>
              </div>
              <div class="np-tab">
                <?php
                  $next_post = get_next_post();
                  $prev_post = get_previous_post();
                  if ($next_post):
                ?>
                <div class="next">
                  <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <div class="next-button np-button">
                    <
                    </div>
                    <div class="title">
                      <?php echo $next_post->post_title; ?>
                    </div>
                  </a>
                </div>
                <?php
                  endif;
                  if ($prev_post):
                ?>
                <div class="prev">
                  <a href="<?php echo get_permalink($prev_post->ID);?>">
                    <div class="title">
                      <?php echo $prev_post->post_title; ?>
                    </div>
                    <div class="next-button np-button">
                    >
                    </div>
                  </a>
                </div>
                <?php endif;?>
              </div>
            </div>
            <?php
            $categ = get_the_category($post->ID);
            $catID = array();

            foreach($categ as $cat) {
              array_push($catID, $cat->cat_ID);
            }
            $args = array(
              'post__not_in' => array($post->ID),
              'category__in' => $catID,
              'posts_per_page' => 4,
              'orderby' => 'rand'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()):
            ?>
            <div class="related">
              <h1>関連記事</h1>
              <div class="cards">
                <?php while($the_query->have_posts()):
                  $the_query->the_post();
                ?>
                <div class="card">
                  <div class="image"><?php the_post_thumbnail('detail'); ?></div>
                  <div class="card-body">
                    <div class="card-header">
                      <?php the_title(); ?>
                    </div>
                    <div class="card-text">
                      <?php echo get_the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>"><div class="btn btn-primary">記事を読む</div></a>
                    <div class="category text-right">
                      <div class="badge badge-primary">物理</div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            </div>
            <?php
            endif;
            wp_reset_postdata(); 
            ?>
        </div>
        <?php get_template_part('sidebar'); ?>
      </section>
    </main>

<?php get_footer(); ?>
