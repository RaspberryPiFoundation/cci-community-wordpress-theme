<?php

  $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');

  $club_session = new Club_Session();
  $club_session->redirectIfNoSession();

  echo $templates->render('new-password',
                           [ 'username' => $_SESSION['club']['username'],
                             'ask_for_current_password' => true,
                             'token' => $_SESSION['auth_token'] ]);
?>
