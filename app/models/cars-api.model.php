<?php

class CarsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ford;charset=utf8', 'root', '');
    }

    function getAllCars() {  //trae todos los autos

        $query = $this->db->prepare("SELECT * FROM autos");
        $query->execute();

        $cars = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $cars;
    }

    function getCar($id) { //trae un auto por su id

        $query = $this->db->prepare("SELECT * FROM autos WHERE id = ?");  
        $query->execute([$id]);
        $car = $query->fetch(PDO::FETCH_OBJ);
        
        return $car;
    }
    function Upward() {  //ascendente 

        $query = $this->db->prepare("SELECT * FROM autos ORDER BY nombre ASC");  
        $query->execute();
        $car = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $car;
    }
    
    function Falling() {   //descendente 

        $query = $this->db->prepare("SELECT * FROM autos ORDER BY nombre DESC");  
        $query->execute();
        $car = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $car;
    }

    function insertCar($name, $date, $colour, $priority, $id_categoria_fk) {    //agrega auto

        $query = $this->db->prepare("INSERT INTO autos (nombre, fecha, color, prioridad, id_categoria_fK) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$name, $date, $colour, $priority, $id_categoria_fk]);

        return $this->db->lastInsertId();
    }

    function editCar($name, $date, $colour, $priority, $id_categoria_fk, $id) {  //update al item

        $query = $this->db->prepare("UPDATE autos SET nombre = ?, fecha = ?, color = ?, prioridad = ?, id_categoria_fk = ? WHERE id = ?");
        $query->execute([$name, $date, $colour, $priority,$id_categoria_fk, $id]);
    }

   
    function deleteCar($id) {   //elimina auto por id
        
        $query = $this->db->prepare('DELETE FROM autos WHERE id = ?');
        $query->execute([$id]);
    }

}
