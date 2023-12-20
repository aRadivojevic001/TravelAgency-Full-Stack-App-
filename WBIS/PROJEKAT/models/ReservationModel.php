<?php

namespace app\models;

use app\core\DbModel;

class ReservationModel extends DbModel
{
    public $name;
    public $surname;

    public $phone_number;
    public $check_in;
    public $check_out;

    public $email;
    public $accomodation_id;

    public $price_per_night;


    public function rules(): array
    {
        return[
            'name' => [self::RULE_REQUIRED, self::RULE_STRING],
            'surname' => [self::RULE_REQUIRED, self::RULE_STRING],
            'phone_number' => [self::RULE_REQUIRED],
            'check_in' => [self::RULE_REQUIRED],
            'check_out' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL]
        ];
    }

    public function tableName()
    {
        return 'reservation';
    }

    public function attributes(): array
    {
        return [
            "name",
            "surname",
            "phone_number",
            "check_in",
            "check_out",
            "email",
            "accomodation_id",
            "price_per_night"
        ];
    }



}