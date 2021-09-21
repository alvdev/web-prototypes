<?php

use app\controllers\HomePageController;
use app\controllers\LoginPageController;
use app\controllers\Template;

require_once 'vendor/autoload.php';
require_once 'config/config.php';

// Getting page url
$page = $_GET['page'] ?? $_POST['page'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if ($page === 'login') {
    $loginPageController = new LoginPageController();
    $loginPageController->runAction($action);
} else {
    include_once CTRL . 'HomePage.php';
    $homePageController = new HomePageController();
    $homePageController->runAction($action);
}
