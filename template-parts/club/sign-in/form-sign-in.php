<form
  accept-charset="UTF-8"
  id="sign-in"
  class="c-form"
  method="POST" >

  <?php

    $error_messages = array();
    $session = new Club_Session();

    $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared/');

    if ($session->sessionExist()) {
      wp_safe_redirect('/account');
      exit;
    }

    if(!$session->sessionExist() && empty($_POST['body_text']) && !empty($_POST['username'])) {
        $sign_in_json = json_encode($_POST);
        $ccw_api       = new CCW_API();
        $response      = $ccw_api->signIn($sign_in_json);

        $error_messages = react_to_response($response, 200, function ($response) {
          $_POST = array();
          $club = json_decode( wp_remote_retrieve_body($response), true );
          $session = new Club_Session();
          $session->newSession($club);
          $flash_messages = Flash_Message::Singleton();
          $flash_messages->createSuccess(__("Sign in successful", 'ccw_countries'));
          wp_safe_redirect('/account');
          exit;
        });
    }

  ?>

  <?php if( get_field('info') ): ?>
    <div class="c--info" role="alert">
      <span class="c-icon c-icon--small c-icon--info-fill c-icon--blue"></span>
      <?php the_field('info'); ?>
    </div>
  <?php endif; ?>

  <?php echo $templates->render('keep-blank-field') ?>

  <?php echo $templates->render('input',
    ['title' => __('Username', 'ccw_countries'),
      'error' => use_if_set($error_messages, ['username']),
      'attributes' => [
        'id' => 'username',
        'type' => 'text',
        'required' => ''
      ]
    ])
  ?>

  <?php echo $templates->render('input',
    ['title' => __('Password', 'ccw_countries'),
      'error' => use_if_set($error_messages, ['password']),
      'attributes' => [
        'id' => 'password',
        'type' => 'password',
        'required' => ''
      ]
    ])
  ?>

  <?php echo $templates->render('submit-button',
    [
      'attributes' => [
        'id' => 'sign-in-submit',
        'form' => 'sign-in',
        'value' => 'Sign In'
      ]
    ])
  ?>

  <p class="u-text--center">
    <a href="forgotten-sign-in-details"><?php esc_html_e("I forgot my Club ID or Password!", 'ccw_countries'); ?></a>
  </p>
  <p class="u-text--center">
    <a href="/register/"><?php esc_html_e("I want to register!", 'ccw_countries'); ?></a>
  </p>

</form>
