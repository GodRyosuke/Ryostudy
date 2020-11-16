<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <script src="https://kit.fontawesome.com/29d47546b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/main.js" defer></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="bg-light">
      <div class="title">
        <h2>
          <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
        </h2>
      </div>
      <nav class="navbar navbar-expand-md navbar-light bg-light headerCon container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNavButton" aria-controls="headerNavButton">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse headerNav" id="headerNavButton">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'place_global',
                    'container' => false,
                )
            );
        ?>
          <form action="<?php echo esc_url(home_url()); ?>" method="get" role="search" class="form-inline my-lg-0">
            <input type="search" class="form-control" placeholder="キーワードを入力" value="<?php the_search_query(); ?>" name="s">
            <button class="btn btn-outline-primary my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </nav>
    </header>
