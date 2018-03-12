<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once 'components/Autoloader.php';
session_start();
$router=new components\Router();
$router->run();
\views\common\topMenu::write(require 'config/PDO_config.php');
?>





