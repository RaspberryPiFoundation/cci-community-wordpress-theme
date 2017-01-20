<?php
  // The form uses a honeypot field called "body_text", purposefully named so as to not be obvious to spam bots

  $is_token_valid = false;
  $reset_password_token = use_if_set($_GET, ['reset_password_token']);
  $has_token = isset($reset_password_token);
  $flash_messages = Flash_Message::Singleton();

  if ($has_token) {
    // do API call to check if valid token

    $ccw_api   = new CCW_API();
    $token_response  = $ccw_api->checkResetPasswordToken($reset_password_token);

    $is_token_valid = !is_wp_error($token_response) && wp_remote_retrieve_response_code($token_response) == 200;

  }

  if (!$has_token || !$is_token_valid ) {
    $flash_messages->createError(__("Invalid Auth token. Please request another password."));
    wp_safe_redirect('/sign-in/forgotten-sign-in-details');
    exit;
  }

  $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');
  echo $templates->render('new-password',
                            ['token' => $reset_password_token]);
?>
