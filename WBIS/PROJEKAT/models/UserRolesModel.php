<?php

namespace app\models;

use app\core\DbModel;

class UserRolesModel extends DbModel
{
    public $id;
    public $id_role;
    public $id_user;

    public function tableName()
    {
        return "user_roles";
    }

    public function attributes(): array
    {
        return [
            "id_role",
            "id_user"
        ];
    }
}