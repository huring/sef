<?php
/**
 * The template for displaying the front page.
 */
get_header(); ?>
        
        
    <main id="main" class="site-main" role="main">
        <h2>front-page.php</h2>
        
        <?php include('tpl-form.php'); ?>
        <?php include('product-search-results.php'); ?>
        
        <?php
        
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

        endwhile; // End of the loop.
        ?>
        
        <?php //$loop = new WP_Query( array( 'post_type' => 'produkt', 'posts_per_page' => 10, 'meta_key' => 'products_default-post', 'meta_value' => '1' ) ); ?>
        <?php $loop = new WP_Query( array( 'post_type' => 'produkt', 'tax_query' => array( array( 'taxonomy' => 'omrade', 'field' => 'slug', 'terms' => 'norr' ) ) ) ); ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php the_title( '<li class="entry-title">', '' ); // vad som visas av produkten ?>

        <?php endwhile; ?>
        
    </main><!-- #main -->
        
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();