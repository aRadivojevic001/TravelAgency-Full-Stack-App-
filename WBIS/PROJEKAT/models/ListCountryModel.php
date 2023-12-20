<?php

namespace app\models;

use app\core\DbModel;

class ListCountryModel extends DbModel
{

    public function searchData() {



        $dbResult= $this->db->con()->query("SELECT id AS 'id', 
                                           country_name AS 'country_name',
                                           country_image AS 'country_image',
                                           country_description AS 'country_description'
                                           FROM country;");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $country = new CountryModel();
            $country->mapData($result);
            $resultArray[] = $country;
        }

        $this->country = $resultArray;
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