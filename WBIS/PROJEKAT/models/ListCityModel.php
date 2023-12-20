<?php

namespace app\models;

use app\core\DbModel;

class ListCityModel extends DbModel
{

    public $id;

    public function searchData($id) {

        //AND where city.id =

        $dbResult= $this->db->con()->query("SELECT city.id, city.city_name, city.city_image, city.country_id FROM city WHERE city.country_id = $id; ");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $city = new CityModel();
            $city->mapData($result);
            $resultArray[] = $city;
        }

        $this->city = $resultArray;

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