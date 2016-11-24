<?php

$code_clubs = null;

if (empty( $_POST['body_text'] ) && !empty($_POST['address'])) {
  $url = GOOGLE_MAPS_ADDRESS_END_POINT . preg_replace('/\s+/', '+', $_POST['address']);

  $response = wp_remote_get($url);

  if (is_wp_error($response)) {

    echo "Could not resolve the address";

  } else {
    $geocode_data =  json_decode(wp_remote_retrieve_body($response), true);
    $location = $geocode_data['results']['0']['geometry']['location'];
    $ccw_api = new CCW_API();
    $ccw_api_response = $ccw_api->getNearbyCodeClubs($location['lat'], $location['lng'], 1);

    if (!is_wp_error($ccw_api_response)) {
      $code_clubs = json_decode(wp_remote_retrieve_body($ccw_api_response), true);
    } else {
      echo "No code clubs found";
      echo $ccw_api_response->get_error_message();
    }

  }

}

?>


<form class="c-col c-col--12" id="find-hosts" action="#" method="POST">

  <!-- anti-spam field start -->
  <div style="display: none;">
    <!-- the field name is purposefully *not* something obvious, such as "honeypot" -->
    <label for="body_text">Keep this field blank</label>
    <input type="text" name="body_text" id="body_text" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
  </div>
  <!-- anti-spam field end -->

  <div class="c-col c-col--8">
    <input class="c-form__input" type="text" name="address" id="address" placeholder="Enter your address"/>
  </div>

  <div class="c-col c-col--2">
    <button class="c-button c-button--green" type="submit" form="find-hosts">
      Find
    </button>
  </div>

</form>



<?php if (isset($code_clubs)): ?>
  <?php foreach ($code_clubs as $code_club): ?>
    <div class="c-card c-col c-col--4">
      <div class="c-card__body">
        <h4><?php echo $code_club['name']; ?></h4>
        <p class="c-meta">
          <?php echo $code_club['address']['address_1'] . ' ' .
            $code_club['address']['address_2'] . ' ' .
            $code_club['address']['city'] . ' ' .
            $code_club['address']['postcode']; ?>
        </p>

        <?php if (!empty($code_club['phone'])): ?>
          <span><?php echo $code_club['phone']; ?> </span>
        <?php endif; ?>
        <?php if (!empty($code_club['url'])): ?>
          <p>
            <a href="<?php echo $code_club['url']; ?>">Website</a>
          </p>
        <?php endif; ?>
<!--        <a href="#" class="c-button c-button--hollow c-button--green">Contact Volunteer</a>-->
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

