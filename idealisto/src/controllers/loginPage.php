<?php

namespace app\controllers;

class LoginPageController extends PageController
{
    /* TODO: Add login view template */
    function defaultAction()
    {
        echo 'This is working login page';
        include_once VIEW . 'login.php';
    }
}

//include_once VIEW . 'login.php';
