<?php
$post_id =  get_the_ID();
$author_id = get_post_field('post_author', $post_id);

// $author_id = get_post_field('post_author', get_the_ID());

$author = trim(get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id));
?>

<article  <?php post_class( 'col-12 col-md-6 tm-post' ); ?>>
    <hr class="tm-hr-primary">
    <a href="<?php the_permalink( ); ?>" class="effect-lily tm-post-link tm-pt-60">
        <?php if(has_post_thumbnail( )):?>
            <div class="tm-post-link-inner">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>                           
            </div>
        <?php endif; ?>
        <span class="position-absolute tm-new-badge">New</span>
        <h2 class="tm-pt-30 tm-color-primary tm-post-title"><?php the_title(); ?></h2>
    </a>                    
    <p class="tm-pt-30"><?php print wp_trim_words(get_the_excerpt(get_the_ID()), 60, ''); ?></p>
    <div class="d-flex justify-content-between tm-pt-45">
        <span class="tm-color-primary"><?php the_category( ' . ', $post_id )?></span>
        <span class="tm-color-primary"><?php the_date('F j, Y'); ?></span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <span><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
        <span><?php echo esc_html( $author ); ?></span>
    </div>
</article>
