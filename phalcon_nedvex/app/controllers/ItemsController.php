<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App;
use Log;
use Config;
use Lang;

class ItemsController extends BaseController {

    
    public function __construct() {
        parent::__construct();
    }   
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        $this->data['title'] = Request::has('title') ? Request::input('title') : $this->title_list[Request::segment(1)];
        $this->data['keywords'] = '';
        $this->data['description'] = '';    
        $this->data['watched'] = $this->watched->getWatched(Config::get('settings.max_you_watched'));
        $this->data['page'] = Request::segment(1);
        $this->data['favorites'] = $this->favorites->getFavorites();
        $this->data['list_title'] = Request::has('title') ? Request::input('title') : $this->title_list[Request::segment(1)];   
        if ($id) {
            $pagination = '?pagenumber=' . $id . '&count=' . $this->page_size;
        } else {
            $pagination = '?pagenumber=1&count=' . $this->page_size;
        }

        /* if has POST Request */
        if (Request::has($this->data['page'])) {
            $post = $this->clear_fields(Request::input($this->data['page'])); 
            if ($request = $this->request($post, $this->links_list[Request::segment(1)] . $pagination)) {
                if (isset($request->Results)) {
                    $this->data['items'] = $request->Results;
                    $this->data['pagination']['total_count'] = $request->Total;
                } else {
                    $this->data['error'] = $request;
                }
                $this->data['pagination']['post'] = Request::input();
            }
            $this->data[$this->data['page']] = $post;
        } else {
            $request = $this->request(array(), $this->links_list[Request::segment(1)] . $pagination);          
            if (isset($request->Results)) {
                $this->data['items'] = $request->Results;
                $this->data['pagination']['total_count'] = $request->Total;
            } else {
                $this->data['error'] = $request;
            }
        }
        if (($total_count = isset($this->data['pagination']['total_count']) ? $this->data['pagination']['total_count'] : 0 ) > $this->page_size) {
            $this->data['pagination']['page_size'] = $this->page_size;
            $this->data['pagination']['page'] = $this->data['page'];
            $this->data['pagination']['current_page'] = $id ? $id : 1;
        }
        if (Request::has('form_type')) {
            $this->data['form_type'] = Request::input('form_type');
        }
        return view('items', $this->data);
    }

    /**
     * Delete empty filds
     *
     * @return array
     */
    public function clear_fields($request) {
        foreach($request as $key => $field)
        {
            if(!is_array($field))
            {
                if($field){
                    $result[$key] = $field;
                }                
            }else{
                if(!empty($field)){
                    $result[$key] = $field;
                }                
                
            }
        }
        return isset($result) ? $result : array();
    }
 
    /**
     * Convert distance to sea
     *
     * @return string
     */
    public static function distance($distance) {
        if($distance < 1000){
            return $distance . ' м';
        }else{
            return $distance*0.001 . ' км';           
        }
    }
    /**
     * Convert ending words
     *
     * @return string
     */
    public static function endingWords($word_key, $number) 
    {       
        if($number == 1){
            return Lang::get('main.'.$word_key);
        }elseif($number > 1 && $number < 5){
            return Lang::get('main.'.$word_key.'_2');
        }else{
            return Lang::get('main.'.$word_key.'_3');       
        }
    }

    
    /**
     * Display a page for one item
     *
     * @return view
     */
    public function item($id) {
        $this->data['title'] = '';
        $this->data['keywords'] = '';
        $this->data['description'] = '';
        $this->data['item'] = array();
        $this->data['favorites'] = $this->favorites->getFavorites();
        $this->data['page'] = Request::segment(1);
        $this->data['breadcrumbs'] = array(
                array('Главная', '/'));
        $this->data['breadcrumbs'][] = array($this->title_list[$this->data['page']], '/' . $this->data['page']);
        if ($this->data['item'] = $this->request(array(), $this->links_detail[Request::segment(1)] . '/' . $id, 'GET')) {
            /* Add to watched list */
            $this->watched->addToWatched($this->data['item']);
            /* Set meta description */
            if (isset($this->data['item']->Description)) {
                $this->data['description'] = substr(strip_tags($this->data['item']->Description),0, 200);
            }
            if (isset($this->data['item']->Name)) {
                $this->data['breadcrumbs'][] = $this->data['item']->Name;
                $this->data['title'] = strip_tags($this->data['item']->Name);
            }
            return view('item', $this->data);
        } else {
            return redirect('404');
        }
    }
}
