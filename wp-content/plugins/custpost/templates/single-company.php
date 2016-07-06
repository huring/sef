<?php
/**
 * The template for displaying all single posts and attachments for Company
 */

get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
            <?php
            while ( have_posts() ) : the_post();
            
                //get_temlate_part( 'template-parts/content', get_post_format() );
                the_post_thumbnail();
                get_post_meta( get_the_ID() );
            
            
            endwhile;
            ?>
        </main>
    </div>