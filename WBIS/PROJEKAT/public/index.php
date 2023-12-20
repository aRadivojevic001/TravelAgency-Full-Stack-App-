<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\AuthController;
use app\controllers\BookingController;
use app\controllers\HomeController;
use app\core\Application;


$app = new Application();

/*Home controller routes*/
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/home', [HomeController::class, 'index']);


/*Administration controller rotes*/
$app->router->get('/addcountry', [AdministrationController::class, 'addCountryView']);
$app->router->post('/addcountryProcess', [AdministrationController::class, 'addcountryProcess']);
$app->router->get('/addcity', [AdministrationController::class, 'addCityView']);
$app->router->post('/addcityProcess', [AdministrationController::class, 'addcityProcess']);
$app->router->get('/addaccommodation', [AdministrationController::class, 'addAccommodationView']);
$app->router->post('/addaccommodationProcess' ,[AdministrationController::class, 'addaccommodationProcess']);


$app->router->get('/deleteaccommodation' ,[AdministrationController::class, 'deleteAccommodationView']);
$app->router->post('/deleteaccommodationProcess' ,[AdministrationController::class, 'accommodationDelete']);

$app->router->get('/deletecity' ,[AdministrationController::class, 'deleteCityView']);
$app->router->post('/deletecityProcess' ,[AdministrationController::class, 'cityDelete']);

$app->router->get('/deletecountry' ,[AdministrationController::class, 'deleteCountryView']);
$app->router->post('/deletecountryProcess' ,[AdministrationController::class, 'countryDelete']);

$app->router->get('/dashboard', 'preview');
$app->router->get('/administration', [AdministrationController::class, 'index']);

$app->router->get('/api/graph/countries' , [AdministrationController::class, 'getCountriesApi']);
$app->router->get('/api/reservationMonth', [AdministrationController::class, 'getReservationByMonthApi']);
$app->router->get('/api/income', [AdministrationController::class, 'getIncomeApi']);



/*Booking controller routes*/
$app->router->get('/countries', [BookingController::class, 'index']);
$app->router->get('/api/country/rows/json', [BookingController::class, 'rows']);
$app->router->get('/api/city', [BookingController::class, 'CityRows']);
$app->router->get('/api/destination', [BookingController::class, 'DestinationRows']);
$app->router->post('/reservationProcess', [BookingController::class, 'reservationProcess']);
$app->router->post('/contactProcess', [BookingController::class, 'contactProcess']);




/*Auth controller routes*/
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/registration', [AuthController::class, 'registration']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/accessDenied', [AuthController::class, 'accessDenied']);
$app->router->post('/registrationProcess', [AuthController::class, 'registrationProcess']);
$app->router->post('/loginProcess', [AuthController::class, 'loginProcess']);





$app->run();