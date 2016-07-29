<?php
/**
 * Utility functions
 */
function get_nav_menu_by_location( $location ) {
    $locations = get_nav_menu_locations();
    $menu_id = $locations[ $location ] ;
    return wp_get_nav_menu_object( $menu_id );
}

function nav_menu_name_by_location( $location ) {
    $nav_menu = get_nav_menu_by_location( $location );
    echo $nav_menu->name;
}

function get_codeclub_asset_uri() {
    return esc_url( get_template_directory_uri() ) . "/bower_components/code-club/dist";
}
