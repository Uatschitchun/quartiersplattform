<?php

# redirect when maintenance is ON
wp_maintenance_mode();

?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" rel="stylesheet">


    <link rel="preload stylesheet" href="<?php echo get_template_directory_uri(); ?>/first.css">

    <?php wp_head(); ?>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri()?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri()?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Emoji Picker -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- Matomo Tracking API Key -->
    <?php the_field('matomo_api', 'option'); ?>
</head>

<body <?php body_class(); ?>>

<?php 
// echo current_user_can('skip_maintenance');
?>

    <?php
        wp_body_open();
        // check if menu is needed
        $menu = 'page-header';
        if( cms_is_in_menu( 'qp_menu') ) {
            $menu = 'post-header';
        }
    ?>

    

    <header id="site-header" class="<?php echo $menu; ?>">
        <div class="site-header-content">
            <div class="pull-left">

            <?php 
            # if in menu && if in maintenance mode + user cant skip
            if (is_front_page() || cms_is_in_menu( 'qp_menu') || ( get_field('maintenance', 'option') == true && !current_user_can('skip_maintenance')) ) {
            ?>

                <?php
                # remove menu when in maintenance mode
                if (get_field('maintenance', 'option') == false || current_user_can('skip_maintenance')) {
                    if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
                ?>

                <ul class="menu reset-list-style" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
                    <?php
                        if ( has_nav_menu( 'primary' ) ) {

                            wp_nav_menu(
                                array(
                                    'container'  => '',
                                    'items_wrap' => '%3$s',
                                    'theme_location' => 'primary',
                                )
                            );

                        } elseif ( ! has_nav_menu( 'expanded' ) ) {

                            wp_list_pages(
                                array(
                                    'match_menu_classes' => true,
                                    'show_sub_menu_icons' => true,
                                    'title_li' => false,
                                    'walker'   => new TwentyTwenty_Walker_Page(),
                                )
                            );
                        }
                    ?>
                </ul>

                <?php 
                        }   
                    }
                ?>






                <?php 
            } 
            else {
                ?>
                
                <!-- back button -->
                <button class="button header-button button-has-icon is-style-outline" onclick="history.go(-1);">
                    <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
                    <span class="button-has-icon-label">Zurück</span>
                </button>
            
                <?php 
            }
            ?>

            </div>

            <div class="push-right">

                <a class="button header-button is-style-outline " onclick="show()">
                <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/ampelmann.svg" />
                </a>

                <a class="button header-button  button-has-icon <?php if (!is_page( 'Veranstaltungen' )) echo "is-style-outline"; ?> " href="<?php echo get_site_url(); ?>/veranstaltungen">
                <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/calendar.svg" />
                </a>

                <?php
                // logged in user
                if (is_user_logged_in()) {
                ?>

                <?php 
                // backend login button for admins
                if(current_user_can('administrator')) {
                    ?>
                        <a class="button header-button  button-has-icon is-style-outline "
                            href="<?php echo get_site_url(); ?>/wp-admin">
                            <img class="button-icon " src="<?php echo get_template_directory_uri()?>/assets/icons/backend.svg" />
                            <!-- <span class="button-has-icon-label">Backend</span> -->
                        </a>
                    <?php 
                }
                ?>

                <!-- profil button -->
                <a class="button header-button button-has-image is-style-outline" href="<?php echo get_site_url(); ?>/profil">
                    <img class="button-image" src="<?php echo um_get_user_avatar_url(get_current_user_id(), $size = '300' ) ?>" />
                </a>
                <?php 
            }
            // logged out user
            else {
                ?>
                <a class="button header-button button-has-icon is-style-outline"
                    href="<?php echo get_site_url(); ?>/login">
                    <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
                    <span class="button-has-icon-label">Anmelden</span>
                </a>
                <?php 
            }
            ?>

            </div>
            </div>



        
        </div><!-- .header-navigation-wrapper -->

    </header><!-- #site-header -->

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        var currentScrollTop = 0;
        var c = 0;

        function scrollFunction() {
            currentScrollTop = document.documentElement.scrollTop;

            if (Math.abs(currentScrollTop - c) > 150) {
                // console.log(currentScrollTop+ ' '+ c);
                if (currentScrollTop > c) {
                    // console.log('down');
                    document.getElementById("site-header").style.top = "0px";
                }
                else {
                    // console.log('up');
                    document.getElementById("site-header").style.top = "0px";
                }
                c = currentScrollTop;
            }
        }
    </script>



    <!-- energie ampel -->
    <div id="overlay" class="overlay hidden">

        <div class="overlay-content">
            <button class="button header-button button-has-icon is-style-outline" onclick="hide()">
                <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
                <span class="button-has-icon-label">Zurück</span>
            </button>
            <?php get_template_part('components/energie_ampel-menu'); ?>
        </div>

    </div>
