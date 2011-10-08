<?php
require_once(dirname(__FILE__).'/../classes/Settings.class.php');

class Wwwdir {
  private $settings = array();
  private $errorForCreateDir = 'Укажите название директории';

  public function __construct() {
    $settings       = new Settings();
    $this->settings = $settings->getArray();
  }

  public function getErrorForCreateDir() {
    return $this->errorForCreateDir;
  }

  public function createDir($dirname) {
    $dir_path = $this->settings['wwwdir'] . $dirname;
    $dir_path_web = $dir_path . '/web/';
    $usergroup = $this->settings['user'] . ':' . $this->settings['group'];

    `mkdir -p $dir_path_web`;
    `chown -R $usergroup $dir_path`;
  }

}
