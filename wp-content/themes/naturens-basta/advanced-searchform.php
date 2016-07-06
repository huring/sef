<?php
   
function getLocationx( $tax ) {
    $terms = get_terms( 'omrade' );
    //$x = '<div class="col-xs-12 col-md-2 form_btn">';
    /*$x = '<select id="location" class="form_btn" name="' . $tax . '">';*/
    $x = '<select id="location" class="form_btn" name="location">';
    $x .= '<option value="" disabled selected hidden>LOCATON</option>';
    foreach ( $terms as $term ) {
        $x .= '<option id="' . $term->slug . '" value="' . $term->slug . '">' . $term->name . '</option>';
    }
    $x .= '</select>';
    $x .= '<div class="select_arrow"></div>';
    //$x .= '</div>'
    return $x;
}

function getCategoriesx( $tax ) {
    $terms = get_terms( 'aktivitet' );
    $x = '<div class="col-xs-12 checkboxArea">';
    foreach ( $terms as $term ) {
        $x .= '<label class="control control-checkbox">' . $term->name . '<input type="checkbox" name="aktivitet[]" value="' . $term->slug . '"/><div class="control_indicator"></div></label>';
    }
    $x .= '</div>';
    return $x;
}

function getHabitatx( $tax ) {
    $terms = get_terms( 'habitat' );
    /*$x = '<select id="habitat" class="form_btn" name="' . $tax . '">';*/
    $x = '<select id="habitat" class="form_btn" name="habitat">';
    $x .= '<option value="" disabled selected hidden>HABITAT</option>';
    foreach ( $terms as $term ) {
        $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
    }
    $x .= '</select>';
    $x .= '<div class="select_arrow"></div>';
    return $x;
}

function getSeason( $tax ) {
    $terms = get_terms( 'sasong' );
    $x = '<div class="season_search">';
    foreach ( $terms as $term ) {
        $x .= '<button>' . $term->name . '</buttun>';
    }
    $x .= '</div>';
    return $x;
}
?>   
  
<nav class="row form_container">
    <form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
       <input type="hidden" name="search" value="advanced">
        <div class="col-xs-12 col-md-2 form_cell">
            <?php echo getLocationx( $tax ); ?>
        </div>
        <div class="location_map">

        </div>

        <div class="col-xs-12 col-md-2 form_btn" id="btnCat">
            <div class="select_arrow"></div>
            <label id="cat">CATEGORY</label>
        </div>

        <div class="col-xs-12 col-md-2 form_cell">
            <?php echo getHabitatx( $tax ); ?>
        </div>

        <div class="col-xs-12 col-md-4 form_text">
            <input id="text" name="s" type="text" value="" class="form_cell" placeholder="<?php _e( 'Or type something here', 'textdomain' ); ?>" />
        </div>

        <div class="col-xs-12 col-md-2 form_btn_search">
            <input class="subm_btn" id="searchsubmit" type="submit" value="SEARCH">
        </div>

            <?php echo getCategoriesx( $tax ); ?>
            <?php echo getSeason( $tax ); ?>
    </form>    
    
<!--
<form method="get" id="advanced-searchform" role="search" action="<?php //echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Advanced Search', 'textdomain' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php --
    <input type="hidden" name="search" value="advanced">

    <label for="name" class=""><?php _e( 'Name: ', 'textdomain' ); ?></label><br>
    <input type="text" value="" placeholder="<?php _e( 'Type the Car Name', 'textdomain' ); ?>" name="name" id="name" />

    <label for="model" class=""><?php _e( 'Select a Model: ', 'textdomain' ); ?></label><br>
    <select name="model" id="model">
        <option value=""><?php _e( 'Select one...', 'textdomain' ); ?></option>
        <option value="model1"><?php _e( 'Model 1', 'textdomain' ); ?></option>
        <option value="model2"><?php _e( 'Model 1', 'textdomain' ); ?></option>
    </select>
    
    <input type="submit" id="searchsubmit" value="Search" />

</form>
-->