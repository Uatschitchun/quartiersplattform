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

<main id="site-content" class="site-content-profil " role="main">

    <div class="single-header profil">
        
        <?php 
        // User Avatar
        $current_user = wp_get_current_user();
        echo get_avatar( $current_user->user_email, 32 );
        ?>


        <!-- user  name -->
        <div class="single-header-content">
            <h1><?php $current_user = wp_get_current_user(); echo $current_user->first_name." ".$current_user->last_name; ?></h1>
        </div>

        
    </div>

    <!-- Gutenberg Editor Content -->    
    <div class="gutenberg-content ">
        <?php
            if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
        ?>
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

    <?php if( current_user_can('administrator') ) { ?>
        <br>
        <h2>Reminder Cards</h2>
        <p>Zeige alle Reminder Cards wieder an.</p>
        <div class="reset_reminder_cards">
            <a class="button reset_reminder_cards" onclick="reset_reminder_cards()">Reminder Cards zurücksetzen</a>
            <span class="acf-spinner is-active" style="display: inline-block;"></span>
        </div>
        
        <script>
            function reset_reminder_cards() {

                $('div.reset_reminder_cards span.acf-spinner').addClass('is-active');

                var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";

                var data = {
                    'action': 'reset_reminder_cards',
                    'request': 1
                };

                $.ajax({
                    url: ajax_url,
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        $('a.reset_reminder_cards').addClass('is-done');
                        $('div.reset_reminder_cards span.acf-spinner').removeClass('is-active');
                    }
                });
            }
        </script>
    <?php } ?>

    <br>
    <br>
    <h2>Profil bearbeiten</h2>
    <?php echo do_shortcode("[ultimatemember_account]"); ?>

    <a class="button is-style-outline" href="<?php echo get_author_posts_url(get_current_user_id()); ?>">Mein öffentliches Profil ansehen</a>

    <br>
    
    <?php if (is_user_logged_in()) : ?>
        <a class="button" href="<?php echo get_site_url().'/logout/'; ?>">Logout</a>
    <?php endif;?>
    
   
</main><!-- #site-content -->


<?php get_footer(); ?>