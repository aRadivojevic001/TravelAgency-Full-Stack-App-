<?php

namespace app\controllers;

use app\core\Application;
use app\core\Constants;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;

class AuthController extends Controller
{
    public function login() {

        if(Application::$app->session->get(Constants::$USER_SESSION) !== false) {
            header("location:" . "/home");
        }

        return $this->view('login', 'travel', null);
    }

    public function accessDenied() {


        return $this->view('accessDenied', 'access', null);
    }




    public function loginProcess() {

        $login = new LoginModel();
        $login->mapData($this->router->request->all());
        $login->validate();


        if($login->errors) {
            Application::$app->session->setFlesh(Constants::$FLASH_MESSAGE_ERROR, 'Login failed');
            return $this->view('login', 'travel', $login);
        }

        if($login->login()){

            Application::$app->session->set(Constants::$USER_SESSION, $login->email);
            $this->getRoles();
            header("location:" . "/home");

        }


        return $this->view('login', 'travel', $login);

    }


    public function logout() {
        Application::$app->session->remove(Constants::$USER_SESSION);
        Application::$app->session->remove(Constants::$ROLE_SESSION);
        header('location:' . "/login");
    }



//Promenio
    public function registration() {
        if(Application::$app->session->get(Constants::$USER_SESSION)) {
            header('location:' . "/home");
        }

        return $this->view('registration', 'travel', null);

    }

    public function registrationProcess() {

        $registration = new RegistrationModel();
        $registration->mapData($this->router->request->all());
        $registration->validate();


        if($registration->errors) {
            Application::$app->session->setFlesh(Constants::$FLASH_MESSAGE_ERROR, 'Registration failed');
            return $this->view('registration', 'travel', $registration);
        }

        $registration->registration();

        Application::$app->session->setFlesh(Constants::$FLASH_MESSAGE_SUCCESS, 'Registration success!');

        return $this->view('login', 'travel', null);

    }


    public function authorize()
    {
        return[];
    }

}