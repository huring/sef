<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'products_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "products" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function products_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'products_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Standard Fields', 'product' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'produkt' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(

            // POST FÖRETAG
			array(
				'name'        => esc_html__( 'Koppla till Företag', 'produkt' ),//esc_html__( 'Posts (Pages)', 'your-prefix' ),
				'id'          => "{$prefix}company",//"{$prefix}pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'foretag',//'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => esc_html__( 'Välj ett Företag', 'your-prefix' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
            ),
            // DATE SÄSONGSSTART
			array(
				'name'       => esc_html__( 'Startdatum aktivitet', 'product' ),
				'id'         => "{$prefix}season-start",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => esc_html__( '(yyyy-mm-dd)', 'product' ),
					'dateFormat'      => esc_html__( 'yy-mm-dd', 'product' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
            // DATE SÄSONGSSLUT
            array(
				'name'       => esc_html__( 'Slutdatum aktivitet', 'product' ),
				'id'         => "{$prefix}season-end",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => esc_html__( '(yyyy-mm-dd)', 'product' ),
					'dateFormat'      => esc_html__( 'yy-mm-dd', 'product' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
            // TEXTAREA INFO SÄSONG
			array(
				'name' => esc_html__( 'Info säsong', 'product' ),
				'desc' => esc_html__( 'Undantagna helgdagar etc.', 'product' ),
				'id'   => "{$prefix}season-info",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
			// TEXT RESLÄNGD
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Reslängd', 'product' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}trip-length",
				// Field description (optional)
				'desc'  => esc_html__( 'Antal dagar', 'product' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'product' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT DELTAGARE
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Deltagare', 'product' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}participant",
				// Field description (optional)
				'desc'  => esc_html__( 'Antal deltagare', 'product' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'product' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT PRIS
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Nomalris / Vuxen', 'product' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}price",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'product' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'product' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXTAREA ALTERNATIV
			array(
				'name' => esc_html__( 'Alternativ', 'product' ),
				'desc' => esc_html__( 'Pris för barn, ungdom, grupp, etc.', 'product' ),
				'id'   => "{$prefix}price-option",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
            // TEXTAREA INGÅR I PRISET
			array(
				'name' => esc_html__( 'Ingår i priset', 'product' ),
				'desc' => esc_html__( 'Mat, boende etc.', 'product' ),
				'id'   => "{$prefix}included",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
            // TEXTAREA BOENDE
			array(
				'name' => esc_html__( 'Boende', 'product' ),
				'desc' => esc_html__( 'Ingår / Ingår ej, Plats i dubbelrum, etc.', 'product' ),
				'id'   => "{$prefix}lodging",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
            // TEXTAREA FÖRKUNSKAPER
			array(
				'name' => esc_html__( 'Förkunnskaper', 'product' ),
				'desc' => esc_html__( 'Ej annpassat för rörelsehindrade etc.', 'product' ),
				'id'   => "{$prefix}skills",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
            // TEXTAREA KOMMA HIT
			array(
				'name' => esc_html__( 'Komma hit', 'product' ),
				'desc' => esc_html__( 'Tips på färdsätt', 'product' ),
				'id'   => "{$prefix}travel",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
            // TAXONOMY SÄSONG
			array(
				'name'       => esc_html__( 'Säsong', 'product' ),
				'id'         => "{$prefix}season",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'sasong',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
            // TAXONOMY NATURTYP
            array(
				'name'       => esc_html__( 'Naturtyp', 'product' ),
				'id'         => "{$prefix}biotop",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'naturtyp',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
            // TAXONOMY KATEGORI
             array(
				'name'       => esc_html__( 'Kategori', 'product' ),
				'id'         => "{$prefix}category",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'kategori',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
            // WYSIWYG/RICH TEXT EDITOR PRODUKTBESKRIVNING
			array(
				'name'    => esc_html__( 'Produkt beskrivning', 'product' ),
				'id'      => "{$prefix}description",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => esc_html__( 'WYSIWYG default value', 'product' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 8,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
            // PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => esc_html__( 'Ladda upp bilder', 'product' ),
				'id'               => "{$prefix}product-image",
				'type'             => 'plupload_image',
				'max_file_uploads' => 4,
			),
            
		),
	);

	return $meta_boxes;
}


/* Register connection 
$connection_args = array(
    'name' => 'product_post',
    'from' => 'foretag',
    'to'   => 'produkt',
    'sortable'   => 'any',
    'reciprocal' => false,
    //'admin_box'  => false

    'admin_box' => array(
        'show' => 'any',
        'context' => 'normal',
        'can_create_post' => false
    ),
    'admin_column' => 'any'

);

p2p_register_connection_type($connection_args); */