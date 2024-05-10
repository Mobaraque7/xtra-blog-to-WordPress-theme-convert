
<?php if( have_comments() || comments_open( ) ) : ?>
<div>
    <?php if( get_comments_number( ) >= 1) : ?>
        <h2 class="tm-color-primary tm-post-title">
            <?php
                $xtra_blog_cn = get_comments_number();
                if ( $xtra_blog_cn <= 1 ) {
                    echo esc_html($xtra_blog_cn) . " " . __( "Comment", "xtra-blog" );
                } else {
                    echo esc_html($xtra_blog_cn) . " " . __( "Comments", "xtra-blog" );
                }
            ?>
        </h2>
        <hr class="tm-hr-primary tm-mb-45">
        <div class="tm-comment tm-mb-45">
            <?php wp_list_comments([
                'style'       => 'div',
                'avatar_size' => 90,
                'format'    => 'html5',
                'callback' => 'xtra_blog_comments',
                'short_ping'  => true,
            ]);?>                               
        </div>
    <?php endif ?>

    <div class="mb-5 tm-comment-form">
    <?php

        $post_id = '';
        if( null === $post_id ){
            $post_id = get_the_ID( );
        }else{
            $id = $post_id;
        }
        $xtra_blog_commetar = wp_get_current_commenter(  );
        $xtra_blog_user = wp_get_current_user(  );
        $xtra_blog_user_identit = $xtra_blog_user ->exists()? $xtra_blog_user->display_name : '';

        $xtra_blog_req = get_option( 'require_name_email' );
        $xtra_blog_aria_req    = ( $xtra_blog_req ? " aria-required='true'" : '' );

        $xtra_blog_commets_form_fields = array(
            'author'=>'<div class="mb-4"><input class="form-control" name="name" type="text"></div>',
            'email' => '<div class="mb-4"><input class="form-control" name="email" type="text"></div>',
        );

        if ( is_user_logged_in() ) {
            $cl = 'loginformuser';
        } else {
            $cl = '';
        }


        $xtra_blog_defaults =[
            'comment_field'      => '
            <div class="mb-4 ' . $cl . '">
                <textarea class="form-control" name="message" rows="6"></textarea>
            </div>',
            'fields'  => $xtra_blog_commets_form_fields,
            'submit_button'    => '
            <div class="text-right">
            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Submit</button>                        
            </div>',
            'must_log_in'        => '
            <p class="must-log-in">
            '.esc_html__('You must be','xtra-blog').' <a href="'.esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )).'">'.esc_html__('logged in','xtra-blog').'</a> '.esc_html__('to post a comment.','xtra-blog').'
            </p>',

            'id_form'            => 'commentform',
            'id_submit'          => 'submit',
            'class_submit'       => 'btn',
            'title_reply'        => esc_html__( 'Your comment', 'xtra-blog' ),
            'title_reply_to'     => esc_html__( 'Leave a Reply to %s', 'xtra-blog' ),
            'cancel_reply_link'  => esc_html__( 'Cancel reply', 'xtra-blog' ),
            'label_submit'       => esc_html__( 'submit', 'xtra-blog' ),
            'format'             => 'xhtml',
        ];

        // echo $xtra_blog_aria_req ;
        // echo '<pre>';
        // print_r($xtra_blog_user);
        // echo '<pre>';
        // die();

        comment_form($xtra_blog_defaults);
    ?>
</div>
    
                            
</div>
<?php endif; ?>