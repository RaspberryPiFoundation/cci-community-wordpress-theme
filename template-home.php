<?php
/**
 * Template Name: Home
 *
 * @package CCW_Countries
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <?php get_template_part('template-parts/page', 'header'); ?>

    <div class="c-page-block">
        <div class="c-grid c-grid--h-center">
            <div class="c-col--8">
            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>
            </div>
        </div>
    </div>

<?php
get_footer();
