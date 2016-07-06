<?php
/**
 * The template for displaying all single posts and attachments for Company
 */

$address = rwmb_meta( 'companies_address' );
$postnr = rwmb_meta( 'companies_postnr' );
$city = rwmb_meta( 'companies_city' );
$phone = rwmb_meta( 'companies_phone' );
$mail = rwmb_meta( 'companies_mail' );
$webb = rwmb_meta( 'companies_webb' );
$facebook = rwmb_meta( 'companies_facebook' );
$instagram = rwmb_meta( 'companies_instagram' );
//$koordinater = rwmb_meta( 'map' );
$company_content = rwmb_meta( 'companies_description' );
$motivation = rwmb_meta( 'companies_motivation' );
$images = rwmb_meta( 'companies_company-image', 'size=YOURSIZE' );
if ( !empty( $images ) ) {
    foreach ( $images as $image ) {
        $showimage = "<a href='{$image['full_url']}'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></a>";
    }
}


get_header();


/*            
$companyOutput = '<label>Webbplats: </label><a href="' . $webb . '">' . $webb . '</a><br>';
$companyOutput .= $mail;
*/          
?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h1>single-foretag.php</h1>
            <?php
            the_title( '<h2>', '</h2>');
            echo '<br>';
            echo $showimage;
            ?>  
        </main>
        <div class="row">
            <section class="col-xs-12 col-md-4">
                <?php
                echo '<br>Företagsbeskrivning:';
                echo $company_content;
                echo 'Motivering:';
                echo $motivation;
                //echo '<br>';
                echo $address;
                echo '<br>';
                echo $postnr;
                echo '<br>';
                echo $city;
                echo '<br>';
                echo $phone;
                echo '<br>';
                echo $mail;
                echo '<br>';
                echo $webb;
                echo '<br>';
                echo $facebook;
                echo '<br>';
                echo $instagram;
                echo '<br>';
                ?>
            </section>
            <section class="col-xs-12 col-md-8">
                <?php
                $args = array(
                'type'         => 'map',
                'width'        => '100%', // Map width, default is 640px. Can be '%' or 'px'
                'height'       => '480px', // Map height, default is 480px. Can be '%' or 'px'
                'zoom'         => 14,  // Map zoom, default is the value set in admin, and if it's omitted - 14
                'marker'       => true, // Display marker? Default is 'true',
                'marker_title' => '', // Marker title when hover
                'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', // Info window content, can be anything. HTML allowed.
                );
                echo rwmb_meta( 'map', $args ); // For current post
                //echo rwmb_meta( 'map', $args, $post_id ); // For another post with $post_id
                ?>
            </section>
        </div>
    </div>
     
<?php
//get_sidebar();
get_footer();