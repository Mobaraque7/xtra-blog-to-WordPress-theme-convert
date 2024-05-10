<!DOCTYPE html>
<html <?php language_attributes() ?>
<head>
	<meta charset="<?php bloginfo() ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
<?php wp_head()?>
</head>
<body <?php body_class() ?> >
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <?php
                    $xtra_blog_custom_logo_id = get_theme_mod( 'custom_logo' );
                    $xtra_blog_logo = wp_get_attachment_image_src( $xtra_blog_custom_logo_id , 'full' );
                    if ( has_custom_logo() ) {
                        echo '<img class="mb-3 mx-auto tm-site-logo" src="' . esc_url( $xtra_blog_logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        echo '<h1 class="text-center">' . get_bloginfo('name') . '</h1>';
                    } else {
                        ?>
                        <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                        <h1 class="text-center">Xtra Blog</h1>
                        <?php
                    }
                ?>
            </div>

            <?php wp_nav_menu( array( 
                    'theme_location' => 'main-menu',
                    'menu_class' => '',
                    'menu_id' => '',
                    'container' => 'nav',
                    'container_class' => 'tm-nav',
                    'container_id' => 'tm-nav',
                    'menu_item_class'  => 'tm-nav-item',
                ) ); ?>   
            
                <?php dynamic_sidebar('xtra_blog_sid_icon_widget'); ?>
                
                <?php dynamic_sidebar('xtra_blog_sid_sit_detalse'); ?>
            <!-- <p class="tm-mb-80 pr-5 text-white">
                
            </p> -->
        </div>
    </header>