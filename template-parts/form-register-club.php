<?php
/**
 * Template part for displaying a club registration form & handling POSTs to the CCW API
 *
 * @package CCW_Countries
 */

if ( empty( $_POST['honeypot'] ) && !empty( $_POST['terms-checkbox'] ) ) {

    // set the club name from the venue name
    $_POST['club']['name'] = $_POST['club']['venue_attributes']['name'];
    $json = json_encode( $_POST );

    // POST the form to the CCW API
    $response = wp_remote_post( CCW_API_URL . '/clubs?welcome_email=' . CCW_API_WELCOME_EMAIL, array(
        'timeout' => 30,
        'headers' => array(
            'Content-Type' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . CCW_API_READWRITE_TOKEN,
            'Accept' => 'application/vnd.codeclubworld.v' . CCW_API_VERSION,
        ),
        'body' => $json,
    ));

    if ( !is_wp_error( $response ) ) { // POST response
        if ( 201 == wp_remote_retrieve_response_code( $response ) ) { // successful POST, forward to the 'registration success' page
            $_POST = array();
            wp_safe_redirect( CCW_API_REGISTRATION_SUCCESS_PAGE );
            exit;
        } else { // the API returned an error / errors, display them ?>
            <div class="c-alert c-alert--error">
                <span class="c-icon c-icon--small c-icon--error c-icon--white"></span>
                <ul>
                    <?php
                    $body = json_decode( wp_remote_retrieve_body( $response ) );
                    echo $body->error.":";
                    foreach( $body->errors as $key=>$value ) {
                        echo "<li>".$key." ".$value."</li>";
                    }
                    ?>
                </ul>
            </div>
        <?php
        }
    } else { // the wp_remote_post() function returned an error, display it ?>
        <div class="c-alert c-alert--error">
            <span class="c-icon c-icon--small c-icon--error c-icon--white"></span>
            <?php echo $response->get_error_message(); ?>
        </div>
    <?php
    }
} elseif ( !empty( $_POST['club'] ) ) { // terms and conditions need to be accepted ?>
    <div class="c-alert c-alert--error">
        <span class="c-icon c-icon--small c-icon--error c-icon--white"></span>
        <?php esc_html_e( 'You must accept the terms &amp; conditions', 'ccw_countries' ); ?>
    </div>
<?php
}
?>

<form class="c-form" id="register-club" action="#" method="POST">
    <fieldset class="c-form__fieldset">
    <label class="c-form__label u-text--left" for="club[venue_attributes][name]"><?php esc_html_e( 'Venue name', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][name]" name="club[venue_attributes][name]" type="text" value="<?php echo isset( $_POST['club']['venue_attributes']['name'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['name'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][url]"><?php esc_html_e( 'Venue website', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][url]" name="club[venue_attributes][url]" type="text" value="<?php echo isset( $_POST['club']['venue_attributes']['url'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['url'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][address_attributes][address_1]"><?php esc_html_e( 'Street address 1', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][address_attributes][address_1]" name="club[venue_attributes][address_attributes][address_1]" type="text" value="<?php echo isset( $_POST['club']['venue_attributes']['address_attributes']['address_1'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['address_attributes']['address_1'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][address_attributes][address_2]"><?php esc_html_e( 'Street address 2', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][address_attributes][address_2]" name="club[venue_attributes][address_attributes][address_2]" type="text" value="<?php echo isset( $_POST['club']['venue_attributes']['address_attributes']['address_2'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['address_attributes']['address_2'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][address_attributes][city]"><?php esc_html_e( 'Town/City', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][address_attributes][city]" name="club[venue_attributes][address_attributes][city]" type="text"  value="<?php echo isset( $_POST['club']['venue_attributes']['address_attributes']['city'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['address_attributes']['city'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][address_attributes][region]"><?php esc_html_e( 'Region/State', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][address_attributes][region]" name="club[venue_attributes][address_attributes][region]" type="text"  value="<?php echo isset( $_POST['club']['venue_attributes']['address_attributes']['region'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['address_attributes']['region'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[venue_attributes][address_attributes][postcode]"><?php esc_html_e( 'Postcode/Zipcode', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[venue_attributes][address_attributes][postcode]" name="club[venue_attributes][address_attributes][postcode]" type="text" value="<?php echo isset( $_POST['club']['venue_attributes']['address_attributes']['postcode'] ) ? htmlspecialchars( $_POST['club']['venue_attributes']['address_attributes']['postcode'] ) : ''; ?>">

    <input type="hidden" id="club[venue_attributes][address_attributes][country_code]" name="club[venue_attributes][address_attributes][country_code]" value="<?php echo CCW_API_COUNTRY_CODE; ?>">

    <label class="c-form__label u-text--left" for="club[contact_attributes][skype]"><?php esc_html_e( 'Club Skype username', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[contact_attributes][skype]" name="club[contact_attributes][skype]" type="text" value="<?php echo isset( $_POST['club']['contact_attributes']['skype'] ) ? htmlspecialchars( $_POST['club']['contact_attributes']['skype'] ) : ''; ?>">
    </fieldset>
    <hr>
    <fieldset class="c-form__fieldset">
    <label class="c-form__label u-text--left" for="club[contact_attributes][name]"><?php esc_html_e( 'Your name', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[contact_attributes][name]" name="club[contact_attributes][name]" type="text"  value="<?php echo isset( $_POST['club']['contact_attributes']['name'] ) ? htmlspecialchars( $_POST['club']['contact_attributes']['name'] ) : ''; ?>">

    <label class="c-form__label u-text--left" for="club[contact_attributes][email]"><?php esc_html_e( 'Your email address', 'ccw_countries' ); ?>:</label>
    <input class="c-form__input" id="club[contact_attributes][email]" name="club[contact_attributes][email]" type="text"  value="<?php echo isset( $_POST['club']['contact_attributes']['email'] ) ? htmlspecialchars( $_POST['club']['contact_attributes']['email'] ) : ''; ?>">

    <div class="c-info">
      <div class="c-info__icon">
        <span class="c-icon c-icon--small c-icon--info-fill c-icon--blue"></span>
      </div>
      <div class="c-info__body">
        <?php esc_html_e( 'Your name and email address will never be displayed publicly', 'ccw_countries' ); ?>
      </div>
    </div>

    <div class="c-form__input-group">
      <input class="c-form__input-group-checkbox" id="terms-checkbox" name="terms-checkbox" type="checkbox" value="true" <?php echo !empty( $_POST['terms-checkbox'] ) ? 'checked="checked"' : ''; ?>>
      <label class="c-form__input-group-label u-text--left" for="terms-checkbox"><?php esc_html_e( 'I accept the', 'ccw_countries' ); ?> <a href="<?php echo CCW_API_TERMS_CONDITIONS_PAGE; ?>" target="_blank"><?php esc_html_e( 'terms &amp; conditions', 'ccw_countries' ); ?></a></label>
    </div>
    <!-- anti-spam field start-->
      <div style="display: none;">
        <label>Keep this field blank</label>
        <input type="text" name="honeypot" id="honeypot">
      </div>
    <!-- anti-spam field end -->
    </fieldset>
    <fieldset class="c-form__fieldset">
    <button class="c-button c-button--green" type="submit" form="register-club" value="Create a Code Club"><?php esc_html_e( 'Create a Code Club', 'ccw_countries' ); ?></button>
    </fieldset>
</form>
