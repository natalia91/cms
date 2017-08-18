<?php

class Controller_user extends Controller
{

    function __construct()
    {
        $this->model = new Model_user();
        $this->view = new view();
    }

    function action_index()
    {

        $user = $this->model->getUser($id);
        if(is_array($user) && count($user) == 1){
            $user = reset($user);
        }

        $data['user'] = $user;
        
        $this->view->generate('user_view.php', 'template_view.php', $data);
    }
}