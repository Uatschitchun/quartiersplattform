<?php

/**
 * 
 * Template Name: Plattform
 * Template Post Type: page
 * 
 */


# redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
// redirect_visitor();

get_header();

?>

<main class="quartier" role="main" data-track-content>

    <br><br><br><br><br><br><br><br>
    <!-- heading -->
    <h1 class="heading-size-1"><?php echo __('Quartiersplattform','quartiersplattform')." ".get_field('quartiersplattform-name','option'); ?></h1>
    <p><?php _e('Allegemine Informationen zur Quartiersplattform', 'quartiersplattform')." ".get_field('quartiersplattform-name','option'); ?></p>

    <!-- general information -->
    <!-- qp version -->
    <?php 
    $wordpress_version = get_bloginfo( 'version' );
    echo "<p>$wordpress_version</p>";
    echo "<p>".wp_get_theme()->version."</p>";
    ?>
    <br><br>

    <?php 
    // Quartiersplattform Einstellungen
    if ( current_user_can('administrator') ) {

        // warning if update available
        // get data (latest version from api)
        $url = "http://api.quartiersplattform.org";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $resp = curl_exec($curl);
        curl_close($curl);
        // var_dump($resp);
        $res = json_decode($resp, true);
        // display warning
        if (!empty($res['general']['latest_version']['version']) && $res['general']['latest_version']['version'] != wp_get_theme()->version) {
            reminder_card('warning', __('Es gibt eine neue Version','quartiersplattform'), __('Installiere die neue Version der Quartiersplattform und bringe neue features in dein Quartier. Der genaue ablauf wird in der <a href="https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/documentation.md">Dokumentation</a> beschrieben unter ','quartiersplattform'), 'Link zum Download', 'https://github.com/studio-arrenberg/quartiersplattform/releases');
        }
        // Reminder Card Einstellungen
        $text = __('Bearbeite die Einstellungen der Quartiersplattform. Den Seitennamen, Bild und Text','quartiersplattform');
		reminder_card('settings', __('Einstellungen','quartiersplattform'), $text, __('Einstellungen','quartiersplattform'), home_url().'/einstellungen' );
	
        ?>
            <a href="<?php echo home_url().'/einstellungen'; ?>" class="button">Quartierseinstellungen</a>
        <?php
    }
    ?>

    <!-- update reminder -->
    <!-- not ready yet -->
    <!-- for admins -->

    <!-- admins -->
    <h2 class="heading-size-1"><?php echo __('Admins der Quartiersplattform','quartiersplattform')." ".get_field('quartiersplattform-name','option'); ?></h2>
    <p><?php _e('Die Quartiersplaattform Moabit-West wird von folgenden Personen und Vereinen gehostet. Wenn du Fragen hast oder Probleme wende dich bitte an uns.', 'quartiersplattform'); ?></p>

    <?php 
    $user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );
    // Get the results
    $authors = $user_query->get_results();
    
    // Check for results
    if (!empty($authors)) {
        // loop through each author
        foreach ($authors as $author)
        {
            // get all the user's data
            $author_info = get_userdata($author->ID);
            author_card(true, $author->ID);
            // echo '<p>' . $author_info->first_name . ' ' . $author_info->last_name . '</p>';
        }
    } 
	wp_reset_postdata();

    ?>
    <br><br>
    
    <!-- installed plugins -->
    <h2 class="heading-size-1"><?php echo __('Installierte Plugins','quartiersplattform'); ?></h2>
    <p><?php _e('Die Quartiersplaattform Moabit-West wird von folgenden Personen und Vereinen gehostet. Wenn du Fragen hast oder Probleme wende dich bitte an uns.', 'quartiersplattform'); ?></p>

    <?php

    include_once( 'wp-admin/includes/plugin.php' );
    $all_plugins = get_plugins();

    // Get active plugins
    $active_plugins = get_option('active_plugins');

    // Assemble array of name, version, and whether plugin is active (boolean)
    foreach ( $all_plugins as $key => $value ) {
        $is_active = ( in_array( $key, $active_plugins ) ) ? true : false;
        if ($is_active == false) continue;
        $description = str_replace(array('<code>', '</code>'), '', $value['Description']) ;
        ?>

        <div>
            <h3><?php echo $value['Name']; ?></h3>
            <p><?php echo $description; ?></p>
            <span><?php echo $value['Version']; ?></span>
            <span><?php _e('Dieses Plugin ist Aktiv', 'quartiersplattform'); ?></span>
        </div>

        <?php 
    }


    ?>

    <!-- features -->
    <!-- not ready yet -->


    <?php 
	    $text = __('Teile uns dein Feedback oder Anregungen zur Quartiersplattform. Funktionert etwas nicht oder hast du eine Idee zur weiterentwicklung.','quartiersplattform');
		reminder_card('', __('Feedback zur Quartiersplattform','quartiersplattform'), $text, __('Zur Wunschliste','quartiersplattform'), home_url().'/feedback' );
	?>


</main><!-- #site-content -->

<?php get_footer(); ?>