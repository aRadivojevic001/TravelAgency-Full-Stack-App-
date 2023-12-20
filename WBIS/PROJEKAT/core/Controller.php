<?php

namespace app\core;


abstract class Controller {

    public Router $router;

    public function __construct() {
        $this->router = new Router();
        $this->checkRoles();
    }

    abstract public function authorize();


    public function view($view, $layout, $params) {
        return $this->router->view($view, $layout, $params);
    }

    public function partialView($view, $params) {
        return $this->router->partialView($view, $params);
    }

    public function checkRoles() {

        $roles = $this->authorize();
        if($roles === []) return;


        $access = false;
        $email = Application::$app->session->get(Constants::$USER_SESSION);
        $userRoles = $this->getRoles();
        if($email !== false) {
            foreach ($roles as $role) {
                foreach ($userRoles as $userRole) {
                    if($role === $userRole) {
                        $access = true;
                    }
                }
            }

            if(!$access) {
                header('location:' . '/accessDenied');
            }
            return;
        }

        header("location:" . "/login");

    }

    public function getRoles() : array {

        if(Application::$app->session->get(Constants::$ROLE_SESSION) !== false) {
            return Application::$app->session->get(Constants::$ROLE_SESSION);
        }


        $connection = new DbConnection();
        $email = Application::$app->session->get(Constants::$USER_SESSION);
        $resultFromDb = $connection->con()->query("
        SELECT roles.name FROM users INNER JOIN user_roles ON users.id = user_roles.id_user
        INNER JOIN roles ON user_roles.id_role = roles.id
        WHERE users.email = '$email' AND roles.active = true;");

        $resultArray= [];

//        echo '<pre>';
//        var_dump($resultFromDb->fetch_assoc());
//        echo '</pre>';
//        exit;

        while ($result = $resultFromDb->fetch_assoc()) {
            $resultArray[] = $result['name'];
        }

        Application::$app->session->set(Constants::$ROLE_SESSION, $resultArray);
        return $resultArray;

    }

}