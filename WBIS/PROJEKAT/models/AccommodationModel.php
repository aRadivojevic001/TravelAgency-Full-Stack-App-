<?php

namespace app\models;

use app\core\DbModel;

class AccommodationModel extends DbModel
{
    public $id;
    public $accommodation_name;
    public $accommodation_image;
    public $city_id;
    public $price_per_night;

    public function tableName()
    {
        return 'accommodation';
    }

    public function attributes(): array
    {
        return [
            'id',
            'accommodation_name',
            'accommodation_image',
            'city_id',
            'price_per_night'
        ];
    }
}