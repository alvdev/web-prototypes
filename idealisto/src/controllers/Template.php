<?php

namespace app\controllers;

class Template
{
    public function view($template, $variables)
    {
        extract($variables);

        include_once ROOT . 'src/helpers/locale.php';
        include VIEW . $template . '.php';
    }
}
