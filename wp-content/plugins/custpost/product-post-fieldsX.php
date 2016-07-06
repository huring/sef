<?php

function wp_add_product_metabox() {
    
    add_meta_box(
        'product_meta',
        __( 'Produktinformation' ),
        'product_meta_callback',
        'product',
        'normal',
        'high'
    );
    
}

add_action( 'add_meta_boxes', 'wp_add_product_metabox' );

function product_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wp_product_nonce' );
	$wp_stored_meta = get_post_meta( $post->ID ); 
    $wp_stored_taxonomy = get_post_taxonomies( $post->ID ); ?>

	<div>
	    <div class="meta-row">
			<div class="meta-th">
				<label for="start" class="wp-row-title"><?php _e( 'Start datum', 'wp-product-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=10 class="dwwp-row-content datepicker" name="start" id="start" value="<?php if ( ! empty ( $dwwp_stored_meta['start'] ) ) echo esc_attr( $dwwp_stored_meta['start'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="end" class="wp-row-title"><?php _e( 'Slut datum', 'wp-product-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=10 class="dwwp-row-content datepicker" name="end" id="end" value="<?php if ( ! empty ( $dwwp_stored_meta['end'] ) ) echo esc_attr( $dwwp_stored_meta['end'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="price" class="wp-row-title"><?php _e( 'Pris', 'wp-product-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=10 class="wp-row-content" name="price" id="price" value="<?php if ( ! empty ( $wp_stored_meta['price'] ) ) { echo esc_attr( $wp_stored_meta['price'][0] ); } ?>"/>
			</div>
		</div>
		
		<br><br>
		<div class="meta">
			<div class="meta-th">
				<span><?php _e( 'Beskrivning', 'wp-product-listing' ) ?></span><br><br>
			</div>
		</div>
		<div class="meta-editor"></div>
		<?php

		$content = get_post_meta( $post->ID, 'product-content', true );
		$editor = 'product-content';
		$settings = array(
			'textarea_rows' => 8,
			'media_buttons' => false,
		);

		wp_editor( $content, $editor, $settings); ?>
		</div>
		
	</div>
	<div class="clear"></div>	
	<?php
}

function product_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wp_product_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp_product_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'start' ] ) ) {
    	update_post_meta( $post_id, 'start', sanitize_text_field( $_POST[ 'start' ] ) );
    }
    
    if ( isset( $_POST[ 'end' ] ) ) {
    	update_post_meta( $post_id, 'end', sanitize_text_field( $_POST[ 'end' ] ) );
    }
    
    if ( isset( $_POST[ 'price' ] ) ) {
    	update_post_meta( $post_id, 'price', sanitize_text_field( $_POST[ 'price' ] ) );
    }
    
    if ( isset( $_POST[ 'product-content' ] ) ) {
		update_post_meta( $post_id, 'product-content', wp_kses_post( $_POST[ 'product-content' ] ) );
	}
}
add_action( 'save_post', 'product_meta_save' );