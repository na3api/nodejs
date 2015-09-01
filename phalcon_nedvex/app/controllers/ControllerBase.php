<?php

use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->t_main    = $this->getTranslation('main');
        $this->view->t_enums    = $this->getTranslation('enums');
        $this->view->t_valid    = $this->getTranslation('validation');
        $this->view->setTemplateAfter('nedvex');
    }
    protected function getTranslation($translate_file) {
        // Получение оптимального языка из браузера
        $language = 'ru';//$this->request->getBestLanguage();
        
        return new NativeArray(
            array(
                "content" => include APP_PATH . "/app/messages/".$language."/". $translate_file. ".php"
            )
        );
    }

    

}
