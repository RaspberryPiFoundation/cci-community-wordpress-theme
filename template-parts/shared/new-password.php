<form class="c-form"
      id="new-password"
      method="POST">
  <fieldset class="c-form__fieldset">


  <?php
    $error_messages = array();
    $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');

    if (!isset($id)) $id = 'change_password';

    if (!isset($ask_for_current_password)) $ask_for_current_password = false;

    if (empty($_POST['body_text']) && !empty($_POST['password'])) {
      $ccw_api = new CCW_API();
      $response
        = $ccw_api->newPassword($_POST['token'],
        isset($username) ? $username : null,
        use_if_set($_POST, ['current_password']),
        $_POST['password'],
        $_POST['password_confirmation']);


      $error_messages = react_to_response($response, 200, function ($response) {
        $_POST = array();
        $club = json_decode( wp_remote_retrieve_body($response), true );
        $session = new Club_Session();
        if (isset($club['auth_token'])) {
          $session->newSession($club);
        }
        $flash_messages = Flash_Message::Singleton();
        $flash_messages->createSuccess(esc_html_e("New password was successfully set"));
        if ($session->sessionExist()) {
          wp_safe_redirect('/club/');
          exit;
        }
        wp_safe_redirect('/sign-in/');
        exit;
      });

    }

  ?>

  <?php echo $templates->render('keep-blank-field') ?>

  <?php echo $templates->render('input',
                                ['attributes' => [
                                  'id' => 'token',
                                  'type' => 'hidden',
                                  'value' => $token
                                  ]
                                ]);
  ?>

  <?php if ($ask_for_current_password) {
    echo $templates->render('input',
      ['title' => 'Current password',
        'error' => use_if_set($error_messages, ['current-password']),
        'attributes' => [
          'id' => 'current_password',
          'type' => 'password',
          'required' => ''
        ]
      ]);
    }
  ?>

  <?php echo $templates->render('input',
    ['title' => 'New password',
      'error' => use_if_set($error_messages, ['password']),
      'attributes' => [
        'id' => 'password',
        'type' => 'password',
        'required' => '',
        'data-parsley-minlength-message' => esc_html_e('Password is too short. It should be 8 characters or more.'),
        'data-parsley-minlength' => '8'
      ]
    ])
  ?>

  <?php echo $templates->render('input',
    ['title' => 'New password confirmation',
      'error' => use_if_set($error_messages, ['password_confirmation']),
      'attributes' => [
        'id' => 'password_confirmation',
        'type' => 'password',
        'required' => '',
        'data-parsley-equalto-message' => esc_html_e('Password confirmation does not match the password set above'),
        'data-parsley-equalto' => '#password'
      ]
    ])
  ?>

  </fieldset>

  <?php echo $templates->render('submit-button',
    [
      'attributes' => [
        'id' => 'new-password-submit',
        'form' => 'new-password',
        'value' => esc_html_e('Set New Password')
      ]
    ]);
  ?>

</form>