<?php

class HomeController extends ControllerBase {

    public $items;
    public $data = array();
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function indexAction() {
        $this->data ['title'] = 'Главная';
        $this->data ['keywords'] = '';
        $this->data ['description'] = '';
        $this->data ['slider_size'] = Config::get('settings.home_slider_size');
        $this->data ['favorites'] = $this->favorites->getFavorites();
        $this->data ['watched'] = $this->watched->getWatched(Config::get('settings.max_you_watched'));
        $this->data['items'] = $this->get_top(Config::get('settings.max_top_size'));
        
        return view('home', $this->data);
    }

}
