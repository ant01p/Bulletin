<?php
use Notes\App\Controller\UserController;
use Notes\App\Controller\NoteController;

require 'vendor/autoload.php';

$userController = new UserController;
$noteController = new NoteController;

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

if ($route === 'index') {
    $userController->index();
} elseif ($route === 'show') {
    $userController->show();
} elseif ($route === 'add') {
    $noteController->add();
} elseif ($route === 'delete') {
    $noteController->delete();
}