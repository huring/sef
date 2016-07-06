<?php
/**
 * The template for displaying all single posts and attachments for Products
 */

// TITLE
//the_title( '<h2>', '<h2>');
// IMAGES
$images = rwmb_meta( 'products_product-image', 'size=YOURSIZE' );
if ( !empty( $images ) ) {
    foreach ( $images as $image ) {
        $showimage = "<a href='{$image['full_url']}'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></a>";
    }
}
// PRODUCT CONTENT
$product_content = rwmb_meta( 'products_description' ); 
// GET COMPANY ID
$company = rwmb_meta( 'products_company' );
// COMPANY TITLE
$company_title = get_the_title( $company );
// SEASON START
$season_start = rwmb_meta( 'products_season-start' );
// SEASON END
$season_end = rwmb_meta( 'products_season-end' );
// SEASON INFO
$season_info = rwmb_meta( 'products_season-info' );
// TRIP LENGTH
$length = rwmb_meta( 'products_trip-length' );
// PARTICIPANTS
$participants = rwmb_meta( 'products_participants' );
// PRICE
$price = rwmb_meta( 'products_price' );
// PRICE - OPTION
$price_option = rwmb_meta( 'products_price-option' );
// INCLUDED
$included = rwmb_meta( 'products_included' );
// LODGING
$lodging = rwmb_meta( 'products_lodging' );
// SKILLS
$skills = rwmb_meta( 'products_skills' );
// TRAVEL
$travel = rwmb_meta( 'products_travel' );
// COMPANY WEB URL
$web_url = get_post_meta( $company, 'companies_webb', true );
// GOOGLE MAPS COORDINATES
$koordinater = get_post_meta( $company, 'map', true );

get_header();
?>
    <div id="primary" class="content-area row">
        <main id="main" class="site-main col-xs-12 col-md-4" role="main">
        <h1>single-product.php</h1>   
            <?php
            the_title( '<h2>', '</h2>');
            echo '<br>';
            echo $showimage;
            echo '<br>';
            echo $product_content;
            
            // COMPANY TITLE
            echo '<a href="' . esc_url( get_post_permalink( $company ) ) . '">' . $company_title . '</a>';

            echo '<br>';
            echo $season_start;
            echo '<br>';
            echo $season_end;
            echo '<br>';
            echo $season_info;
            echo '<br>';
            echo $length;
            //echo '<br>';
            echo $participants;
            echo '<br>';
            echo $price;
            echo '<br>';
            echo $price_option;
            echo '<br>';
            echo $included;
            echo '<br>';
            echo $lodging;
            echo '<br>';
            echo $skills;
            echo '<br>';
            echo $travel;
            echo '<br>';
            // COMPANY WEB URL
            echo '<a href="' . esc_url( $web_url ) . '" target="_blank">' . $web_url . '</a>';
            echo '<br>';
            // FACEBBOOK SHARE
            //$site_link = the_permalink();
            $temp_link = get_permalink($post->ID);
            /*
            echo '<div class="fb-share-button" data-href="' . $temp_link . '" data-layout="icon" data-mobile-iframe="true">
                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Dela</a>
            </div>';
            */
            echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $twmp_link . '">Share on Facebook</a>';
                
            echo '<br><br>';
            echo '<a href="https://www.facebook.com/sharer.php?u=' . $temp_link . '">hej</a>';
            echo '<br><br>';
            echo $temp_link;
            echo '<br><br>';
                
            ?>
        </main>
        <aside class="col-xs-12 col-md-8">
            <?php
            // VISA KARTA
            $args = array(
                'type'         => 'map',
                'width'        => '640px', // Map width, default is 640px. Can be '%' or 'px'
                'height'       => '480px', // Map height, default is 480px. Can be '%' or 'px'
                'zoom'         => 14,  // Map zoom, default is the value set in admin, and if it's omitted - 14
                'marker'       => true, // Display marker? Default is 'true',
                'marker_title' => '', // Marker title when hover
                'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', // Info window content, can be anything. HTML allowed.
            );
            //echo rwmb_meta( $koordinater, $args ); // For current post
            echo rwmb_meta( 'map', $args, $company ); // For another post with $post_id
            
            ?>
        </aside>
    </div>

<?php
//get_sidebar();
get_footer();


?>
<!-- SCRIPT FÖR FACEBOOK API - LADDA IN I FUNCTIONS.PHP
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->