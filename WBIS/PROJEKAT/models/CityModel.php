<?php

namespace app\models;

use app\core\DbModel;

class CityModel extends DbModel
{
    public $id;
    public $city_name;
    public $city_image;
    public $country_id;

    public function tableName()
    {
       return 'city';
    }

    public function attributes(): array
    {
        return [
            "city_name",
            "city_image",
            "country_id"
        ];
    }
}