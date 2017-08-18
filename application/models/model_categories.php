<?php

class Model_categories extends Model
{
    public function getCategory($id) {
        if(empty($id)) {
            return false;
        }
        $q = "SELECT id, name, url, description, visible, parent_id FROM categories WHERE id = $id";
        $res = $this->query($q);
        return $res;
    }

    public function addCategory($category) {
        if(empty($category)) {
            return false;
        }

        $q = "INSERT INTO categories (`name`,`url`,`description`,`visible`,`parent_id`)
                        VALUES ('$category->name',
                                '$category->url',
                                '$category->description',
                                '$category->visible',
                                '$category->parent_id')";

        $this->query($q);
    }

    public function updateCategory($id, $category) {
        if(empty($id) || empty($category)) {
            return false;
        }

        $q = "UPDATE categories SET name = '$category->name',
                                    url = '$category->url',
                                    description = '$category->description',
                                    visible = '$category->visible',
                                    parent_id = '$category->parent_id'
                WHERE id = '$id'";

        if($this->query($q)) {
            return $id;
        } else {
            return false;
        }
    }

    public function getCategories() {
        $q = "SELECT id, name, url, description, visible, parent_id, created FROM categories";
        $res = $this->query($q);
        if (count ($res) == 1){
            $data[] = $res;
        } else {
            $data = $res;
        }
        return $data;
    }

     public static function PrintCategories($categories, $level=1) {
        if($categories) { // проверка лишней не бывает
            echo "<ul style='padding-left:". $level*10 ."px'>";
            foreach ($categories as $category) {
                if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
                    echo "<li>
                    <a href='?module=categories&id=$category->id'>$category->name </a>
                    

                    </li>";
                    if($category->subcategories) {
                        // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                        self::PrintCategories($category->subcategories, $level+1); // передаем в функцию уже массив обьектов покатегорий
                    }
                }
            }
            echo "</ul>";
        }
    }

    public function makeTree($categories) {
         $tree = new stdClass();
        $tree->subcategories = array();
        // Указатели на узлы дерева
        $pointers = array();
        $pointers[0] = &$tree;
        $finish = false;
        // Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
        while(!empty($categories)  && !$finish) {
            $flag = false;
            // Проходим все выбранные категории
            foreach($categories as $k=>$category) {
                if(isset($pointers[$category->parent_id])) {
                    // В дерево категорий (через указатель) добавляем текущую категорию
                    $pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
                    // Убираем использованную категорию из массива категорий
                    unset($categories[$k]);
                    $flag = true;
                }
            }
            if(!$flag) {
                $finish = true;
            }
        }
        return reset($tree);
    }
}