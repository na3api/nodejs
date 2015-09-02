<?php

class TestController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->t    = $this->getTranslation();
        $this->view->pick("home");
    }

}

