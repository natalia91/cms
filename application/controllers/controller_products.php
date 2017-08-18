<?php

class Controller_products extends Controller
{

	function __construct()
    {
        $this->model = new Model_products();
        //$this->model_cat2 = Route::loader('categories','index',false);
        $this->view = new view();
        //$this->model2 = new Model_categories();
    }

	function action_index()
	{	
		$id = Request::get('id','integer');
        $product = $this->model->getProduct($id);
		$data['product'] = reset($product);

		if(Request::post('buy')) {
			$product_id = Request::post('product_id');
			$amount = Request::post('amount');
			$cart[$product_id] = $amount;
			$_SESSION['cart'][$product_id] = $amount;
			
		}


		$this->view->generate('product_view.php', 'template_view.php',$data);

	}
}