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

<div class="c-page-block">
  <h1 class="u-text--center">Find Club</h1>
  <div class="c-grid c-grid--h-center">
    <div class="c-col c-col--6">
      <p>Let's find a Club near you.</p>
      <form  id="find-hosts" action="#" method="POST">
        <!-- anti-spam field start -->
        <div style="display: none;">
          <!-- the field name is purposefully *not* something obvious, such as "honeypot" -->
          <label for="body_text">Keep this field blank</label>
          <input type="text" name="body_text" id="body_text">
        </div>
        <!-- anti-spam field end -->
        <label class="c-form__label" for="address">Address</label>
        <input class="c-form__input u-margin--none" type="text" name="address" id="address"
                value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>"/>
        <p class="u-text--center u-margin-top--base">
          <button class="c-button c-button--green" type="submit" form="find-hosts">
            Search
          </button>
        </p>
      </form>
    </div>
  </div>
</div>


<?php if (isset($code_clubs)): ?>
  <div class="c-page-block c-page-block--alt-block">
    <h2 class="u-text--center">Search results: <?php echo sizeof($code_clubs);?></h2>
    <div class="c-grid c-grid--h-center">
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
          </div>
          <div class="c-card__footer">
            <a class="c-card__link" href="#">
              Contact Club Host
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

