<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Naturens_Basta
 */

get_header(); ?>

	<section id="primary" class="row content-area">
        <aside class="col-xs-12 col-sm-3 col-sm-push-9">
            <h3>Sidebar</h3>
        </aside>
		<main id="main" class="site-main col-xs-12 col-sm-9 col-sm-pull-3" role="main">
            <h2>search.php</h2>
		<?php
        $my_count=1;
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'naturens-basta' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                $images = rwmb_meta( 'products_product-image', 'size=YOURSIZE' );
                if ( !empty( $images ) ) {
                    foreach ( $images as $image ) {
                        //$showimage = "<img src='{$image['url']}' width='100%' height='auto' alt='{$image['alt']}' />";
                        $showimage = "<img src='{$image['url']}' alt='{$image['alt']}' />";
                    }
                }
                ?>
                <div class="row search-result">
                    <div class="col-xs-12 col-sm-7 search-result-img">
                        <?php echo $showimage; ?>
                    </div>
                    <div class="col-xs-12 col-sm-5 search-result-content">
                        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                        <?php echo rwmb_meta( 'products_description' ); ?>
                        
                            
                        
                    </div>
                    <a class="readmore" href="<?php the_permalink(); ?>"><h1>&rarr;</h1></a>
                </div>
                <?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' );
                if(($my_count%3)==0):?>
                <div class="banner">
                    <h2>Give away a sustainable experience with Nature´s Best giftcard.</h2>
                </div>
                <?php endif;?>
                <?php
                $my_count+=1;
                endwhile;
                //

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
            
		</main><!-- #main -->
        
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();