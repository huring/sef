<?php
// Custom Post Tema
function register_post_theme() {
	
	$singular = 'Tema';
	$plural = 'Teman';
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
        'menu_position'       => 12, // https://wordpress.org/support/topic/custom-post-type-menu-positions
        'menu_icon'           => 'dashicons-category', // https://developer.wordpress.org/resource/dashicons/#vault
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        // 'capabilities' => array(),
        'rewrite'             => array( 
            'slug' => strtolower( $plural_slug ),
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
	register_post_type( 'theme', $args );
}

add_action( 'init', 'register_post_theme' );