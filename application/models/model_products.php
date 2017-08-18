<?php

class Model_products extends Model
{
    public function getProduct($id) {
        if(empty($id)) {
            return false;
        }
        $q = "SELECT id, name, description, visible, price, amount, image FROM products WHERE id = $id";
        $res = $this->query($q);
        return $res;
    }

    /*public function addProduct($product) {
        if(empty($product)) {
            return false;
        }

        $q = "INSERT INTO products (`name`,`url`,`description`,`price`,`amount`,`visible`,`image`)
                        VALUES ('$product->name',
                                '$product->url',
                                '$product->description',
                                '$product->price',
                                '$product->amount',
                                '$product->visible',
                                '$product->image')";

        $this->query($q);
    }*/

    /*public function updateProduct($id, $product) {
        if(empty($id) || empty($product)) {
            return false;
        }

        $q = "UPDATE products SET name = '$product->name',
                                    url = '$product->url',
                                    description = '$product->description',
                                    price = '$product->price',
                                    amount = '$product->amount',
                                    visible = '$product->visible',
                                    image = 'product->image'
                WHERE id = '$id'";


        if($this->query($q)) {
            return $id;
        } else {
            return false;
        }
    }*/

    public function getProducts($filter = array()) {

        
        $q = "SELECT id, name, url, description, visible, price, amount, image, created FROM products";
        $res = $this->query($q);
        if (count ($res) == 1){
            $data[] = $res;
        } else {
            $data = $res;
        }

        return $data;
    }


public function uploadImage ($product_id)
{
    if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_FILES['uploadfile']['name']))

{
    $uploaddir="/images/";
    $tmp = $_SERVER['DOCUMENT_ROOT'].'/images/';

   // $file = $tmp.basename($_FILES['uploadfile']['name']);
    $uploadfile = Request::translit(basename($_FILES['uploadfile']['name']));
    $filename = $tmp.$uploadfile;
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name']))
    {
        echo 'ошибка передачи файла';
    }
    else
    {

        if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $filename))
        {
            $query = "UPDATE products SET `image` = '$uploadfile' WHERE id = $product_id";
        $this->query($query);
        if(!empty($query))
        {
                echo "Файл упешно загружен";
            }
            else {
                echo "Путь не добавлен в базу данных, но файл загружен ".mysqli_error();
            }
        }
        else {
            echo "Файл не загружен, ";
        }
    }
}
}
}
}