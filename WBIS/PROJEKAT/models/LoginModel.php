<?php

namespace app\models;

use app\core\DbModel;

class LoginModel extends DbModel
{

    public string $email;
    public string $password;


    public function tableName()
    {
        return "users";
    }

    public function rules(): array
    {
        return[
            'email' => [self::RULE_EMAIL, self::RULE_EMAIL_UNIQUE],
            'password' => [self::RULE_REQUIRED]
        ];
    }


    public function login() {

        $result = $this->one("email = '$this->email'");

        if($result != NULL) {

            return (password_verify($this->password, $result['password']));

        }
        return false;
    }


    public function attributes(): array
    {
        return [
            "email",
            "password",
        ];
    }
}