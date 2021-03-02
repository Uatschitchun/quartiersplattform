<?php

/**
 * 
 * Template Name: Profil
 *
 */

if ( ( is_user_logged_in() ) ) {
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();

if (!is_user_logged_in()){
    header("Location: ".get_site_url());
    exit();
}

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<main id="site-content" role="main">

    <div class="single-header profil">
        
        <?php 
        // User Avatar
        $current_user = wp_get_current_user();
        echo get_avatar( $current_user->user_email, 32 );
        ?>


        <!-- user  name -->
        <div class="single-header-content">
            <h1><?php $current_user = wp_get_current_user(); echo $current_user->display_name; ?></h1>
        </div>

    </div>

    <?php // echo do_shortcode('[ultimatemember form_id="63"]'); ?>

    <!-- Gutenberg Editor Content -->
	<div class="gutenberg-content">

        <?php echo do_shortcode( '[ultimatemember form_id="63"]' ); ?>
        <?php // echo do_shortcode( '[ultimatemember_account ]' ); ?>

	</div>


    <br>

    <h2>Deine Angebote und Fragen</h2>
    <?php
        // user posts
        $args4 = array(
            'post_type'=> array('angebote', 'fragen'), 
            'post_status'=>'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> -1, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
    ?>

    <div class="card-container card-container__small">
		<?php get_template_part( 'components/call', 'frage' ); ?>
		<?php get_template_part( 'components/call', 'angebot' ); ?>
    </div>

    <br>
    <h2>Deine Projekte</h2>
    <?php
        $args4 = array(
            'post_type'=> 'projekte', 
            'post_status'=> 'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> 10, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');

    ?>

    <div class="card-container card-container__center card-container__long">
        <?php get_template_part( 'components/call', 'projekt' ); ?>
    </div>

    <br>
    <br>
    <h2>Bearbeite deine Kontaktinformationen</h2>
        <?php
        $userid = "user_".$current_user->ID; 
        acf_form (
            array(
                'form' => true,
                'post_id' => $userid,
                'return' => get_site_url()."/profil"."/",
                'submit_value' => 'Änderungen speichern',
                'post_title' => false,
                'post_content' => false,    
                'field_groups' => array('group_6034e1d00f273'),
            )
        );
        ?>
    <br>
    <br>

    <h2>Profil bearbeiten</h2>
    <?php echo do_shortcode("[ultimatemember_account]"); ?>
    
    <?php if (is_user_logged_in()) : ?>
        <a class="button" href="<?php echo get_site_url().'/logout/'; ?>">Logout</a>
    <?php endif;?>
    
   
</main><!-- #site-content -->


<?php get_footer(); ?>