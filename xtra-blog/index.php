<?php

get_header();

?>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <?php get_template_part('template-parts/from'); ?>

            <div class="row tm-row">
                <?php
                /* Start the Loop */
                while (have_posts()) : the_post(); ?>
                    <?php
                    get_template_part('template-parts/content', get_post_format()); ?>
                <?php
                endwhile;
                ?>
            </div>

            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <div class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20"><?php previous_posts_link( 'Prev' ); ?></div>
                    <div class="mb-2 tm-btn tm-btn-primary tm-prev-next"><?php next_posts_link( 'Next' ); ?></div>
                </div>
                <div class="tm-paging-wrapper">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <?php echo esc_html( xtra_blog_pagination() )?>
                    </nav>
                </div>                
            </div>
<?php
get_footer( );
