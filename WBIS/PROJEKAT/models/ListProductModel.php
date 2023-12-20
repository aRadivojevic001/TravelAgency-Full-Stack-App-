<?php

namespace app\models;

use app\core\DbModel;

class ListProductModel extends DbModel
{
    public $products;
    public $pageIndex;
    public $rowNumber;
    public $search ="";

    public function search() {



        $dbResult= $this->db->con()->query("SELECT p.id AS 'id', 
                                           p.name AS 'name',
                                           p.price AS 'price',
                                           p.image_url AS 'image_url',
                                           p.description AS 'description',
                                           c.id AS 'category_id',
                                           c.name AS 'category'
                                           FROM products p INNER JOIN categories c ON p.category_id = c.id
                                           WHERE p.name LIKE '%$this->search%' OR c.name LIKE '%$this->search%';");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;
        }

        $this->products = $resultArray;
        return json_encode($this);

    }

    public function searchData() {



        $dbResult= $this->db->con()->query("SELECT p.id AS 'id', 
                                           p.name AS 'name',
                                           p.price AS 'price',
                                           p.image_url AS 'image_url',
                                           p.description AS 'description',
                                           c.id AS 'category_id',
                                           c.name AS 'category'
                                           FROM products p INNER JOIN categories c ON p.category_id = c.id
                                           WHERE p.name LIKE '%$this->search%' OR c.name LIKE '%$this->search%';");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;
        }

        $this->products = $resultArray;
        return $this;

    }


    public function tableName()
    {
       return '';
    }

    public function attributes(): array
    {
       return [];
    }
}