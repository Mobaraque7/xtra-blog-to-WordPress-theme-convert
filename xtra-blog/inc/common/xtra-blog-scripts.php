<?php

function xtra_blog_scripts(){
    /**
     * ALL CSS FILES
     */

    wp_enqueue_style( 'xtra-blog-style', get_stylesheet_uri( ) );
    wp_enqueue_style( 'xtra-blog-templatemo', XTRA_BLOG_THEME_CSS_DIR . 'templatemo-xtra-blog.css', [] );
    wp_enqueue_style( 'bootstrap', XTRA_BLOG_THEME_CSS_DIR . 'bootstrap.min.css', [] );
    wp_enqueue_style( 'fontawesome', XTRA_BLOG_THEME_URI . '/assets/fontawesome/css/all.min.css',[] );


    /**
     * ALL JSS FILES
     */
    wp_enqueue_script( 'xtra-blog-templatemo-js' , XTRA_BLOG_THEME_JS_DIR . 'templatemo-script.js', ['jquery'] ,'', true );
    wp_enqueue_script( 'xtra-blog-nav' , XTRA_BLOG_THEME_JS_DIR . 'nav.js', [], '', true );


}
add_action( 'wp_enqueue_scripts', 'xtra_blog_scripts' );