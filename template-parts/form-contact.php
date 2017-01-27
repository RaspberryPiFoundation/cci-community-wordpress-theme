<?php

  $code_club = null;

  $host_volunteer_matching = new Host_Volunteer_Matching();
  $code_club = $host_volunteer_matching->getCodeClub($_GET['club_id']);

  if (!empty($_POST['message_body'])) {

    $message = $_POST['message_body'] . ' Please reply to ' . $_POST['email'];

    wp_mail($code_club['contact']['email'],
            __('Volunteer has contacted you.', 'ccw_wordpress'),
            $message);
  }

?>

<div class="c-page-block">
  <h1 class="u-text--center"><?php esc_html_e('Contact Club Host', 'ccw_wordpress'); ?></h1>
  <div class="c-grid c-grid--h-center">
    <div class="c-col c-col--8">
      <div class="c-content-panel">
        <h2 class="u-text--center">
          <?php echo $code_club['venue']['name']; ?><br>
          <span class="c-meta">
             <?php echo $code_club['venue']['address']['address_1'] . ' ' .
               $code_club['venue']['address']['address_2'] . ' ' .
               $code_club['venue']['address']['city'] . ' ' .
               $code_club['venue']['address']['postcode'];; ?>
          </span>
        </h2>

        <p>
          <?php  ?>
        </p>

        <form class="c-form" id="contact" action="#" method="POST">

          <?php echo $templates->render('input',
            ['title' => __('Your name', 'ccw_countries'),
              'attributes' => [
                'id' => 'name',
                'value' => use_if_set($_POST, ['name'], '', 'htmlspecialchars_with_quotes'),
                'required' => ''
              ]
            ])
          ?>

          <?php echo $templates->render('input',
            ['title' => __('Your email', 'ccw_countries'),
              'attributes' => [
                'id' => 'name',
                'value' => use_if_set($_POST, ['name'], '', 'htmlspecialchars_with_quotes'),
                'required' => ''
              ]
            ])
          ?>

          <label class="c-form__label" for="message_body"><?php esc_html_e('Message', 'ccw_wordress'); ?></label>
          <textarea class="c-form__textarea" cols="30" id="message_body" name="message_body" required="required" rows="10">
          </textarea>

          </p>

          <p class="u-text--center">
            <button class="c-button c-button--green" data-disable-with="Please wait..." type="submit">
              <?php esc_html_e("Send Message", 'ccw_countries'); ?>
            </button>

          </p>
        </form>

      </div>
  </div>
</div>