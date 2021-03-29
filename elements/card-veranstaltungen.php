<?php

/**
 * 
 * Card => Veranstaltungen
 *
 */


// variable text length
if (strlen(get_the_title()) < 20 ) {
    $char = 75;
}
else {
    $char = 40;
}

?>



<div class="card-group">
    <div class="pre-card">
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); // 32 or 100 = size ?>
            <span><b>Veranstaltung</b><?php if( get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) echo "<br> von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?></span>
        </a>
    </div>



    <div class="veranstaltung card landscape shadow gardient ">
        <?php   
        if (get_query_var('link_card_link')) {
            ?>
                <a class="card-link" href="<?php echo get_site_url(); echo get_query_var('link_card_link'); ?>">
            <?php
        }
        else {
            ?>
                <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <?php
        }
        ?>
            <span class="date"><?php echo qp_date(get_field('event_date')); ?></span>
            <div class="content">
                <div class="pre-title">
                </div>
                    <h3 class="card-title"><?php shorten(get_the_title(), '30'); ?></h3>
                    <p class="preview-text">
                        <?php 
                        if (strlen(get_field('text')) > 2) {
                            shorten(get_field('text'), $char);
                        }
                        else {
                            shorten(get_the_content(), $char);
                        }
                        ?> 
                    </p>

            </div>
            <?php the_post_thumbnail( 'landscape_s' ); ?>
        </a>
    </div>
    <div class="after-card">
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?>
            <span style="margin:-1px 0px 0px 5px"><?php  shorten(get_field('emoji'), '200'); ?>🎯</span>
        </a>
    </div>
    
    </div>


