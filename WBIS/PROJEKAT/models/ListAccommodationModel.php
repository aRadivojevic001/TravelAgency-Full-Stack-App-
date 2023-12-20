<?php

namespace app\models;

use app\core\DbModel;

class ListAccommodationModel extends DbModel
{

    public $id;

    public function searchData($id) {



        $dbResult= $this->db->con()->query("SELECT accommodation.id, accommodation.accommodation_name, accommodation.accommodation_image, accommodation.city_id, accommodation.price_per_night FROM accommodation WHERE accommodation.city_id = $id");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($result);
            $resultArray[] = $accommodation;
        }

        $this->accommodation = $resultArray;


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