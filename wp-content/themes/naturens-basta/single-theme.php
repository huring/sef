<?php
/**
 * The template for displaying all single posts and attachments for Theme
 */

get_header(); 

while ( have_posts() ) : the_post();              
                
$content = get_post_meta( get_the_ID(), 'nbs-content', true );
$address = get_post_meta( get_the_ID(), 'mail', true );
$postnr = get_post_meta( get_the_ID(), 'postnr', true );
$city = get_post_meta( get_the_ID(), 'city', true );
$phone = get_post_meta( get_the_ID(), 'phone', true );
$latitude = get_post_meta( get_the_ID(), 'latitude', true );
$longitude = get_post_meta( get_the_ID(), 'longtude', true );
$mail = get_post_meta( get_the_ID(), 'mail', true );
$webb = get_post_meta( get_the_ID(), 'webb', true );
$facebook = get_post_meta( get_the_ID(), 'facebook', true );
$instagram = get_post_meta( get_the_ID(), 'instagram', true );

endwhile;
            
$companyOutput = '<label>Webbplats: </label><a href="' . $webb . '">' . $webb . '</a><br>';
$companyOutput .= $mail;
            
?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
           
            <?php the_title( '<h2>', '</h2>' ); ?>
            <?php the_post_thumbnail(); ?><br>
            <br>
            <?php echo $companyOutput; ?>
            
        </main>
    </div>
     
<?php
//get_sidebar();
//get_footer();