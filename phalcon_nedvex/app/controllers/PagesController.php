<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Config;

class PagesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        //die(1);
        parent::__construct();
    }

    /**
     * Info page Realtors.
     *
     * @return view
     */
    public function Realtors() {
        $this->data['title'] = 'Риэлторы';
        $this->data['keywords'] = 'Риэлторы';
        $this->data['description'] = 'Риэлторы';

        return view('realtors', $this->data);
    }

    /**
     * Info page Realtors.
     *
     * @return view
     */
    public function about() {
        $this->data['title'] = 'О компании';
        $this->data['keywords'] = 'О компании';
        $this->data['description'] = 'О компании';
        return view('about', $this->data);
    }

    /**
     * Info page Realtors.
     *
     * @return view
     */
    public function reviews() {
        $this->data['title'] = 'Отзывы';
        $this->data['keywords'] = 'Отзывы';
        $this->data['description'] = 'Отзывы';
       
        return view('reviews', $this->data);
    }

    /**
     * Info page Realtors.
     *
     * @return view
     */
    public function contacts() {
        $this->data['title'] = 'Контакты';
        $this->data['keywords'] = 'Контакты';
        $this->data['description'] = 'Контакты';

        return view('contacts', $this->data);
    }

    /**
     * Info page Realtors.
     *
     * @return view
     */
    public function proprietors() {
        $this->data['title'] = 'СОБСТВЕННИКУ';
        $this->data['keywords'] = 'СОБСТВЕННИКУ';
        $this->data['description'] = 'СОБСТВЕННИКУ';

        return view('proprietors', $this->data);
    }

}
