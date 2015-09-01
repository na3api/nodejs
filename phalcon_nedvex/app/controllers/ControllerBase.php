<?php

use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->setTemplateAfter('nedvex');
    }
    protected function getTranslation() {
        // Получение оптимального языка из браузера
        $language = $this->request->getBestLanguage();
        require "app/messages/ru.php";
        return new NativeArray(
            array(
                "content" => $messages
            )
        );
    }

    

}
