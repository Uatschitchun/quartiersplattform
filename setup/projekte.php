<?php

/**
 * 
 *  Projekte Setup
 *  
 *  3. Pages (Pages, Forms)
 *  2. ACF
 *  4. Link Pages with Templates (Pages & Post types)
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. ACF
 *  --------------------------------------------------------
 */

# ACF projekte
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c5de08e4b57c',
	'title' => 'Projekt',
	'fields' => array(
		array(
			'key' => 'field_5fc64834f0bf2',
			'label' => 'Emoji',
			'name' => 'emoji',
			'type' => 'text',
			'instructions' => 'Erkläre dein Projekt mit einem Emoji.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 5,
		),
		array(
			'key' => 'field_5fc647f6f0bf0',
			'label' => 'Kurzbeschreibung',
			'name' => 'slogan',
			'type' => 'text',
			'instructions' => 'Beschreibe dein Projekt in wenigen Worten.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 55,
		),
		array(
			'key' => 'field_5fc647e3f0bef',
			'label' => 'Projektbeschreibung',
			'name' => 'text',
			'type' => 'textarea',
			'instructions' => 'Erkläre den Inhalt deines Projektes.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_60017e90839ca',
			'label' => 'Projektziel',
			'name' => 'goal',
			'type' => 'textarea',
			'instructions' => 'Was ist das Ziel von deinem Projekt?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_600180493ab1a',
			'label' => 'Bild',
			'name' => '_thumbnail_id',
			'type' => 'image',
			'instructions' => 'Gib deinem Projekt ein Bild!',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'uploadedTo',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		// array(
		// 	'key' => 'field_602d569af23cf',
		// 	'label' => 'map',
		// 	'name' => 'map',
		// 	'type' => 'google_map',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'center_lat' => '7.1297',
		// 	'center_lng' => '51.2515',
		// 	'zoom' => '',
		// 	'height' => '',
		// ),
		// array(
		// 	'key' => 'field_602e74121ff45',
		// 	'label' => 'SDG',
		// 	'name' => 'sdg',
		// 	'type' => 'taxonomy',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'taxonomy' => 'sdg',
		// 	'field_type' => 'multi_select',
		// 	'allow_null' => 1,
		// 	'add_term' => 1,
		// 	'save_terms' => 0,
		// 	'load_terms' => 0,
		// 	'return_format' => 'id',
		// 	'multiple' => 0,
		// ),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projekte',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
?>