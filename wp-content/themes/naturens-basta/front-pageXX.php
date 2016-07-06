<?php
/**
 * The template for displaying the front page.
 */
get_header(); ?>
        
    <div class="search-filter">
        <form role="search" method="post" class="filter-form" action="">
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
            
            <form>
                <div class="col-xs-12 col-md-4 form_text">
                    <input id="text" name="s" type="text" value="" class="form_cell" placeholder="<?php _e( 'Or type something here', 'textdomain' ); ?>" />
                </div>

                <div class="col-xs-12 col-md-2 form_btn_search">
                    <input class="subm_btn" id="searchsubmit" type="submit" value="SEARCH">
                </div>
            </form>
            
            <?php echo getCategoriesx( $tax ); ?>
            <?php //echo getSeason( $tax ); ?>
        </form>
    </div>
        
    <main id="main" class="site-main" role="main">
        <h2>front-page.php</h2>
        <?php /*
        // Standard loop
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

        endwhile; // End of the loop.
        */ ?>

        <?php $loop = new WP_Query( array( 'post_type' => 'produkt', 'posts_per_page' => 10, 'meta_key' => 'products_default-post', 'meta_value' => '1' ) ); ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php the_title( '<li class="entry-title">', '' ); // vad som visas av produkten ?>

        <?php endwhile; ?>

    </main><!-- #main -->
        
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();