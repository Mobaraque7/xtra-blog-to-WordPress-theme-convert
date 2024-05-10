<?php
/*
* The template for displaying Search Resealt
*/ 
get_header(); ?>

  <div class="container-fluid">
        <main class="tm-main">
                <?php get_template_part('template-parts/from'); ?>        
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                        <div id="search_title">
                            <h1 class="title"><?php printf( __( 'Search Results for: %s', 'xtra-blog'), get_search_query()); ?></h1>
                            </div>

                            <?php
                                if (have_posts()) :
                                    ?>
                                        
                                        <?php
                                        while (have_posts()) : the_post();
                                            get_template_part('template-parts/content', 'search');
                                        endwhile;
                                        ?>
                                
                                    <?php
                                
                                endif;
                            ?>
                        </div>
                        
                        <!-- Comments -->
                        <?php
                        if(!post_password_required()){
                            comments_template();
                        }
                        ?>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <?php get_sidebar(); ?>
                    </div>                    
                </aside>
            </div>


  <?php get_footer(); ?>