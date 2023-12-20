<?php

namespace app\models;

use app\core\DbModel;

class RoleModel extends DbModel
{

    public $name;
    public $id;
    public $active;

    public function tableName()
    {
        return 'roles';
    }

    public function attributes(): array
    {
       return  [
           "id",
           "name",
           "active",
       ];
    }
}