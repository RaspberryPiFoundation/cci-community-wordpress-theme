<?php

create_all_pages();

function create_all_pages() {
  $pages = array(
    array(
      'name' => 'Sign In',
      'title' => 'Sign In',
      'template' => 'template-sign-in.php',
      'child' => array(
        array(
          'name' => 'Forgotten Sign In Details',
          'title' => 'Forgotten Sign In Details',
          'template' => 'template-forgotten-sign-in-details.php',
        )
      )
    ),
    array(
      'name' => 'Register',
      'title' => 'Register',
      'template' => 'template-register.php',
      'child' => array(
        array(
          'name' => 'Thank you',
          'title' => 'Thank you',
          'template' => 'template-thank-you-for-registering.php',
        )
      )
    ),
    array(
      'name' => 'Reset Password',
      'title' => 'Reset Password',
      'template' => 'template-reset-password.php',
    ),
    array(
      'name' => 'Club',
      'title' => 'Club',
      'template' => 'template-club.php',
      'child' => array(
        array(
          'name' => 'Club Edit',
          'title' => 'Club Edit',
          'template' => 'template-club-edit.php'
        ),
        array(
          'name' => 'Change Password',
          'title' => 'Change Password',
          'template' => 'template-change-password.php'
        ),
        array(
          'name' => 'Download Resources',
          'title' => 'Download Resources',
          'template' => 'template-download-resources.php'
        )
      )
    ),
    array(
      'name' => 'Find Club',
      'title' => 'Find Club',
      'template' => 'template-find-club.php',
      'child' => array(
        array(
          'name' => 'Contact Club',
          'title' => 'Contact Club',
          'template' => 'template-contact.php'
        ),
      )
    ),
  );

  $template = array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'post_author' => 1
  );

  foreach( $pages as $page ) {
    $exists = get_page_by_title( $page['name'] );

    if( !$exists ) {
      $my_page = array(
        'post_name' => $page['name'],
        'post_title' => $page['title'],
        'page_template' => $page['template']
      );
      $my_page = array_merge( $my_page, $template );

      $id = wp_insert_post( $my_page );

      if( isset( $page['child'] ) ) {
        foreach( $page['child'] as $child ) {
          $child_page = array(
            'post_name' => $child['name'],
            'post_title' => $child['title'],
            'page_template' => $child['template'],
            'post_parent' => $id
          );
          $child_page = array_merge( $child_page, $template );
          $id = wp_insert_post( $child_page );
        }
      }
    }
  }
}

function create_sign_in_page() {
  if (get_page_by_title('Sign In') == NULL) {
    $createPage = array(
      'page_template' => 'Sign In',
      'post_title'    => 'Sign In',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Sign In'
    );

    wp_insert_post($createPage);
  }
}

function create_register_page() {
  if (get_page_by_title('Register') == NULL) {
    $createPage = array(
      'page_template' => 'Register',
      'post_title'    => 'Register',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Register'
    );

    wp_insert_post($createPage);
  }
}


function create_forgotten_sign_in_details_page() {
  if (get_page_by_title('Forgotten Sign In Details') == NULL) {
    $createPage = array(
      'page_template' => 'template-forgotten-sign-in-details.php',
      'post_title'    => 'Forgotten Sign In Details',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Forgotten Sign In Details'
    );

    wp_insert_post($createPage);
  }
}


function create_set_new_password_page() {
  if (get_page_by_title('Set New Password') == NULL) {
    $createPage = array(
      'page_template' => 'template-set-new-password.php',
      'post_title'    => 'Set New Password',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Set New Password'
    );

    wp_insert_post($createPage);
  }
}


function change_password_page() {
  if (get_page_by_title('Change Password') == NULL) {
    $createPage = array(
      'page_template' => 'template-change-password.php',
      'post_title'    => 'Change Password',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Change Password'
    );

    wp_insert_post($createPage);
  }
}


function create_change_password_page() {
  if (get_page_by_title('Change Password') == NULL) {
    $createPage = array(
      'page_template' => 'template-change-password.php',
      'post_title'    => 'Change Password',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Change Password'
    );

    wp_insert_post($createPage);
  }
}

function create_welcome_page() {
  if (get_page_by_title('Welcome') == NULL) {
    $createPage = array(
      'page_template' => 'template-welcome.php',
      'post_title'    => 'Welcome',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Welcome'
    );

    wp_insert_post($createPage);
  }
}


function create_thank_you_for_registering_page() {
  if (get_page_by_title('Thank you for Registering') == NULL) {
    $createPage = array(
      'page_template' => 'template-thank-you-for-registering.php',
      'post_title'    => 'Thank you for Registering',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Thank you for Registering'
    );

    wp_insert_post($createPage);
  }
}


function create_club_page() {
  if (get_page_by_title('Club') == NULL) {
    $createPage = array(
      'page_template' => 'template-club.php',
      'post_title'    => 'Club',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Club'
    );

    wp_insert_post($createPage);
  }
}


function create_download_resources_page() {
  if (defined(RESOURCES_FILE_URL) && get_page_by_title('Download Resources') == NULL) {
    $createPage = array(
      'page_template' => 'template-download-resources.php',
      'post_title'    => 'Download Resources',
      'post_status'   => 'publish',
      'post_author'   =>  1,
      'post_type'     => 'page',
      'post_name'     => 'Download Resources'
    );

    wp_insert_post($createPage);
  }
}


function create_pages() {
  create_sign_in_page();
  create_register_page();
  create_forgotten_sign_in_details_page();
  create_set_new_password_page();
  create_thank_you_for_registering_page();
  create_club_page();
  create_change_password_page();
  create_welcome_page();
  create_download_resources_page();
}
