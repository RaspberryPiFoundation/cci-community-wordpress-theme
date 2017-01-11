<?php
/**
 * Template Name: Register
 */

get_header(); ?>

<div class="c-page-block">
  <h1 class="u-text--center"><?php the_field('page_title'); ?></h1>

  <div class="c-grid c-grid--h-center">
    <div class="c-col c-col--8">
      <div class="c-content-panel">
        <?php get_template_part('template-parts/club/form', 'register-club'); ?>
      </div>
    </div>
  </div>
</div>

