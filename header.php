<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCW_Countries
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="o-banner" role="banner">
  <div class="o-banner__inner">
    <figure class="c-logo">
      <a href="<?= esc_url(home_url('/')); ?>" class="c-logo__link">
        <img alt="" class="c-logo__image" src="<?php echo get_template_directory_uri(); ?>/bower_components/code-club/dist/images/code-club-logo.svg">
        <figcaption class="c-logo__appendix"><?php bloginfo('name'); ?></figcaption>
      </a>
    </figure>

    <nav class="o-nav" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'o-nav__list'
        ]);
      endif;
      ?>
    </nav>
  </div>
</header>

<div class="wrap container" role="document">
