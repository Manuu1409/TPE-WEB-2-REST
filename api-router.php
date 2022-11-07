<?php
require_once './libs/router.php';
require_once './app/controllers/cars-api.controller.php';

//crea el router
$router = new Router();

//tabla de ruteo
$router->addRoute('cars', 'GET', 'CarsApiController', 'getCars');
$router->addRoute('cars/:ID', 'GET', 'CarsApiController', 'getCar');
$router->addRoute('cars/:ID', 'DELETE', 'CarsApiController', 'deleteCar');
$router->addRoute('cars', 'POST', 'CarsApiController', 'insertCar');
$router->addRoute('cars/:ID', 'UPDATE', 'CarsApiController', 'editCar');


// ejecuta la ruta
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
