<?php

class Controller_order extends Controller
{

    function __construct()
    {
        $this->model = new Model_order();
        $this->view = new view();
    }

    function action_index()
    {
        if(Request::method() == "post" && Request::post('order'))
        {
            //если надали кнопку купить, то создаем заказ и вносим его в БД
            $new_order = new stdClass();
            $id = $_SESSION['cart'][$product_id];
            $new_order->name = Request::post('name','string');
            $new_order->phone = Request::post('phone','string');
            $new_order->email = Request::post('email','string');
            $new_order->address = Request::post('address','string');
            $new_order->comment = Request::post('comment','string');
            $new_order->total_price = Request::post('total_price');


         }   
        
            $this->model->addOrder($new_order);
            $id = $this->model->insert_id();
            $message = 'addorder';
        

        $data['order'] = $new_order;
        //print_r($data);
        

        $this->view->generate('register_view.php', 'template_view.php', $data,'', $message);
    }
    
}