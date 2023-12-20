<?php

namespace app\controllers;

use app\core\Application;
use app\core\Constants;
use app\core\Controller;
use app\models\AccommodationModel;
use app\models\ContactModel;
use app\models\CountryModel;
use app\models\ListAccommodationModel;
use app\models\ListCityModel;
use app\models\ListCountryModel;
use app\models\ReservationModel;

class BookingController extends Controller
{

    public function CityRows() {
        if(isset($_GET['id'])){
            $id = (int)($_GET['id']);
            $model =  new ListCityModel();
            $model->mapData($this->router->request->all());
            $result = $model->searchData($id);
            echo $this->view('CityRows', 'travel', $result);
        }

    }

    public function DestinationRows() {
        if(isset($_GET['id'])){
            $id = (int)($_GET['id']);
            $model =  new ListAccommodationModel();
            $model->mapData($this->router->request->all());
            $result = $model->searchData($id);
            echo $this->view('HotelRows', 'travel', $result);
        }

    }


    public function index() {
        $this->view('country', 'travel', null);
    }



    public function rows() {
        $model =  new ListCountryModel();
        $model->mapData($this->router->request->all());
        $result = $model->searchData();
        echo $this->partialView('bookingRows', $result);

    }

    public function reservationProcess() {
        $reservation = new ReservationModel();
        $reservation->mapData($this->router->request->all());
        $reservation->validate();
        $accommodation = new AccommodationModel();
        $dbresult = $accommodation->db->con()->query("SELECT price_per_night FROM accommodation WHERE accommodation.id = $reservation->accomodation_id");
        $result = $dbresult->fetch_assoc();
        $reservation->price_per_night = $result['price_per_night'];
        $reservation->phone_number = (string)$reservation->phone_number;
        $reservation->create();
        header('location:' . "/home");
    }


    public function contactProcess() {
        $contact = new ContactModel();
        $contact->mapData($this->router->request->all());
        $contact->create();
        Application::$app->session->setFlesh(Constants::$FLASH_MESSAGE_CONTACT, 'The message has been sent');
        $this->view('home', 'homepage', null);
    }




    public function authorize()
    {
       return[];
    }
}