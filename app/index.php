<?php
use Notes\App\Controller\UserController;

require 'vendor/autoload.php';

$userController = new UserController;

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

if ($route === 'index') {
    $userController->index();
} elseif ($route === 'show') {
    $userController->show();
}