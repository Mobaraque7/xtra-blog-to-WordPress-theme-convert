<!-- Search form -->
<div class="row tm-row">
    
        <?php
            get_search_form();
        ?>               
</div>
<?php if(is_single()):?>
    <div class="row tm-row">
        <div class="col-12">
            <hr class="tm-hr-primary tm-mb-55">
            <!-- Video player 1422x800 -->
            <?php if(has_post_format()):?>
                <video width="954" height="535" controls class="tm-mb-40">
                    <source src="video/wheat-field.mp4" type="video/mp4">							  
                    Your browser does not support the video tag.
                </video>
            <?php else: ?>
                <?php the_post_thumbnail( "large" ); ?>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>
