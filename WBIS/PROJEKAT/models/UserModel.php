<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public string $id;

    public $name;

    public string $email;

    public string $password;

    public $role_names;


    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return 'users';
    }

    public function attributes(): array
    {
       return [
           "email",
           "password",
           "name"
       ];


    }

}