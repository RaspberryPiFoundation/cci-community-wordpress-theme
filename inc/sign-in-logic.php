<?php

function add_sign_in_menu_link($items, $args) {
  if ($args->theme_location == 'primary_navigation') {
    $session = new Club_Session();
    if ($session->sessionExist()) {
      $items .= '<li class="o-nav__item"><a href="/club" class="o-nav__link">'. __("Your Club") .'</a></li>';
      $items .= '<li class="o-nav__item"><a href="?sign-out=true" class="o-nav__link">'. __("Sign Out") .'</a></li>';
    } else {
      $items .= '<li class="o-nav__item"><a href="/sign-in" class="o-nav__link">'. __("Sign In") .'</a></li>';
    }
  }
  return $items;
}

function sign_out() {
  $session = new Club_Session();
  $session->destroySession();
  header('Location: '. '/sign-in');
}

if (isset($_GET['sign-out'])) {
  sign_out();
}


class Club_Session {

  public function sessionExist() {
    return isset($_SESSION['club']);
  }

  public function newSession($club) {
    session_start();
    $_SESSION['auth_token'] = $club['auth_token'];
    $_SESSION['club'] = $club;
    return true;
  }

  public function destroySession() {
    $username   = $_SESSION['club']['username'];
    $ccw_api    = new CCW_API();
    $response   = $ccw_api->signOut($username);

    if (!is_wp_error($response)) {
      if (204 == wp_remote_retrieve_response_code($response)) {
        unset($_SESSION['club']);
        $flash_message = Flash_Message::Singleton();
        $flash_message->createSuccess(esc_html_e("Signed out successfully!"));
        wp_safe_redirect('/sign-in');
        exit;
      } else {
        wp_safe_redirect('/club');
        exit;
      }
    }
  }

  public function redirectIfNoSession() {
    if ($this->sessionExist()) return;

    $flash_messages = Flash_Message::Singleton();
    $flash_messages->createError(esc_html_e("You have to be signed in to view this page."));
    wp_safe_redirect('/sign-in');
    exit;
  }



}
