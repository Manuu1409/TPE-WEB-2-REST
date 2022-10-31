<?php

class CarsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ford;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM autos");
        $query->execute();

        // 3. obtengo los resultados
        $cars = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $cars;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM autos WHERE id = ?");
        $query->execute([$id]);
        $car = $query->fetch(PDO::FETCH_OBJ);
        
        return $car;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function insert($name, $date, $colour, $priority) {
        $query = $this->db->prepare("INSERT INTO autos (nombre, fecha, color, prioridad) VALUES (?, ?, ?, ?)");
        $query->execute([$name, $date, $colour, $priority]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
     */
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM autos WHERE id = ?');
        $query->execute([$id]);
    }

}
