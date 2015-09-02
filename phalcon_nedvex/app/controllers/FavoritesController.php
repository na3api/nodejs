<?php
class FavoritesController extends ControllerBase
{
    /**
     * Display a listing of the resource.
     *
     * @return view content
     */
    public function indexAction()
    {
        $this->view->title = 'Избранное';
        $this->view->slider_size = $this->settings->favorites_slider_size;
        $this->view->favorites = $this->getFavorites();       
        
        $this->view->pick("favorites");
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
        return $this->session->get('favorites');
    }
}
