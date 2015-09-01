<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Session;
use Config;
use App;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Authentification users
     *
     * @return Response
     */
    public function auth()
    {
        $this->data['title'] = 'Вход';
        if (Request::has('auth')) {
            p(Request::input('auth'));
        }
        else{
            return view('auth', $this->data);
        }
    }
    /**
     * Registration users
     *
     * @return Response
     */
    public function registration()
    {
        $this->data['title'] = 'Регистрация';
        if (Request::has('registration')) {
            p(Request::input('registration'));
        }
        else{
            return view('registration', $this->data);
        }
    }
    
    /**
     * Ajax - check email
     *
     * @return json
     */
    public function check_email()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
