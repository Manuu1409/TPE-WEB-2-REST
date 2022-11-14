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
        
        $this->data = file_get_contents("php://input"); // lee el body del request
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCars() {
        if (isset($_GET ['sort']) && isset($_GET ['order'])) {
            if(($_GET ['sort']=="fecha") || ($_GET ['sort']=="FECHA")) {
                if (($_GET['order']=="asc") || ($_GET['order']=="ASC")) {
                    $cars = $this->model->Upward();

                }
                elseif (($_GET ['order']=="desc") || ($_GET ['order']=="DESC") ) {
                    $cars = $this->model->Falling(); 
                }
            }
        }
        else {
        $cars = $this->model->getAllCars();    
     }
      $this->view->response($cars);
    }

    public function getCar($params = null) {
        
        $id = $params[':ID']; // obtengo el id del arreglo de params
        $car = $this->model->getCar($id);

        if ($car) { // si no existe devuelvo 404 error
            $this->view->response($car);
        }
        else {
            $this->view->response("La tarea con el id=$id no existe", 404);
        }
    }

    public function insertCar($params = null) {
        $car = $this->getData();

        if (empty($car->nombre) || empty($car->fecha) || empty($car->color) || empty($car->prioridad)  ||empty($car->id_categoria_fk)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertCar($car->nombre, $car->fecha, $car->color, $car->prioridad, $car->id_categoria_fk);
            $car = $this->model->getCar($id);
            $this->view->response($car, 201);
        }
    }

    public function editCar ($params = null) {
        $id = $params [':ID'];
        $car = $this->model->getCar($id);
        $Newcar = $this->getData();
        
        if($car) {
            $this->model->editCar($Newcar->nombre, $Newcar->fecha, $Newcar->color, $Newcar->prioridad,$Newcar->id_categoria_fk, $id);
            $this->view->response("El auto se modifico exitosamente", 200);
        }
        else {
            $this->view->response("El auto con la id=$id no existe", 404);
        }
    }

   

    public function deleteCar($params = null) {

        $id = $params[':ID'];

        $car = $this->model->getCar($id);
        if ($car) {
            $this->model->deleteCar($id);
            $this->view->response("El auto se borro exitosamente", 200);
            $this->view->response($car);
        } 
        else { 
            $this->view->response("El auto con el id=$id no existe", 404);
        }
    }
}
