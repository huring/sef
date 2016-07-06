<?php
/**
 * The template for displaying company single product.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Naturens_Basta
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
            the_post_thumbnail();
			//the_post_navigation();
            the_meta();
            
            get_post_meta( get_the_ID() );
            
            $meta = get_post_meta( get_the_ID() );
            foreach( $meta as $key=>$val ) {

                echo $key . ' : ' . $val[0] . '<br>';
            }
            

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
$job_fetch_meta = get_post_meta( get_the_ID() );
var_dump( $job_fetch_meta );
echo '<br />';

//get_sidebar();
get_footer();