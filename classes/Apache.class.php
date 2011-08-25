<?php
require_once(dirname(__FILE__).'/../lib/Smarty/Smarty.class.php');
require_once(dirname(__FILE__).'/../classes/Settings.class.php');

class Apache {
  private $settings = array();
  private $smarty   = false;

  private $fileVirtualhost   = 'virtualhost.tpl';
  private $helpForCreateHost = 'apachehost     Создание виртуального хоста в apache';
  private $errorForCreateHost = 'Укажите название виртуального хоста';

  public function __construct() {
    $settings       = new Settings();
    $this->smarty   = new Smarty();
    $this->settings = $settings->getArray();
  }

  private function getVirtualHost($hostname) {
    $this->smarty->assign('hostname', $hostname);
    $this->smarty->assign('email', $this->settings['email']);
    $this->smarty->assign('wwwdir', $this->settings['wwwdir']);
    return $this->smarty->fetch($this->fileVirtualhost);
  }

  private function createSitesAvailable($hostname) {
    $puthfile    = $this->settings['apache']['sites_available'].$hostname;
    $virtualhost = $this->getVirtualHost($hostname);
    `echo '$virtualhost' >> $puthfile`;
  }

  private function createSitesEnabled($hostname) {
    $puthfileAvailable    = $this->settings['apache']['sites_available'].$hostname;
    $puthfileEnabled    = $this->settings['apache']['sites_enabled'].$hostname;
    `ln -s $puthfileAvailable $puthfileEnabled`;
  }

  private function restart() {
    `apache2ctl stop`;
    `apache2ctl start`;
  }

  public function createHost($hostname) {
    $this->createSitesAvailable($hostname);
    $this->createSitesEnabled($hostname);
    $this->restart();
  }

  public function getHelpForCreateHost() {
    return $this->helpForCreateHost;
  }

  public function getErrorForCreateHost() {
    return $this->errorForCreateHost;
  }
}
