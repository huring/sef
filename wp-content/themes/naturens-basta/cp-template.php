<?php

/*
Template Name: Custom Posts Companies
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post('company'); ?>
    
    <div class="wrapper">
        
        <div class="container">
        <div class="row">
            
            <div class="navigation-column col-xs-12 col-sm-3">
                <h2 class="title"><?php //the_title(); ?></h2>
                <nav class="left-nav">
                <?php
                $args = array(
                    'theme_location' => 'about'
                );
                ?>
                <?php wp_nav_menu( $args ); ?>
                </nav>   
            </div><!-- /navigation-column -->
            
            <article class="content-column col-xs-12 col-sm-9">
                <h2 class="title"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article><!-- /content-column -->
            
        </div><!-- /row -->
        </div><!-- /container -->
    
    <?php endwhile;

    else : 
        echo '<p>Inget innehåll hittades</p>';

    endif;
    ?>
    </div><!-- /wrapper -->


<?php
get_footer();

?>