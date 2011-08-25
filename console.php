<?php
// Загрузка классов
require_once(dirname(__FILE__).'/classes/Settings.class.php');
require_once(dirname(__FILE__).'/classes/Apache.class.php');
require_once(dirname(__FILE__).'/classes/Wwwdir.class.php');
require_once(dirname(__FILE__).'/classes/Etchost.class.php');
require_once(dirname(__FILE__).'/classes/Mysql.class.php');
require_once(dirname(__FILE__).'/classes/Set.class.php');
require_once(dirname(__FILE__).'/classes/DefaultHelp.class.php');

// Настройка smarty
require_once(dirname(__FILE__).'/lib/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir(dirname(__FILE__).'/smarty/templates');
$smarty->setCompileDir(dirname(__FILE__).'/smarty/templates_c');
$smarty->setCacheDir(dirname(__FILE__).'/smarty/cache');
$smarty->setConfigDir(dirname(__FILE__).'/smarty/configs');

// Создание объектов
$apache   = new Apache();
$wwwdir   = new Wwwdir();
$etchost  = new Etchost();
$mysql    = new Mysql();
$set      = new Set();
$default  = new DefaultHelp();

// Обработка аргументов
switch($argv[1]) {
  // создать
  case 'create':
    switch($argv[2]) {
      // хост для apache
      case 'apachehost':
        if($argv[3] == '') {
          echo $apache->getHelpForCreateHost();
          break;
        }
        $apache->createHost($argv[3]);
        break;

      // www директорию
      case 'wwwdir':
        if($argv[3] == '') {
          echo $wwwdir->getHelpForCreateDir();
          break;
        }
        $wwwdir->createDir($argv[3]);
        break;

      // хост в /etc/hosts
      case 'etchost':
        if($argv[3] == '') {
          echo $etchost->getHelpForCreateHost();
          break;
        }
        $etchost->createHost($argv[3]);
        break;

      // базу и пользователя в mysql
      case 'mysqldbuser':
        if($argv[3] == '') {
          echo $mysql->getHelpForCreateDbuser();
          break;
        }
        $mysql->createDbuser($argv[3]);
        break;

      // пространство для проекта
      case 'set':
        if($argv[3] == '') {
          echo $set->getHelpForCreate();
          break;
        }
        $set->create($argv[3]);
        break;

      default:
        echo $default->getForCreate();
      break;
    }
    break;

  default:
    echo $default->getForAll();
  break;
}
