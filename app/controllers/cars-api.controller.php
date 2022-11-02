<?php
require_once './app/models/cars-api.model.php';
require_once './app/views/cars-api.view.php';

class CarsApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new CarsModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCars($params = null) {
        $cars = $this->model->getAllCars();
        $this->view->response($cars);
    }

    public function getCar($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $car = $this->model->getCar($id);

        // si no existe devuelvo 404
        if ($car)
            $this->view->response($car);
        else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function deleteCar($params = null) {
        $id = $params[':ID'];

        $car = $this->model->getCar($id);
        if ($car) {
            $this->model->deleteCar($id);
            $this->view->response($car);
        } else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function insertCar($params = null) {
        $car = $this->getData();

        if (empty($car->nombre) || empty($car->fecha) || empty($car->color) || empty($car->prioridad)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertCar($car->nombre, $car->fecha, $car->color, $car->prioridad);
            $car = $this->model->getCar($id);
            $this->view->response($car, 201);
        }
    }

}
