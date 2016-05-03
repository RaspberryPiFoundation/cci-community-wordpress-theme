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
	    <div class="c-col--8 u-text--center">
	      <h2>How to create a club</h2>
	      <?php the_field('how_to_create_a_club_text'); ?>
	    </div>
	  </div>
	</div>

	<div class="c-page-block c-page-block--action-block">
	  <div class="c-grid c-grid--h-center">
	    <div class="c-col--8 u-text--center">
	      <h3>Register your Code Club and join the movement</h3>
	      <?php the_field('why_register_text'); ?>
	      <p><a class="c-button c-button--action-button" href="<?php the_field('register_a_club_link'); ?>">Register a Code Club</a></p>
	    </div>
	  </div>
	</div>

	<div class="c-page-block">
	  <div class="c-grid">
	    <div class="c-col c-col--6">
	      <h2>Teaching materials</h2>
	      <?php the_field('teaching_materials_text'); ?>
	      <a class="c-button c-button--hollow c-button--green" href="http://projects.codeclubworld.org/" target="_blank">Visit the Code Club projects</a>
	    </div>
	    <div class="c-col c-col--6">
	      <img width="100%" src="<?php the_field('teaching_materials_image'); ?>" />
	    </div>
	  </div>
	</div>

<?php
get_footer();
