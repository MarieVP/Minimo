<?php
require 'Bootstrap.php';
require 'Controllers/Frontend.php';

session_start();
if(!isset($_GET['action'])){
    $action = "accueil";
} else {
    $action =$_GET['action'];
}

$controller = new Frontend();

if (is_callable(array($controller, $action))){
    $controller->$action();
} else {
    $controller-> index();
}
