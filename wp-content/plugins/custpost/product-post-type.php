<?php
// Custom Post Produkt
function register_post_product() {
	
	$singular = 'Produkt';
	$plural = 'Produkter';
	$plural_slug = str_replace( ' ', '_', $plural );

	$labels = array(
		'name' 			      => $plural,
		'singular_name' 	  => $singular,
		'add_new' 		      => 'Lägg till ',
		'add_new_item'  	  => 'Lägg till ' . $singular,
		'edit'		          => 'Edit',
		'edit_item'	          => 'Edit ' . $singular,
		'new_item'	          => 'New ' . $singular,
		'view' 			      => 'View ' . $singular,
		'view_item' 		  => 'View ' . $singular,
		'search_term'   	  => 'Search ' . $plural,
		'parent' 		      => 'Parent ' . $singular,
		'not_found' 		  => 'No ' . $plural .' found',
		'not_found_in_trash'  => 'No ' . $plural .' in Trash'
		);

	$args = array(
		'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 11, // https://wordpress.org/support/topic/custom-post-type-menu-positions
        'menu_icon'           => 'dashicons-tag', // https://developer.wordpress.org/resource/dashicons/#vault
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        // 'capabilities' => array(),
        'rewrite'             => array( 
            /*'slug' => strtolower( $plural_slug ),*/
            'slug' => strtolower( $singular ),
            'with_front' => true,
            'pages' => true,
            'feeds' => false,
        ),
        'supports'            => array( 
            'title', 
            //'editor', 
            //'author', 
            //'custom-fields', 
            //'thumbnail'
        )
	);
	register_post_type( 'produkt', $args );
}

add_action( 'init', 'register_post_product' );


/***************************
* Product Custom Taxonomies
****************************/

//----------------------------- Custom Taxonomy Säsong ------------------------------------

function register_taxonomy_season() {
    
    $plural = 'Sasonger';
    $singular = 'Sasong';
    
    $labels = array(
        'name'                          => $plural,
        'singular_name'                 => $singular,
        'search_items'                  => 'Search ' . $plural, 
        'popular_items'                 => 'Popular ' . $plural,
        'all_items'                     => 'All ' . $plural,
        'parent_item'                   => null,
        'paretnt_item_colon'            => null,
        'edit_item'                     => 'Edit ' . $singular,
        'update_item'                   => 'Update ' . $singular,
        'add_new_item'                  => 'Add New ' . $singular,
        'new_item_name'                 => 'New ' . $singular . ' Name',
        'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'           => 'Add or remove ' . $plural,
        'choose_from_most_used'         => 'Chose from the most used ' . $plural,
        'not_found'                     => 'No ' . $plural . ' found.',
        'menu_name'                     => $plural,
    );
        
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => strtolower( $singular ) ),
    );
    
    register_taxonomy( strtolower( $singular ), 'produkt', $args );
    
}

add_action( 'init' , 'register_taxonomy_season' );

//----------------------------- Custom Taxonomy Område ------------------------------------

function register_taxonomy_area() {
    
    $plural = 'Omraden';
    $singular = 'Omrade';
    
    $labels = array(
        'name'                          => $plural,
        'singular_name'                 => $singular,
        'search_items'                  => 'Search ' . $plural, 
        'popular_items'                 => 'Popular ' . $plural,
        'all_items'                     => 'All ' . $plural,
        'parent_item'                   => null,
        'paretnt_item_colon'            => null,
        'edit_item'                     => 'Edit ' . $singular,
        'update_item'                   => 'Update ' . $singular,
        'add_new_item'                  => 'Add New ' . $singular,
        'new_item_name'                 => 'New ' . $singular . ' Name',
        'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'           => 'Add or remove ' . $plural,
        'choose_from_most_used'         => 'Chose from the most used ' . $plural,
        'not_found'                     => 'No ' . $plural . ' found.',
        'menu_name'                     => $plural,
    );
        
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => strtolower( $singular ) ),
    );
    
    register_taxonomy( strtolower( $singular ), 'produkt', $args );
    
}

add_action( 'init' , 'register_taxonomy_area' );

//----------------------------- Custom Taxonomy Habitat --------------------------------

function register_taxonomy_nature() {
    
    $plural = 'Habitat';
    $singular = 'Habitat';
    
    $labels = array(
        'name'                          => $plural,
        'singular_name'                 => $singular,
        'search_items'                  => 'Search ' . $plural, 
        'popular_items'                 => 'Popular ' . $plural,
        'all_items'                     => 'All ' . $plural,
        'parent_item'                   => null,
        'paretnt_item_colon'            => null,
        'edit_item'                     => 'Edit ' . $singular,
        'update_item'                   => 'Update ' . $singular,
        'add_new_item'                  => 'Add New ' . $singular,
        'new_item_name'                 => 'New ' . $singular . ' Name',
        'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'           => 'Add or remove ' . $plural,
        'choose_from_most_used'         => 'Chose from the most used ' . $plural,
        'not_found'                     => 'No ' . $plural . ' found.',
        'menu_name'                     => $plural,
    );
        
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => strtolower( $singular ) ),
    );
    
    register_taxonomy( strtolower( $singular ), 'produkt', $args );
    
}

add_action( 'init' , 'register_taxonomy_nature' );


//----------------------------- Custom Taxonomy Aktivitet ---------------------------------

function register_taxonomy_category() {
    
    $plural = 'Aktiviteter';
    $singular = 'Aktivitet';
    
    $labels = array(
        'name'                          => $plural,
        'singular_name'                 => $singular,
        'search_items'                  => 'Search ' . $plural, 
        'popular_items'                 => 'Popular ' . $plural,
        'all_items'                     => 'All ' . $plural,
        'parent_item'                   => null,
        'paretnt_item_colon'            => null,
        'edit_item'                     => 'Edit ' . $singular,
        'update_item'                   => 'Update ' . $singular,
        'add_new_item'                  => 'Add New ' . $singular,
        'new_item_name'                 => 'New ' . $singular . ' Name',
        'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'           => 'Add or remove ' . $plural,
        'choose_from_most_used'         => 'Chose from the most used ' . $plural,
        'not_found'                     => 'No ' . $plural . ' found.',
        'menu_name'                     => $plural,
    );
        
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => strtolower( $singular ) ),
    );
    
    register_taxonomy( strtolower( $singular ), 'produkt', $args );
    
}

add_action( 'init' , 'register_taxonomy_category' );
