<?php
require_once(dirname(__FILE__).'/../classes/Settings.class.php');

class Mysql {
  private $settings = array();

  public function __construct() {
    $settings       = new Settings();
    $this->settings = $settings->getArray();
  }

  public function createDb($name) {
    $command = 'echo "create database ' . $name . '" | mysql --user=' . $this->settings['mysql']['user'] . ' --password="' . $this->settings['mysql']['password'] . '"';
    `$command`;
  }

  public function createUser($name) {
    $command = 'echo "GRANT ALL PRIVILEGES ON ' . $name . '.* TO ' . $name . '@localhost IDENTIFIED BY ' ."'".$name."'".';" | mysql --user=' . $this->settings['mysql']['user'] . ' --password="' . $this->settings['mysql']['password'] . '"';
    `$command`;
  }

  public function createDbuser($name) {
    $this->createDb($name);
    $this->createUser($name);
  }

}
