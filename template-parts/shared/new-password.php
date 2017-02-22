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
        $flash_messages->createSuccess(__("New password was successfully set", 'ccw_countries'));
        if ($session->sessionExist()) {
          wp_safe_redirect('/account/');
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
      ['title' => __('Current password', 'ccw_countries'),
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
    ['title' => __('New password', 'ccw_countries'),
      'error' => use_if_set($error_messages, ['password']),
      'attributes' => [
        'id' => 'password',
        'type' => 'password',
        'required' => '',
      ]
    ])
  ?>

  <?php echo $templates->render('input',
    ['title' => __('New password confirmation', 'ccw_countries'),
      'error' => use_if_set($error_messages, ['password_confirmation']),
      'attributes' => [
        'id' => 'password_confirmation',
        'type' => 'password',
        'required' => '',
      ]
    ])
  ?>

  </fieldset>

  <?php echo $templates->render('submit-button',
    [
      'attributes' => [
        'id' => 'new-password-submit',
        'form' => 'new-password',
        'value' => __('Set New Password', 'ccw_countries')
      ]
    ]);
  ?>

</form>