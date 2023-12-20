<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\AccommodationModel;
use app\models\CityModel;
use app\models\CountryModel;
use app\models\IncomeModel;
use app\models\ReservationByMonthModel;
use Exception;
use mysqli;


class AdministrationController extends Controller {

    public function index(){
        $this->view('dashboard', 'layout2', null);
    }

    public function addcountryProcess() {
        $country = new CountryModel();
        $country->mapData($this->router->request->all());
        $country->create();
        header('location:' . "/admin");
    }

    public function addcityProcess() {
        $city = new CityModel();
        $city->mapData($this->router->request->all());
        $city->create();
        header('location:' . "/admin");
    }

    public function addaccommodationProcess() {
        try {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($this->router->request->all());
            $accommodation->create();
            header('location:' . "/admin");

        }catch (Exception $e)
        {
            echo $this->view('errors', 'access', null);
        }
    }

    public function countryDelete() {
        try {
            $country = new CountryModel();
            $country->mapData($this->router->request->all());
            $country->delete("country_name = '$country->country_name'");
            header('location:' . "/admin");

        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }

    }


    public function cityDelete() {

        try {
            $city = new CityModel();
            $city->mapData($this->router->request->all());
            $city->delete("city_name = '$city->city_name'");
            header('location:' . "/admin");

        }catch (Exception $e) {
            echo $this->view('errors', 'access', null);
        }


    }


    public function accommodationDelete() {
        $accommodation = new AccommodationModel();
        $accommodation->mapData($this->router->request->all());
        $accommodation->delete("accommodation_name = '$accommodation->accommodation_name'");
        header('location:' . "/admin");
    }




    public function addAccommodationView() {
        $this->view('addAccommodation', 'dashboard', null);
    }

    public function addCountryView() {
        $this->view('addCountry', 'dashboard', null);
    }

    public function addCityView() {
        $this->view('addCity', 'dashboard', null);
    }


    public function deleteAccommodationView() {
        $this->view('deleteAccommodation', 'dashboard', null);
    }

    public function deleteCityView() {
        $this->view('deleteCity', 'dashboard', null);
    }

    public function deleteCountryView() {
        $this->view('deleteCountry', 'dashboard', null);
    }





    public function getCountriesApi() {

        $country = new CountryModel();

        $dbData = $country->countries();

        echo json_encode($dbData);


    }

    public function getReservationByMonthApi(){
        $model = new ReservationByMonthModel();
        $model->mapData($this->router->request->all());

        echo json_encode($model->getData());
    }

    public function getIncomeApi(){

        $priceFrom = $this->router->request->one('priceFrom');
        $priceTo = $this->router->request->one('priceTo');
        $model = new IncomeModel();
        $dbData = $model->getIncome($priceFrom,$priceTo);

        echo json_encode($dbData);
    }



    public function authorize()
    {
        return [
            "Admin"
        ];
    }
}