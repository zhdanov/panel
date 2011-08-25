<?php
require_once(dirname(__FILE__).'/../lib/yaml/sfYaml.php');

class Settings {
  private $fileSettings = '';

  public function __construct() {
    $this->fileSettings = dirname(__FILE__).'/../config/settings.yml';
  }

  public function getArray() {
    $sfYaml = new sfYaml();
    return $sfYaml->load($this->fileSettings);
  }
}
