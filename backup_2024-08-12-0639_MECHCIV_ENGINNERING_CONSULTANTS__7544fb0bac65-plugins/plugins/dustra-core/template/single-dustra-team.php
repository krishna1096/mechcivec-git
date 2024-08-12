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
    <!-- Start Team Single Area
    ============================================= -->
    <div class="team-single-area default-padding">
        <div class="container">
            <?php
                if (have_posts()) {
                    while ( have_posts() ) : the_post();
                        get_template_part('template-parts/team', 'content');
                    endwhile; // End of the loop.
                }
            ?>
        </div>
    </div>
    <!-- End Team Single Area -->
<?php get_footer( );