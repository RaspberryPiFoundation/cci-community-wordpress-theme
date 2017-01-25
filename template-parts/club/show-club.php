<div class="c-content-panel">
  <dl class="c-def-list">
    <h4>Club</h4>
    <dt class="c-def-list__term">
      <?php esc_html_e("Username") ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['username']) ?></dd>
  </dl>
</div>

<div class="c-content-panel">
  <dl class="c-def-list">
    <h4><?php esc_html_e("Venue"); ?></h4>
    <dt class="c-def-list__term">
      <?php esc_html_e("Name"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['name']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Looking for Volunteer"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php
      echo get_yes_no(htmlspecialchars($_SESSION['club']['looking_for_volunteer']))
      ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Website"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['url']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Address 1"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['address']['address_1']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Address 2"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['address']['address_2']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("City"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['address']['city']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Region"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['address']['region']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Postcode"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['venue']['address']['postcode']) ?></dd>
  </dl>
</div>

<div class="c-content-panel">
  <dl class="c-def-list">
    <h4><?php esc_html_e("Contact"); ?></h4>
    <dt class="c-def-list__term">
      <?php esc_html_e("Name"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['contact']['name']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Email"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['contact']['email']) ?></dd>
    <dt class="c-def-list__term">
      <?php esc_html_e("Skype"); ?>
    </dt>
    <dd class="c-def-list__definition"><?php echo htmlspecialchars($_SESSION['club']['contact']['skype']) ?></dd>
  </dl>
</div>
