<nav class="o-nav-stacked">
  <?php
  if (has_nav_menu('club_navigation_menu')) :
    wp_nav_menu([
      'theme_location' => 'club_navigation_menu',
      'menu_class' => 'o-nav-stacked__list',
      'container' => false
    ]);
  endif;
  ?>
</nav>
