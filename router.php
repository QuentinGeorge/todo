<?php
session_start();

$routes = require('configs/routes.php');
if (empty($_SESSION['user'])) {
    $defaultRoute = $routes['get_login'];
} else {
    $defaultRoute = $routes['index_task'];
}
$routeSplited = explode('/', $defaultRoute);
$method = $_SERVER['REQUEST_METHOD'];

$a = $_REQUEST['a']??$routeSplited[1];
$r = $_REQUEST['r']??$routeSplited[2];

if (!in_array($method . '/' . $a . '/' . $r, $routes)) {
    die('Ce que vous cherchez n’est pas ici');
}
$controllerName = 'Controllers\\' . ucfirst($r);
$controller = new $controllerName();

$data = call_user_func([$controller, $a]);
