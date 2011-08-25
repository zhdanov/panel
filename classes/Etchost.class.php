<?php
class Etchost {
  private $fileEtcHosts = '/etc/hosts';
  private $helpForCreateHost = 'etchost        Добавление хоста в /etc/hosts';
  private $errorForCreateHost = 'Укажите название хоста';
  
  public function getHelpForCreateHost() {
    return $this->helpForCreateHost;
  }

  public function getErrorForCreateHost() {
    return $this->errorForCreateHost;
  }

  public function createHost($hostname) {
    `echo '127.0.0.1	$hostname' >> /etc/hosts`;
  }
}
