<?php
/**
 * Flash Message Class & Functions
 */
final class Flash_Message {

  const ERROR = 1;
  const INFO = 2;
  const SUCCESS = 3;
  const WARNING = 4;

  private $alert_classes
    = array(
      self::ERROR => 'c-alert--error',
      self::INFO => 'c-alert--info',
      self::SUCCESS => 'c-alert--success',
      self::WARNING => 'c-alert--warning');

  private $icon_classes
    = array(
      self::ERROR => 'c-icon--error c-icon--white',
      self::INFO => 'c-icon--info-fill c-icon--white',
      self::SUCCESS => 'c-icon--tick-circle c-icon--white',
      self::WARNING => 'c-icon--warning');

  public function hasMessages() {
    return isset($_SESSION['flash']);
  }

  public function clear() {
    $_SESSION['flash'] = null;
  }

  public function createError($message) {
    $this->createMessage($message, self::ERROR);
  }

  public function createInfo($message) {
    $this->createMessage($message, self::INFO);
  }

  public function createSuccess($message) {
    $this->createMessage($message, self::SUCCESS);
  }

  public function createWarning($message) {
    $this->createMessage($message, self::WARNING);
  }

  public function display() {
    if (!$this->hasMessages()) return;

    $flash = $_SESSION['flash'];

    foreach ($flash as $type => $message) {
      echo $this->constructHtml($type, $message);
    }

    $this->clear();
  }

  private function constructHtml($type, $message) {
    $html  = '';
    $html .= '<div class="c-alert ' . $this->alert_classes[$type] . ' ">';
    $html .= '<span class="c-icon c-icon--small ' . $this->icon_classes[$type] . '  u-margin-right--x-small"></span>';
    $html .= $message;
    $html .= '</div>';

    return $html;
  }

  private function createMessage($message, $type) {
    $_SESSION['flash'][$type] = $message;
  }

}

?>
