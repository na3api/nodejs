<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App;
use Config;
use Log;

class FeedbackController extends Controller {
    public $feedback_types = array(
        'primary' => '',
        'favorites' => '',
        'item' => ''
    );

    public function __construct() {
        $this->items = App::make('App\Http\Controllers\ItemsController');
        $this->favorites = App::make('App\Http\Controllers\FavoritesController');
    }

    /**
     * ajax feedback
     *
     * @return json
     */
    public function primaryFeedback() 
    {
        
        $geo_info = json_decode($this->get_data(str_replace('{ip}', $this->getIp(), Config::get('settings.get_ip_service'))));
        $response = array(
            'FormName' => Request::input('form_name'),
            'Name' => Request::input('name'),
            'Phone' => Request::input('phone'),
            'Email' => Request::input('email'),
            'City' => isset($geo_info->geobytesfqcn) ? $geo_info->geobytesfqcn : '',
        );
        if (Request::input('type') == 'favorites') {
            $response['lists'] = $this->favorites->getFavorites() ? array_keys($this->favorites->getFavorites()) : array();
        }
        if (Request::input('type') == 'item') {
            $response['ItemName'] =  Request::input('item_name');
            $response['ItemId'] =  Request::input('item_id');
        }
        $this->items->request($response, $this->feedback_types[Request::input('type')]);
        echo json_encode(array('success' => $response));
    }

    /**
     * Get user IP address
     *
     * @return Response
     */
    public function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    /**
     * Analog - file_get_contents() 
     *
     * @return Response
     */
    public function get_data($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);

        if (!curl_errno($ch)) {
            return $data;
        } else {
            Log::error('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
    }

}
