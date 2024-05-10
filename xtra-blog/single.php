<?php
    the_post();
    get_header();
    $post_id =  get_the_ID();
    $author_id = get_post_field('post_author', $post_id);
    $author = trim(get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id));
?>

<div class="container-fluid">
        <main class="tm-main">
                <?php get_template_part('template-parts/from'); ?>        
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title"><?php the_title(); ?></h2>
                            <p class="tm-mb-40"><?php the_date('F j, Y'); ?> posted by <?php echo esc_html( $author ); ?></p>
                            <?php
                             the_content();
                             wp_link_pages( );
                            ?>
                            <span class="d-block text-right tm-color-primary"><?php echo  get_the_category_list( ' . ' ); ?></span>
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

<?php 
    get_footer();
?>