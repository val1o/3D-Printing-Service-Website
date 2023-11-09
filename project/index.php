<?php

$controller = (isset($_GET['c'])) ? $_GET['c'] : "home";

$controllerClassName = ucfirst($controller) . "Controller";
include_once "Controllers/$controllerClassName.php";

$ct = new $controllerClassName();
$ct->route();

?>