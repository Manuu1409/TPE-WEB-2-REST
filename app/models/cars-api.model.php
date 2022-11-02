<?php

class CarsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ford;charset=utf8', 'root', '');
    }

    
    public function getAllCars() {

      $query = $this->db->prepare("SELECT * FROM autos ORDER BY fecha ASC");
      $query->execute();

        $cars = $query->fetchAll(PDO::FETCH_OBJ); // arreglo
        
        return $cars;
    }

    public function getCar($id) {
        $query = $this->db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);
        $car = $query->fetch(PDO::FETCH_OBJ);
        
        return $car;
    }

    public function insertCar($name, $date, $colour, $priority, $id_categoria_fk) {    //agrega auto
        $query = $this->db->prepare("INSERT INTO autos (nombre, fecha, color, prioridad, id_categoria_fk	) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$name, $date, $colour, $priority, $id_categoria_fk]);

        return $this->db->lastInsertId();
    }

   
    function deleteCar($id) {   //elimina auto por id
        $query = $this->db->prepare('DELETE FROM autos WHERE id = ?');
        $query->execute([$id]);
    }

}
