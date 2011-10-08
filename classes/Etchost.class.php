<?php
class Etchost {
  private $fileEtcHosts = '/etc/hosts';
  private $errorForCreateHost = 'Укажите название хоста';
  
  public function getErrorForCreateHost() {
    return $this->errorForCreateHost;
  }

  public function createHost($hostname) {
    `echo '127.0.0.1	$hostname' >> /etc/hosts`;
  }
}
