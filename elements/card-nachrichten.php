<?php

/**
 * 
 * Card => Nachrichten
 *
 */

// variable text length
if (strlen(get_the_title()) < 35 ) {
    $char = 90;
}
else {
    $char = 56;
}

// variable text length
if (strlen($the_slug < 1 )) {
    $char = 200;
}

?>




<div class="card-group">
    <div class="pre-card">
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); // 32 or 100 = size ?>
            <span><b>Projektupdate</b> <?php  echo qp_date(get_the_date('Y-m-d')); ?><?php if( get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) echo "<br>Veröffentlicht von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?></span>
        </a>
    </div>
    <div class="card shadow nachricht">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="content">
                <div class="pre-title">

                    <?php  echo qp_date(get_the_date('Y-m-d')); ?>
                </div> 
                <h3 class="card-title">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
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
            <?php the_post_thumbnail( 'preview_m' ); ?>

        </a>
    </div>

    <?php
    // get project with link...
    ?>
    <div class="after-card">
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?>
            <span style="margin:-1px 0px 0px 5px"><?php  shorten(get_field('emoji'), '200'); ?>🎯</span>
        </a>
    </div>

</div>
