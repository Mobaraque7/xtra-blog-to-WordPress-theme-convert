<?php

function stra_blog_setup(){

    load_theme_textdomain( 'xtra-blog', get_template_directory() .'/languages' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support('title-tag');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    add_theme_support('post-formats', [
        'image',
        'audio',
        'video',
        'gallery',
        'quote',
    ]);

    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );

    //This theme uses wp_nav_menu() in one location
    register_nav_menus([
        'main-menu' => esc_html__( 'Main Menu', 'xtra-blog' ),
    ]);
}
add_action( 'after_setup_theme', 'stra_blog_setup' );

/**
 * Enqueue scripts and styles.
 */

define('XTRA_BLOG_THEME_DIR', get_template_directory());
define('XTRA_BLOG_THEME_URI', get_template_directory_uri());
define('XTRA_BLOG_THEME_CSS_DIR', XTRA_BLOG_THEME_URI .'/assets/css/');
define('XTRA_BLOG_THEME_JS_DIR', XTRA_BLOG_THEME_URI .'/assets/js/');
define('XTRA_BLOG_THEME_INC', XTRA_BLOG_THEME_DIR .'/inc/');

/**
 * include stre-blog functions file
 */
require_once XTRA_BLOG_THEME_INC . '/common/xtra-blog-scripts.php';

function xtra_blog_pagination(){
    global $wp_query;
    $current = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $page_nav = paginate_links( array(
        'type'               => 'list',
        'total'              => $total,
        'current'            => $current,
        'mid_size'           => apply_filters( 'xtra_blog_mid_paginated_num', 4 ),
    ) );
    $page_nav = str_replace("page-numbers","tm-paging-item", $page_nav);
    $page_nav = str_replace('<ul class="tm-paging-item">',"<ul>", $page_nav);
    $page_nav = str_replace('<li>',"<li class='tm-paging-item'>", $page_nav);
   echo wp_kses_post( $page_nav  );
}

function xtra_blog_comments($comment, $args, $depth){
    $GLOBAL['comment'] = $comment;
    extract($args, EXTR_SKIP);
    $args['reply_text'] = 'Reply';
    $replayClass = 'comment-depth-' . esc_attr($depth);
    ?>
        <div id="comment-<?php comment_ID(); ?>">

            <div class="tm-comment tm-mb-45">

                <?php if (get_comment_type($comment) === 'comment') : ?>
                    <figure class="tm-comment-figure">
                        <?php print get_avatar($comment, 110, null, null, ['class' => ['mb-2', 'rounded-circle', 'img-thumbnai']]); ?>
                        <figcaption class="tm-color-primary text-center"><?php print get_comment_author_link(); ?></figcaption>
                    </figure>
                <?php endif; ?>

                <div>
                    <?php comment_text(); ?>
                    
                    <div class="d-flex justify-content-between">
                        <?php comment_reply_link(array_merge(
                                $args,
                                array(
                                    'reply_text' => __('Reply', 'xtra-blog'),
                                    'depth'      => $depth,
                                    'max_depth'  => $args['max_depth'],
                                )
                            )); ?>
                        <span class="tm-color-primary"><?php comment_time(get_option('date_format')); ?></span>
                    </div> 

                </div>
            </div>
    <?php
}

function xtra_blog_side_bar_widgets(){
    register_sidebar(array(
        'name' => __('Main Widget Area', 'xtra-blog'),
        'id'   => 'xtra_blog_sid_bar_content',
        'description' => __('Apperas in the sidebar in blog page and also other page', 'xtra-blog'),
        'before_widget' => '<div class="child_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Icon widgets', 'xtra-blog'),
        'id'   => 'xtra_blog_sid_icon_widget',
        'description' => __('Apperas in the sidebar in blog page and also other page', 'xtra-blog'),
        'before_widget' => '<div class="tm-mb-65">',
        'after_widget' => '</div>',
        'before_title' => '<li class="tm-social-link">',
        'after_title' => '</li>',
    ));

    register_sidebar(array(
        'name' => __('Write the home ', 'xtra-blog'),
        'id'   => 'xtra_blog_sid_sit_detalse',
        'description' => __('Apperas in the sidebar in blog page and also other page', 'xtra-blog'),
        'before_widget' => '<div class="tm-mb-80 pr-5 text-white">',
        'after_widget' => '</div>',
        'before_title' => '<p class="text-white">',
        'after_title' => '</p>',
    ));
}

add_action('widgets_init', 'xtra_blog_side_bar_widgets');



if (!function_exists('xtra_blog_form')) {
    function xtra_blog_form($form){
        
        $form = sprintf(
            '<div class="col-12">
            <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                <button class="tm-search-button" type="submit">
                    <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                </button>                                
            </form>
        </div>',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'xtra-blog')
        );

        return $form;
    }
    add_filter('get_search_form', 'xtra_blog_form');
}