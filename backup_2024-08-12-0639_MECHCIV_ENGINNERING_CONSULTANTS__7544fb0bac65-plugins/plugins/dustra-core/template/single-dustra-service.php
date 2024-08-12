<?php
/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dustra
 */

get_header();
dustra_breadcumb(); 
?>
<!-- Star Services Details Area
    ============================================= -->
    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">
                    <?php if(is_active_sidebar('service-sidebar')):?>
                        <div class="col-lg-4 services-sidebar order-last order-lg-first">
                            <?php dynamic_sidebar('service-sidebar')?>
                        </div>    
                    <?php endif;?>
                    <?php
                        if (have_posts()) {
                            while ( have_posts() ) : the_post();
                                get_template_part('template-parts/service', 'content');
                            endwhile; 
                        }
                    ?>    
                </div>
            </div>
        </div>
    </div>
<!-- End Services Details -->
<?php get_footer( );