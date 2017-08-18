<?php

class Model_order extends Model
{
	    public function addOrder($order)
    {
        if(empty($order))
        {
            return falce;
        }
        $result = "INSERT INTO orders (`name`,`phone`,`email`,`total_price`,`address`,`comment`)
                        VALUES ('$order->name',
                        		'$order->phone',
                        		'$order->email',
                        		'$order->total_price',
                        		'$order->address',
                        		'$order->comment'
                                )";

        $this->query($result);
       

        if(!$result)
        {
            return $result;
        }
    }
}