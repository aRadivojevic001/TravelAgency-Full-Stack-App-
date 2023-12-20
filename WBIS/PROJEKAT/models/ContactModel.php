<?php

namespace app\models;

use app\core\DbModel;

class ContactModel extends DbModel
{
    public $user_name;
    public $user_email;

    public $user_message;

    public function rules(): array
    {
        return[
            'user_name' => [self::RULE_REQUIRED, self::RULE_STRING],
            'user_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'user_message' => [self::RULE_REQUIRED, self::RULE_STRING]
        ];
    }


    public function tableName()
    {
        return "Contact";
    }

    public function attributes(): array
    {
        return [
            "user_name",
            "user_email",
            "user_message"
        ];
    }
}