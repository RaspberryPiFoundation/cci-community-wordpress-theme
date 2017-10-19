<form class="c-form"
      id="forgotten-password"
      method="POST">

  <?php
    // The form uses a honeypot field called "body_text", purposefully named so as to not be obvious to spam bots

    $templates = new League\Plates\Engine(get_template_directory() . '/template-parts/shared');
    $error_message = '';
    $error_messages = array();

    if (empty($_POST['body_text']) && !empty($_POST['email_address'])) {

      $email_address = $_POST['email_address'];
      $ccw_api       = new CCW_API();
      $response      = $ccw_api->forgotSignInDetails($email_address);

      $error_messages = react_to_response($response, 200, function () {
        $_POST = array();
        $flash_message = new Flash_Message();
        $flash_message->createSuccess(__("Please check your inbox for password reset instructions.", 'ccw_countries'));
        wp_safe_redirect('/sign-in/');
      });

    }
  ?>

  <?php echo $templates->render('keep-blank-field') ?>

  <?php echo $templates->render('input',
    ['title' => __('Email', 'ccw_countries'),
      'error' => use_if_set($error_messages, ['contact.email']),
      'attributes' => [
        'id' => 'email_address',
        'type' => 'email',
        'placeholder' => 'example@domain.com',
        'required' => ''
      ]
    ])
  ?>

  <?php echo $templates->render('submit-button',
    [
      'attributes' => [
        'id' => 'forgotten-password-submit',
        'form' => 'forgotten-password',
        'value' => 'Continue'
      ]
    ])
  ?>

  <p class="u-text--center">
    <a href="/sign-in"><?php esc_html_e("No wait I remembered my Club ID and Password!", 'ccw_countries') ?></a>
  </p>

</form>
