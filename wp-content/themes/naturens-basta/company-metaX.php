<?php
/**
 * Adds the meta box stylesheet when appropriate
 */
function prfx_admin_styles(){
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style( 'prfx_meta_box_styles', plugin_dir_url( __FILE__ ) . 'metabox.css' );
    }
}
add_action( 'admin_print_styles', 'prfx_admin_styles' );

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
add_filter( 'rwmb_meta_boxes', 'companies_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "companies" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function companies_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'companies_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Standard Fields', 'company' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'foretag' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
            // TAXONOMY OMRÅDE
             array(
				'name'       => esc_html__( 'Location', 'company' ),
				'id'         => "{$prefix}location",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'location',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
            /*
            // POST LANDSKAP
			array(
				'name'        => esc_html__( 'Koppla till Landskap', 'produkt' ),//esc_html__( 'Posts (Pages)', 'your-prefix' ),
				'id'          => "{$prefix}landscape",//"{$prefix}pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'landskap',//'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => esc_html__( 'Välj ett Landskap', 'your-prefix' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),
            */
            // TEXT ADRESS
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Adress', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}address",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT POSTNUMMER
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Postnummer', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}postnr",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT ORT
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Ort', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}city",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT TELEFON
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Telefon', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}phone",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT E-POST
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'E-post', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}mail",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT HEMSIDA
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Hemsida', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}webb",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT FACEBOOK
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Facebook', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}facebook",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // TEXT INSTAGRAM
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Instagram', 'company' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}instagram",
				// Field description (optional)
				//'desc'  => esc_html__( 'Text description', 'company' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => esc_html__( 'Default text value', 'company' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
            // MAP
            /*
            array(
				'id'   => 'address',
				'name' => __( 'Address', 'company' ),
				'type' => 'text',
				'std'  => __( 'Hanoi, Vietnam', 'company' ),
			),
            */
			array(
				'id'            => 'map',
				'name'          => __( 'Location', 'company' ),
				'type'          => 'map',
				// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
				'std'           => '63.441445,16.231631,6',
				// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				'address_field' => "{$prefix}address,{$prefix}potnr,{$prefix}city",
			),
            // WYSIWYG/RICH TEXT EDITOR #FÖRETAGSBESKRIVNING
			array(
				'name'    => esc_html__( 'Företag beskrivning', 'company' ),
				'id'      => "{$prefix}description",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => esc_html__( 'WYSIWYG default value', 'company' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 8,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
            // PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => esc_html__( 'Ladda upp bilder', 'company' ),
				'id'               => "{$prefix}company-image",
				'type'             => 'plupload_image',
				'max_file_uploads' => 4,
			),
            // WYSIWYG/RICH TEXT EDITOR #NATURENS BÄSTA MOTIVERING
			array(
				'name'    => esc_html__( 'Motivering Naturens Bästa', 'company' ),
				'id'      => "{$prefix}motivation",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => esc_html__( 'WYSIWYG default value', 'company' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
		),
	);

	return $meta_boxes;
}

    /* Register connection 
    $connection_args = array(
        'name' => 'company_post',
        'from' => 'landskap',
        'to'   => 'foretag',
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