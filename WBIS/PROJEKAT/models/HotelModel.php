<?php

namespace app\models;

use app\core\DbModel;

class HotelModel extends DbModel
{

    public $accommodation_name;

    public function tableName()
    {
        return "accommodation";
    }

    public function attributes(): array
    {
        return [
            "accommodation_name"
        ];
    }
}