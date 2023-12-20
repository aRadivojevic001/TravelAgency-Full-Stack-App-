<?php

namespace app\models;
use app\core\DbModel;
use mysqli;


class RegistrationModel extends DbModel {

    public string $name;
    public string $email;
    public string $password;



    public function rules(): array
    {
       return[
           'email' => [self::RULE_EMAIL, self::RULE_EMAIL_UNIQUE],
           'name' => [self::RULE_REQUIRED],
           'password' => [self::RULE_REQUIRED],
       ];
    }

    public function registration() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->create();

        $user = new UserModel();
        $role = new RoleModel();
        $userRoles = new UserRolesModel();

        $user->mapData($user->one("email = '$this->email'"));
        $role->mapData($role->one("name = 'Applicant'"));

        $userRoles->id_user = $user->id;
        $userRoles->id_role = $role->id;

        $userRoles->create();
    }



    public function tableName()
    {
        return "users";
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