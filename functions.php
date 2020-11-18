<?php
function my_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('my_styles', get_template_directory_uri().'/assets/css/styles.css', array());
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

register_nav_menus(
    array(
        'place_global' => 'グローバル',
        'place_footer' => 'フッターナビ',
    )
);

add_theme_support('post-thumbnails');
add_image_size('detail', 640, 360, true);

function pagination($pages, $paged, $range = 3, $show_only = false) 
{
    $pages = (int) $pages;
    $paged = $paged ? :1;

    $text_first = '<< 先頭へ';
    $text_before = '< 前へ';
    $text_next = '次へ >';
    $text_last = '最後へ >>';

    // 1ページのみで、ページを表示させるなら
    if ($show_only && $pages === 1) {
        echo '<div class="page-wrap>1</div>';
        return;
    }
    if ($pages === 1) { // 表示させない
        return;
    }
    
    echo '<div class="page-wrap">';
    if ($pages != 1) { // ページ数が2ページ以上
        // echo $paged.'of'.$pages.'<br>';
        if ($paged > $range + 1) {
            // 先頭へのリンク
            echo '<a href="'.get_pagenum_link(1).'"><div class="page-nav page"><div class="page-nav-inner-buf"></div><div class="page-nav-inner">'.$text_first.'</div></div></a>';
        }
        if ($paged > 1) { // 前へのリンク
            echo '<a href="'.get_pagenum_link($paged - 1).'"><div class="page-nav page"><div class="page-nav-inner-buf"></div><div class="page-nav-inner">'.$text_before.'</div></div></a>';
        }
        for ($i = 1; $i <= $pages; $i++) {
            if ($i >= $paged - $range && $i <= $paged + $range) {
                // ページ番号出力
                if ($paged == $i) {
                    echo '<div class="page-num page current"><div class="page-num-inner"><span>'.$i.'</span></div><div class="page-num-inner-buf"></div></div>';
                } else {
                    echo '<a href="'.get_pagenum_link($i).'"><div class="page-num page"><div class="page-num-inner"><span>'.$i.'</span></div><div class="page-num-inner-buf"></div></div></a>';
                }
            }
        }
        if ($paged < $pages) {
            // 次への表示
            echo '<a href="'.get_pagenum_link($paged + 1).'"><div class="page-nav page"><div class="page-nav-inner-buf"></div><div class="page-nav-inner">'.$text_next.'</div></div></a>';
        }
        if ($paged + $range < $pages) {
            // 最後へ の表示
            echo '<a href="'.get_pagenum_link($pages).'"><div class="page-nav page"><div class="page-nav-inner-buf"></div><div class="page-nav-inner">'.$text_last.'</div></div></a>';
        }
    }

    echo '</div>';
}

function cms_excerpt_more() // 入りきらない抜粋分は...にする
{
    return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');
function cms_excerpt_length() // 抜粋分最大文字数設定
{
    return 40;
}
add_filter('excerpt_mblength', 'cms_excerpt_length');
// 抜粋機能を有効化
// add_post_type_support('single', 'excerpt');

function theme_widgets_init() 
{
    register_sidebar(array(
        'name' => '人気記事',
        'id' => 'primary-widget-area',
        'description' => '人気記事を出力',
        'before_widget' => '',
        'after_widget' => '',
    ));
}
add_action('widgets_init', 'theme_widgets_init');

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.'Views';
}

function setPostViews($postID) 
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($countID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_post_rel_link_wp_head', 10, 0);