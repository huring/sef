<?php
/**
 * The template for displaying all archive posts and attachments for Company
 */

$args = array(
    'posts_per_page'    => '-1',
    'post_type'         => 'company'
);

$nbsCompany = new WP_Query( $args );

while ( $nbsCompany->have_posts() ) : $nbsCompany->the_post();
    ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <?php endwhile;

wp_reset_postdata();