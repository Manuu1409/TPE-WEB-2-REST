<?php
require_once './libs/router.php';
require_once './app/controllers/cars-api.controller.php';

$router = new Router();

//tabla
$router->addRoute('cars', 'GET', 'CarsApiController', 'getCars');
$router->addRoute('cars/:ID', 'GET', 'CarsApiController', 'getCar');
$router->addRoute('cars/:ID', 'DELETE', 'CarsApiController', 'deleteCar');
$router->addRoute('cars', 'POST', 'CarsApiController', 'insertCar');
$router->addRoute('cars/:ID', 'PUT', 'CarsApiController', 'editCar');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
