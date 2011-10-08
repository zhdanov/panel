<?php
class DefaultHelp {
  public function getForCreate() {
    $result = ""
            . "     apachehost    Создать виртуальный хост в apache\n"
            . "     wwwdir        Создать www директорию\n"
            . "     etchost       Создать запись в /etc/host\n"
            . "     mysqldbuser   Создать базу и пользователя в mysql\n"
            . "     set           Создать всё перечисленное выше";
    return $result;
  }

  public function getForAll() {
    $result = "Использование: sudo php console.php КОМАНДА [АРГУМЕНТЫ]\n\n"
            . "Популярные команды:\n"
            . "   create\n"
            . $this->getForCreate();

    return $result; 
  }
}
