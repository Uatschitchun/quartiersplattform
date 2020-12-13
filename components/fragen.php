<?php
/**
 * Angebote
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="feedback">
    <h3>Stelle eine Frage an dein Quartier</h3>

    <?php // acf_form_head(); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php acf_form(
			array(
				'id' => 'fragen-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',
				// 'updated_message' => __("Post updated", 'acf'),
				// 'html_updated_message'  => '<div id="message" class="updated"><h1>Hallo welt</h1></div>',
				'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'fragen',
                    // 'tax_input' => array (
                    //     'version' => array( 2 )
                    // ),
                    'post_status' => 'publish',
				),
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => false,
                // 'return' => '?updated=true',
                'return' => get_site_url().'/gemeinsam', // post gets dublicated
				'fields' => array(
                    'text',
                    'emoji',
				),
				'submit_value'=>'Frage veröffentlichen',
			)
    ); 


    ?>
       
        <!-- <div class="lead emoji-picker-container">
            <input id="emoji" type="email" class="form-control" placeholder="Input with max length of 10" data-emojiable="true"
                maxlength="9">
        </div> -->


    <script>

        // picker for acf field
        var el = $( "#acf-field_5fcf563d5b576" );
        el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        el.attr("data-emojiable", "true");
        el.attr('maxlength', '2');

        // test
        // var el = $( "#emoji" );
        // el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        // el.attr("data-emojiable", "true");
        // el.attr('maxlength', '2');

        // empty field
        // $( ".emoji-picker-container" ).click(function() {
        //     $( this ).children('.emoji-wysiwyg-editor').text('');
        // });

        // on change empty
        // $( ".emoji-picker-container > .emoji-wysiwyg-editor" ).change(function() {
        //     // $( this ).children('.emoji-wysiwyg-editor').text('');
        // });
        
        // remove previous emojies
        $('div.emoji-picker-container').bind('DOMSubtreeModified', function(){
            console.log('call');
            $( this ).find('.emoji-wysiwyg-editor').children('img').not(':last').remove();
        });


        $(function() {
            // Initializes and creates emoji set from sprite sheet
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '<?php echo get_template_directory_uri(); ?>/assets/emoji-picker/img/',
                popupButtonClasses: 'fa fa-smile-o'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        });

    </script>



    <!-- for testing -->
    <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/anmerkungen">Zur Wunschliste
    </a>
</div>