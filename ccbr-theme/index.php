<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CCW_Countries
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

	<?php wp_enqueue_script( 'maker scripts', get_template_directory_uri() . '/js/marker-clusterer.js' ); ?>
	<?php wp_enqueue_script( 'parsley scripts', get_template_directory_uri() . '/js/parsley.js' ); ?>
	<?php wp_enqueue_script( 'app maps scripts', get_template_directory_uri() . '/js/maps.js' ); ?>

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 300px;
      }
    </style>

    <div id="map"></div>

<?php
get_footer();	
