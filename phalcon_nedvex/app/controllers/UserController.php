<?php

// namespace Phalcon\Controllers;
// use Phalcon\Models\Users;

class UserController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick("home");
    }

    public function RegistrationAction()
    {
        $this->view->pick("auth/register");
    }

    /**
     * Creates a User
     */
    public function createAction()
    {
        if ($this->request->isPost()) {
// print_r($this->request->getPost());
            $user = new Users();

            $user->assign(array(
                'name' => $this->request->getPost('name', 'striptags'),
                'phone' => $this->request->getPost('phone', 'striptags'),
                'profilesId' => 2,
                'password' => $this->request->getPost('password', 'string'),
                'email' => $this->request->getPost('email', 'email')
            ));

            if (!$user->save()) {
                $this->flash->error($user->getMessages());
            } else {

                $this->flash->success("User was created successfully");

                // Tag::resetInput();
            }
        }

        // $this->view->form = new UsersForm(null);
    }

}

