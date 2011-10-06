<?php
require_once(dirname(__FILE__).'/../classes/Settings.class.php');

class Wwwdir {
  private $settings = array();

  public function __construct() {
    $settings       = new Settings();
    $this->settings = $settings->getArray();
  }

  public function createDir($dirname) {
    $dir_path = $this->settings['wwwdir'] . $dirname;
    $dir_path_web = $dir_path . '/web/';
    $usergroup = $this->settings['user'] . ':' . $this->settings['group'];

    `mkdir -p $dir_path_web`;
    `chown -R $usergroup $dir_path`;
  }

}
