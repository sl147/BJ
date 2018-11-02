<?
/*
 * Фронт контроллер
 */

//Підключення файлів системи

define('ROOT', dirname(__FILE__));

require_once (ROOT."/components/Autoload.php");
require_once (ROOT."/components/Router.php");
require_once (ROOT."/components/Db.php");

/*
 * Запуск Router
 */
$router = new Router();
$router->run();
?>