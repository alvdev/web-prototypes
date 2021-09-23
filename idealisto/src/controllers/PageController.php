<?php

namespace app\controllers;

class PageController
{
    /* TODO: runBeforeAction method for contact page */
    public function runAction($actionName)
    {
        if (method_exists($this, 'runBeforeAction')) {
            $result = $this->runBeforeAction();
            if ($result == false) {
                return;
            }
        }

        $actionName .= 'Action';
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            /**
             * TODO: 404 page
             */
            include VIEW . '404.php';
        }
    }
}
