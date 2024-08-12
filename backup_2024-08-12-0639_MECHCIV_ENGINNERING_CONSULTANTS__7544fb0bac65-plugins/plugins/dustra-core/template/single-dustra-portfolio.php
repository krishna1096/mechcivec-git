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
<!-- Start Portfolio Details 
============================================= -->
<div class="project-details-area default-padding">
    <div class="container">
        <div class="row">
            <?php
                if (have_posts()) {
                    while ( have_posts() ) : the_post();
                        get_template_part('template-parts/portfolio', 'content');
                    endwhile; // End of the loop.
                }
            ?>
        </div>
    </div>
</div>
<!-- End Portfolio Details -->
<?php get_footer( );