<?php
require_once(dirname(__FILE__).'/../classes/Settings.class.php');

class Wwwdir {
  private $settings = array();

  public function __construct() {
    $settings       = new Settings();
    $this->settings = $settings->getArray();
  }

  public function createDir($dirname) {
    $dirpath = $this->settings['wwwdir'] . $dirname . '/web/';
    `mkdir -p $dirpath`;
  }

}
