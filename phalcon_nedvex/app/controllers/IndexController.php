<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick("home");
    }

}

