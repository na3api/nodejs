<?php
class FavoritesController extends ControllerBase
{
    /**
     * Display a listing of the resource.
     *
     * @return view content
     */
    //public $data = array();
    public function indexAction()
    {
        //print_r(111);
        //$this->data['title'] = 'Избранное';
        //$this->data['slider_size'] = Config::get('settings.favorites_slider_size');
        //$this->data['favorites'] = $this->getFavorites();       
        $this->view->pick("favorites");
        //return view('favorites', $this->data);
    }
    /**
     * Add to favorite list
     *
     * @return Json
     */
    public function addToFavorite()
    {
        if(Request::has('info'))
        {
            $info = json_decode(Request::input('info'));
            if(!Session::has('favorites.'.$info->Id))
            {
                Session::put('favorites.'.$info->Id,$info);
            }
            echo json_encode (array('success' => $info->Id)); 
        }
    }
    /**
     * Remove item from favorite list
     *
     * @return Json
     */
    public function RemoveFromFavorite()
    {
        if(Request::has('info'))
        {
            $info = json_decode(Request::input('info'));
            if(Session::has('favorites.'.$info->Id))
            {
                Session::forget('favorites.'.$info->Id,$info);
            }
            echo json_encode (array('success' => $info->Id)); 
        }
    }
    /**
     * get favorite list
     *
     * @return Json
     */
    public function getFavorites() {
        return Session::get('favorites');
    }
}
