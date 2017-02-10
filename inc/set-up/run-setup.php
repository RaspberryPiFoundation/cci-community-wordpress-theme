<?php

require get_template_directory() . '/inc/set-up/required-pages-setup.php';

add_action('init','create_all_pages');

require get_template_directory() . '/inc/set-up/menu-setup.php';

//add_filter('wp_nav_menu_items', 'add_find_club_menu_link', 10, 2);
add_filter('wp_nav_menu_items', 'add_sign_in_menu_link', 10, 2);
