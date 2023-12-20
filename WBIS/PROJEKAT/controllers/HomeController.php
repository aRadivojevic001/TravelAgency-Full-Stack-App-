<?php

namespace app\controllers;
use app\core\Controller;
use app\models\ListProductModel;

class HomeController extends Controller
{

    public function index() {
        $this->view('home', 'homepage', null);
    }



    public function authorize()
    {
        return[];
    }
}