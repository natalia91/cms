<?php

class Controller_Main extends Controller
{

	function __construct()
    {
        $this->model = Route::loader('products','index',false);
        $this->model_cat = Route::loader('categories','index',false);
        $this->view = new view();
    }


	function action_index()
	{	
		$data['products'] = $this->model->getProducts();
		$categories = $this->model_cat->getCategories();
		$data['categories'] = $this->model_cat->makeTree($categories);

		$this->view->generate('main_view.php', 'template_view.php',$data);

	}

	
}