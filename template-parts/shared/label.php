<?php

  $class = "c-form__label";
  $has_error = isset($error);

  if ($has_error) {
    $class .= " c-form__label--error";
  }

?>

<label class="<?= $class ?>" for="<?= $for ?>">
  <?= $title ?>
  <span class="c-form__optional"><?= $required ? '(required)' : '' ?></span>
</label>

<?php if ($has_error): ?>
  <div class="c-alert c-alert--error c-alert--inline">
    <span class="c-icon c-icon--small c-icon--error c-icon--white"></span>
    <?= $error ?>
  </div>
<?php endif; ?>