<?php

  $code_club = null;

  $host_volunteer_matching = new Host_Volunteer_Matching();
  $code_club = $host_volunteer_matching->getCodeClub($_GET['club_id']);


?>

<div class="c-page-block">
  <h1 class="u-text--center">Contact Club Host</h1>
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
          Below is a sample of the email we’ll send to the Club Host on your behalf, to let them know
          that you're interested in volunteering.
        </p>

        <form class="c-form" id="contact" action="#" method="POST">

          <label class="c-form__label" for="name">Your Name</label>
          <input class="c-form__input" type="text" id="name">

          <label class="c-form__label" for="email">Your Email</label>
          <input class="c-form__input" type="email" id="email">

          <label class="c-form__label" for="message_body">Message</label>
          <textarea class="c-form__textarea" cols="30" id="message_body" name="message_body" required="required" rows="10">
Hi,

I see you're looking for a Code Club volunteer!
Well great news, I’d like to offer to run a Code Club for you at your school!
It would be great if I could come into your school and discuss this with you.
          </textarea>

          </p>

          <p class="u-text--center">
            <button class="c-button c-button--green" data-disable-with="Please wait..." type="submit">Send Message</button>

          </p>
        </form>

      </div>
  </div>
</div>