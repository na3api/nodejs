<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Session;
use Config; 

class WatchedController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $data = array(
            'title' => 'Вы смотрели',
            'keywords' => '',
            'description' => '');
        return view('watched', $data);
    }

    /**
     * Add to Watched list
     *
     * @return True
     */
    public function addToWatched($item) {
        if ($item) {
            if (!Session::has('watched.' . $item->Id)) {
                Session::put('watched.' . $item->Id, $item);
            }else{                
                Session::forget('watched.' . $item->Id);
                Session::put('watched.' . $item->Id, $item);
            }
        }
        return true;
    }
    /**
     * Get watched list
     *
     * @return True
     */
    public function getWatched($max) {
        if(Session::has('watched'))
        {          
            return array_slice(array_reverse(Session::get('watched')), 0, $max);  
        }else{            
            return false;
        }
    }
}
