<?php

  $is_token_valid = false;
  $auth_token = use_if_set($_GET, ['auth_token']);
  $has_token = isset($auth_token);
  $flash_messages = Flash_Message::Singleton();

  if ($has_token) {
    // do API call to check if valid token

    $ccw_api   = new CCW_API();
    $token_response  = $ccw_api->checkFirstPasswordToken($auth_token);

    $is_token_valid = !is_wp_error($token_response) && wp_remote_retrieve_response_code($token_response) == 200;
    echo wp_remote_retrieve_body($token_response);
  }


  if (!$has_token || !$is_token_valid ) {
    $flash_messages->createError(__("Invalid Auth token. Please request another password.", 'ccw_countries'));
    wp_safe_redirect('/sign-in/forgotten-sign-in-details');
    exit;
  }

  $username = use_if_set($_GET, ['username'], '', 'htmlspecialchars');

  $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');
  echo $templates->render('new-password',
                            [ 'token' => $auth_token,
                              'username' =>  $username]);


?>
