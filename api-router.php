<?php
require_once './libs/router.php';
require_once './app/controllers/cars-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('cars', 'GET', 'CarsApiController', 'getCars');
$router->addRoute('cars/:ID', 'GET', 'CarsApiController', 'getCar');
$router->addRoute('cars/:ID', 'DELETE', 'CarsApiController', 'deleteCar');
$router->addRoute('cars', 'POST', 'CarsApiController', 'insertCar'); 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
