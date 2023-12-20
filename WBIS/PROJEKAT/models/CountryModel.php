<?php

namespace app\models;

use app\core\DbModel;

class CountryModel extends DbModel
{

    public $id;
    public $country_name;
    public $country_image;
    public $country_description;


    public function tableName()
    {
        return 'country';
    }

    public function attributes(): array
    {
        return [
            "country_name",
            "country_image",
            "country_description"
        ];
    }


    public function countries() {
        $db = $this->db->con();

        $sqlString = "SELECT DISTINCT country.country_name AS 'countries',COUNT(accommodation.id) AS 'hotels'
FROM accommodation
INNER JOIN  city ON accommodation.city_id = city.id
INNER JOIN country ON city.country_id = country.id
GROUP BY country.country_name
HAVING COUNT(accommodation.id) > 0";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        return $resultArray;
    }




}