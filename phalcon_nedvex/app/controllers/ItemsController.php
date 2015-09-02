<?php

class ItemsController extends ControllerBase { 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexAction($id = null) 
    {
        $this->view->title = $this->request->getQuery('title') ? $this->request->getQuery('title') : $this->title_list['flats'];
        $this->view->keywords = '';
        $this->view->description = '';    
        //$this->view->watched = $this->watched->getWatched($this->settings->max_you_watched);
        $this->view->page = 'flats';//'flats';
        //$this->view->favorites = $this->favorites->getFavorites();
        $this->view->list_title =  $this->request->has('title') ? $this->request->getQuery('title') : $this->title_list['flats'];   
        if ($id) {
            $pagination = '?pagenumber=' . $id . '&count=' . $this->page_size;
        } else {
            $pagination = '?pagenumber=1&count=' . $this->page_size;
        }

        /* if has POST Request */
        if ($this->request->has($this->view->page)) {
            $post = $this->clear_fields($this->request->getQuery($this->view->page)); 
            if ($request = $this->request($post, $this->links_list['flats'] . $pagination)) {
                if (isset($request->Results)) {
                    $this->view->items = $request->Results;
                    $this->view->pagination['total_count'] = $request->Total;
                } else {
                    $this->view->error = $request;
                }
                $this->view->pagination['post'] = $this->request->getQuery();
            }
            $this->data[$this->view->page] = $post;
        } else {
            $request = $this->request(array(), $this->links_list['flats'] . $pagination); 
            if (isset($request->Results)) {
                $this->view->items = $request->Results;
                $this->view->pagination['total_count'] = $request->Total;
            } else {
                $this->view->error = $request;
            }
        }
        if (($total_count = isset($this->view->pagination['total_count']) ? $this->view->pagination['total_count'] : 0 ) > $this->page_size) {
            $this->view->pagination['page_size'] = $this->page_size;
            $this->view->pagination['page'] = $this->view->page;
            $this->view->pagination['current_page'] = $id ? $id : 1;
        }
        if ($this->request->has('form_type')) {
            $this->view->form_type = $this->request->getQuery('form_type');
        }
        $this->view->pick("items");
        //return view('items', $this->data);
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
