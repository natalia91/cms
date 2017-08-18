<?php

class Controller_register extends Controller
{

    function __construct()
    {
        $this->model = new Model_register();
        $this->view = new view();
    }

    function action_index()
    {
        if(Request::method() == "post" && Request::post('register'))
        {
            //если прислали форму, значит получаем новые данные
            $new_user = new stdClass();
            $id = Request::post('id','integer');
            $new_user->name = Request::post('name','string');
            $new_user->phone = Request::post('phone','string');
            $new_user->email = Request::post('email','string');

         }   
        
            $this->model->addUser($new_user);
            $id = $this->model->insert_id();
            $message = 'adduser';
        

        $data['user'] = $new_user;
        //print_r($data);
        

        $this->view->generate('register_view.php', 'template_view.php', $data,'', $message);
    }
    
}