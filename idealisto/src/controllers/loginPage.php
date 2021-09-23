<?php

namespace app\controllers;

class LoginPageController extends PageController
{
    public function defaultAction()
    {
        // fetch the SEO
        // get the page data
        // $title
        // $content

        $variables['title'] = 'Login page';
        $variables['content'] = 'Welcome to the login page';

        $template = new Template();
        $template->view('login', $variables);
    }
}

//include_once VIEW . 'login.php';
