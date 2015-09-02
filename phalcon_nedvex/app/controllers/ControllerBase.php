<?php

use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray;
use Phalcon\Di\FactoryDefault;
use Phalcon\Config;
use Phalcon\Http\Client\Request as CRequest;

class ControllerBase extends Controller {

    public $page_size;
    public $remote_url;
    public $links_list = array(
        'flats' => '/search/flat',
        'houses' => '/search/house',
        'areas' => '/search/land',
        'offices' => '/search/office',
        'hotels' => '/search/hotel',
        'storages' => '/search/storage',
        'busines' => '/search/business',
    );
    public $commerces = array(
        'offices',
        'hotels',
        'storages',
        'busines',
    );
    public $links_detail = array(
        'flats' => '/details/flat',
        'houses' => '/details/house',
        'areas' => '/details/land',
        'offices' => '/details/office',
        'hotels' => '/details/hotel',
        'storages' => '/details/storage',
        'busines' => '/details/business',
    );
    public $title_list = array(
        'flats' => 'Квартиры',
        'houses' => 'Дома',
        'areas' => 'Участки',
        'offices' => 'Офисные площади',
        'hotels' => 'Гостиницы',
        'storages' => 'Склады',
        'busines' => 'Торговые площади',
    );

    public function initialize() {
        $this->view->t_main = $this->getTranslation('main');
        $this->view->t_enums = $this->getTranslation('enums');
        $this->view->t_valid = $this->getTranslation('validation');
        $this->remote_url = $this->settings->web_service_url;
        $this->page_size = $this->settings->pagination_size;
        $this->view->settings = $this->settings;
        /* template include */
        $this->view->setTemplateAfter('nedvex');
    }

    protected function getTranslation($translate_file) {
        // Получение оптимального языка из браузера
        $language = 'ru'; //$this->request->getBestLanguage();

        return new NativeArray(
                array(
            "content" => include APP_PATH . "/app/messages/" . $language . "/" . $translate_file . ".php"
                )
        );
    }

    /**
     * Get information form remote server
     *
     * @return array/ false
     */
    public function request($data, $url, $method = 'post') {
        $provider = CRequest::getProvider();
        $provider->setBaseUri($this->remote_url);
        $provider->header->set('Accept', 'application/json');
        $response = $provider->$method($url, array_merge($data, array('access_token' => 1234)));
        if ($response) {
            if (isset($response->Message)) {
                //Log::error($response->Message);
                return $response->Message;
            } else {
                return json_decode($response->body);
            }
        } else {
            return false;
        }



        /*
          $ch = curl_init($this->remote_url . $url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
          curl_setopt($ch, CURLOPT_PORT, 80);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
          );
          $result = curl_exec($ch);
          if ($result = json_decode($result)) {
          if (isset($result->Message)) {
          Log::error($result->Message);
          return $result->Message;
          } else {
          return $result;
          }
          } else {
          return false;
          } */
    }

}
