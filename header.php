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

<header class="o-nav">
    <div class="o-nav__container">
        <div class="c-logo">
            <a href="<?= esc_url(home_url('/')); ?>" class="c-logo__link">
                <img alt="Code Club Logo" class="c-logo__image" src="<?php echo get_template_directory_uri(); ?>/bower_components/code-club/dist/images/code-club-logo.svg">
                <div class="c-logo__appendix"><?php bloginfo('name'); ?></div>
            </a>
        </div>

        <input class="o-nav__toggle-input" id="off-canvas-nav-toggle-input" type="checkbox">
        <label class="o-nav__toggle-label" for="off-canvas-nav-toggle-input"><span></span></label>

        <nav class="o-nav__list-container">
        <?php
        if (has_nav_menu('primary_navigation')) :
            wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'o-nav__list',
                'container' => false
            ]);
        endif;
        ?>
        </nav>
    </div>
</header>

<main class="main">

    <div class="o-hero">
        <div class="o-hero__body">
            <h1 class="o-hero__title"><?php #the_field('page_title'); ?></h1>
            <?php #if ( get_field('page_intro') ): ?>
            <p class="o-hero__subtitle c-lede"><?php #the_field('page_intro'); ?></p>
            <?php #endif; ?>
        </div>
    </div>
