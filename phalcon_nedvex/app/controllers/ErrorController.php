<?php

Class ErrorController extends ControllerBase
{
    public function notFoundAction()
    {
        echo "IN 404"; exit; 
    }
}