<?php

function wp_add_theme_metabox() {
    
    add_meta_box(
        'wp_meta',
        __( 'Temainformation' ),
        'theme_meta_callback',
        'theme',
        'normal',
        'high'
    );
    
}

add_action( 'add_meta_boxes', 'wp_add_theme_metabox' );

function theme_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wp_themes_nonce' );
	$wp_stored_meta = get_post_meta( $post->ID ); 
    $wp_stored_taxonomy = get_post_taxonomies( $post->ID ); ?>

	<div>
        <!--
		<div class="meta-row">
			<div class="meta-th">
				<label for="?" class="wp-row-title"><?php //_e( '?', 'wp-theme-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="wp-row-content" name="?" id="?" value="<?php //if ( ! empty ( $wp_stored_meta['?'] ) ) { echo esc_attr( $wp_stored_meta['?'][0] ); } ?>"/>
			</div>
		</div>
        -->
        
        <div class="meta-row">
			<div class="meta-th">
				<label for="meta-image" class="wp-row-title"><?php _e( 'Ladda upp bild', 'wp-theme-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="wp-row-content" name="meta-image" id="meta-image" value="<?php if ( isset ( $wp_stored_meta['meta-image'] ) ) echo $wp_stored_meta['meta-image'][0]; ?>" />
                <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Välj eller ladda upp en bild', 'wp-theme-listing' )?>" />
			</div>
		</div><br><br>
		
		<div class="meta">
			<div class="meta-th">
				<span><?php _e( 'Beskrivning av Tema', 'wp-theme-listing' ) ?></span><br><br>
			</div>
		</div>
		<div class="meta-editor"></div>
		<?php

		$content = get_post_meta( $post->ID, 'theme-content', true );
		$editor = 'theme-content';
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

function wp_theme_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wp_themes_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp_themes_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    /*
    if ( isset( $_POST[ 'address' ] ) ) {
    	update_post_meta( $post_id, 'address', sanitize_text_field( $_POST[ 'address' ] ) );
    }
    */
    
    if( isset( $_POST[ 'meta-image' ] ) ) {
        update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
    }
    
    if ( isset( $_POST[ 'theme-content' ] ) ) {
		update_post_meta( $post_id, 'theme-content', wp_kses_post( $_POST[ 'theme-content' ] ) );
	}
}

add_action( 'save_post', 'wp_theme_meta_save' );