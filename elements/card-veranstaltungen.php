<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="card shadow">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        <?php the_post_thumbnail( 'preview-m' ); ?>
        <div class="content">
            <div class="pre-title">Pre-Title <span class="date"><?php echo wp_date('j. F G:i', strtotime(get_field('zeitpunkt'))); ?><span></div>
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '30'); ?>
            </h3>
            <p class="preview-text">
                <?php  get_excerpt(get_the_content(), '55'); ?>
            </p>
        </div>
    </a>
</div>