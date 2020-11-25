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

<section <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<?php

	if (has_post_thumbnail()) {
		$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : '';

		if ( $image_url ) {
			$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
			$cover_header_classes = ' bg-image';
		}
	}

	?>


    <div class="center-header">
        <!-- Bild -->
		<?php if (has_post_thumbnail()) { ?>
        <img class="center-header-image" src="<?php echo esc_url( $image_url ) ?>" />
		<?php } ?>

        <!-- Post title -->
        <div class="center-header-content <?php if (has_post_thumbnail()) echo "text-only"; ?>">
			<h1><?php // the_title(); ?></h1>
			<h4><?php // echo get_the_author(); ?></h4>
			<p><?php // the_field('kurzbeschreibung'); // veraltet ?></p>
        </div>
	</div>
	
    
    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
    <?php
        if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
            the_excerpt();
        } else {
            the_content( __( 'Continue reading', 'twentytwenty' ) );
        }
    ?>

    </div>


	
	<?php
	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</section><!-- .post -->


