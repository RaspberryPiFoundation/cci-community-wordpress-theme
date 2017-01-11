<?php
/**
 * Template Name: Welcome
 */

get_header(); ?>

<div class="c-page-block">
  <h1 class="u-text--center">Welcome, <?php echo $_GET['username']; ?>!</h1>
  <p class="u-text--center c-lede">
    <?php the_field('page_intro'); ?>
  </p>

  <div class="c-grid c-grid--h-center">
    <div class="c-col c-col--6">
      <div class="c-content-panel">
        <?php
        $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');
        echo $templates->render('info', ['message' => 'Your username is <span class="u-color--yellow">'
          . $_GET['username'] . '</span>. You will need this and your password to log in to access your club details.']);
        ?>
        <?php get_template_part('template-parts/club/sign-in/form', 'first-password'); ?>
      </div>
    </div>
  </div>
</div>

<div class="c-page-block c-page-block--alt-block">
  <div class="c-grid">
    <div class="c-col c-col--6 u-text--center">
      <p>Having issues setting a new password? Email <a href="mailto:hello@codeclubworld.org">hello@codeclubworld.org</a></p>
    </div>
  </div>
</div>

