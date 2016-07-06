<?php
get_header();
// Get data from URL into variables
$_omrade = $_GET['location'] != '' ? $_GET['location'] : '';
//$_omrade = $_GET['location'];

$_aktivitet = $_GET['aktivitet'] != '' ? $_GET['aktivitet'] : '';
//$_aktivitet = (array) $_GET['aktivitet'];

$_habitat = $_GET['habitat'] != '' ? $_GET['habitat'] : '';
//$_habitat = $_GET['habitat'];

//$_text = $_GET['text'] != '' ? $_GET['text'] : '';

//print_r($_aktivitet);

// Start the Query
/*
if ($_text !== '') {
    $v_args = array(
        'post_type'     =>  'produkt',
        'meta_query'    =>  array(
                                array(
                                
                                ),
                            ),
        );
}
*/
if ($_omrade !== '' && $_aktivitet == '' && $_habitat == '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'omrade',
                                    'field'         => 'slug',
                                    'terms'         => $_omrade,
                                ),
            ),
        );
    
} elseif ($_omrade == '' && $_aktivitet !== '' && $_habitat == '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'aktivitet',
                                    'field'         => 'slug',
                                    'terms'         => $_aktivitet,
                                ),
            ),
        );
   
} elseif ($_omrade == '' && $_aktivitet == '' && $_habitat !== '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'habitat',
                                    'field'         => 'slug',
                                    'terms'         => $_habitat,
                                ),
            ),
        );
    
} elseif ($_omrade !== '' && $_aktivitet !== '' && $_habitat == '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'omrade',
                                    'field'         => 'slug',
                                    'terms'         => $_omrade,
                                ),
                                array(
                                    'taxonomy'      => 'aktivitet',
                                    'field'         => 'slug',
                                    'terms'         => $_aktivitet,
                                ),
            ),
        );
    
} elseif ($_omrade !== '' && $_aktivitet == '' && $_habitat !== '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'omrade',
                                    'field'         => 'slug',
                                    'terms'         => $_omrade,
                                ),
                                array(
                                    'taxonomy'      => 'habitat',
                                    'field'         => 'slug',
                                    'terms'         => $_habitat,
                                ),
            ),
        );
    
} elseif ($_omrade == '' && $_aktivitet !== '' && $_habitat !== '') {
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'aktivitet',
                                    'field'         => 'slug',
                                    'terms'         => $_aktivitet,
                                ),
                                array(
                                    'taxonomy'      => 'habitat',
                                    'field'         => 'slug',
                                    'terms'         => $_habitat,
                                ),
            ),
        );
    
} elseif ($_omrade !== '' && $_aktivitet !== '' && $_habitat !== '') {    
    $v_args = array(
        'post_type'    =>  'produkt',// Custom Post Type
        'tax_query'    =>  array(
                                array(
                                    'taxonomy'      => 'omrade',
                                    'field'         => 'slug',
                                    'terms'         => $_omrade,
                                ),
                                array(
                                    'taxonomy'      => 'aktivitet',
                                    'field'         => 'slug',
                                    'terms'         => $_aktivitet,
                                ),
                                array(
                                    'taxonomy'      => 'habitat',
                                    'field'         => 'slug',
                                    'terms'         => $_habitat,
                                ),
                            ),

        );
}

$productSearchQuery = new WP_Query( $v_args );

// Open this line to Debug what's query WP has just run
 //var_dump($productSearchQuery->request);
 //echo $GLOBALS['productSearchQuery']->request;
 
// Show the results
if( $productSearchQuery->have_posts() ) :
    while( $productSearchQuery->have_posts() ) : $productSearchQuery->the_post();
        the_title(); ?><br><?php
    endwhile;
else :
    _e( 'Sorry, nothing matched your search criteria', 'textdomain' );
endif;
wp_reset_postdata();