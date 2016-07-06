<?php

function wp_add_custum_metabox() {
    
    add_meta_box(
        'wp_meta',
        __( 'Företagsinformation' ),
        'wp_meta_callback',
        'company',
        'normal',
        'high'
    );
    
}

add_action( 'add_meta_boxes', 'wp_add_custum_metabox' );

function wp_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wp_companies_nonce' );
	$wp_stored_meta = get_post_meta( $post->ID ); 
    $wp_stored_taxonomy = get_post_taxonomies( $post->ID ); ?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="address" class="wp-row-title"><?php _e( 'Adress', 'wp-company-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="wp-row-content" name="address" id="address" value="<?php if ( ! empty ( $wp_stored_meta['address'] ) ) { echo esc_attr( $wp_stored_meta['address'][0] ); } ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="postnr" class="wp-row-title"><?php _e( 'Postnr.', 'wp-company-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=10 class="wp-row-content" name="postnr" id="postnr" value="<?php if ( ! empty ( $wp_stored_meta['postnr'] ) ) echo esc_attr( $wp_stored_meta['postnr'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="city" class="wp-row-title"><?php _e( 'Ort', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="wp-row-content" name="city" id="city" value="<?php if ( ! empty ( $wp_stored_meta['city'] ) ) echo esc_attr( $wp_stored_meta['city'][0] ); ?>"/>
			</div>
		</div>
        
        <div class="meta-row">
            <div class="meta-th">
                
            </div>
            <div class="meta-td">
                  
            </div>
        </div>
        
	    <div class="meta-row">
			<div class="meta-th">
				<label for="phone" class="wp-row-title"><?php _e( 'Telefon', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="phone" id="phone" value="<?php if ( ! empty ( $wp_stored_meta['phone'] ) ) echo esc_attr( $wp_stored_meta['phone'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="mail" class="wp-row-title"><?php _e( 'Epost', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="mail" id="mail" value="<?php if ( ! empty ( $wp_stored_meta['mail'] ) ) echo esc_attr( $wp_stored_meta['mail'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="webb" class="wp-row-title"><?php _e( 'Webb', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="webb" id="webb" value="<?php if ( ! empty ( $wp_stored_meta['webb'] ) ) echo esc_attr( $wp_stored_meta['webb'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="facebook" class="wp-row-title"><?php _e( 'Facebook', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="facebook" id="facebook" value="<?php if ( ! empty ( $wp_stored_meta['facebook'] ) ) echo esc_attr( $wp_stored_meta['facebook'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="instagram" class="wp-row-title"><?php _e( 'Instagram', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="instagram" id="instagram" value="<?php if ( ! empty ( $wp_stored_meta['instagram'] ) ) echo esc_attr( $wp_stored_meta['instagram'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="latitude" class="wp-row-title"><?php _e( 'Latitud (Calculated)', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="latitude" id="latitude" placeholder="-------------------------------" value="<?php if ( ! empty ( $wp_stored_meta['latitude'] ) ) echo esc_attr( $wp_stored_meta['latitude'][0] ); ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="longitude" class="wp-row-title"><?php _e( 'Longitud (Calculated)', 'wp-company-listing' ) ?></label>
			</div>
			<div class="meta-td">
				<input type="text" size=20 class="wp-row-content" name="longitude" id="longitude" placeholder="-------------------------------" value="<?php if ( ! empty ( $wp_stored_meta['longitude'] ) ) echo esc_attr( $wp_stored_meta['longitude'][0] ); ?>"/>
			</div>
		</div><br><br>
		
		<div class="meta">
			<div class="meta-th">
				<span><?php _e( 'Beskrivning', 'wp-company-listing' ) ?></span><br><br>
			</div>
		</div>
		<div class="meta-editor"></div>
		<?php

		$content = get_post_meta( $post->ID, 'nbs-content', true );
		$editor = 'nbs-content';
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

function wp_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wp_companies_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp_companies_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'address' ] ) ) {
    	update_post_meta( $post_id, 'address', sanitize_text_field( $_POST[ 'address' ] ) );
    }
    if ( isset( $_POST[ 'postnr' ] ) ) {
    	update_post_meta( $post_id, 'postnr', sanitize_text_field( $_POST[ 'postnr' ] ) );
    }
    if ( isset( $_POST[ 'city' ] ) ) {
    	update_post_meta( $post_id, 'city', sanitize_text_field( $_POST[ 'city' ] ) );
    }
    if ( isset( $_POST[ 'phone' ] ) ) {
    	update_post_meta( $post_id, 'phone', sanitize_text_field( $_POST[ 'phone' ] ) );
    }
	if ( isset( $_POST[ 'mail' ] ) ) {
		update_post_meta( $post_id, 'mail', sanitize_text_field( $_POST[ 'mail' ] ) );
	}
	if ( isset( $_POST[ 'webb' ] ) ) {
		update_post_meta( $post_id, 'webb', sanitize_text_field( $_POST[ 'webb' ] ) );
	}
    if ( isset( $_POST[ 'facebook' ] ) ) {
		update_post_meta( $post_id, 'facebook', sanitize_text_field( $_POST[ 'facebook' ] ) );
	}
    if ( isset( $_POST[ 'instagram' ] ) ) {
		update_post_meta( $post_id, 'instagram', sanitize_text_field( $_POST[ 'instagram' ] ) );
	}
    // Get Lat/Long from address/city
        $address = $_POST['address']." ".$_POST['city'];
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
    
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
    
    if ( isset( $_POST[ 'latitude' ] ) ) {
		update_post_meta( $post_id, 'latitude', $latitude );
	}
    if ( isset( $_POST[ 'longitude' ] ) ) {
		update_post_meta( $post_id, 'longitude', $longitude );
	}
    if ( isset( $_POST[ 'nbs-content' ] ) ) {
		update_post_meta( $post_id, 'nbs-content', wp_kses_post( $_POST[ 'nbs-content' ] ) );
	}
}
add_action( 'save_post', 'wp_meta_save' );