<?php

class Controller_cart extends Controller
{

	function __construct()
    {
        $this->model = new Model_cart();
        $this->view = new view();
        $this->model_product = Route::loader('products','index',false);
    }

	function action_index()
	{	
		if($_SESSION['cart'])
		{
			foreach ($_SESSION['cart'] as $id => $amount)
			{
				/*
				$prod = $this->model_product->getProduct($id);
				$pros = reset($prod);
				$prod->amount = $amount;
				$products[$id] = $prod;
				*/
				@$products[$id] = reset($this->model_product->getProduct($id));
				@$products[$id]->amount = $amount;
			}
		$data['cart'] = $products;
		//print_r($data);
		}
		$this->view->generate('cart_view.php', 'template_view.php',$data);

	}
}