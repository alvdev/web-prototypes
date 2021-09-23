<?php

namespace app\controllers;

class HomePageController extends PageController
{
    public function defaultAction()
    {
        // fetch the SEO
        // get the page data
        // $title
        // $content

        $variables['title'] = 'This is the title';
        $variables['content'] = 'Welcome to the home page';

        $template = new Template();
        $template->view('home', $variables);
    }
}
