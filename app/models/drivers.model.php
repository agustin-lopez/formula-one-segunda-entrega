<?php

class driversModel {

    private $db;

    public function __construct() {

        $this->db = new PDO ('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root',''); //CONEXIÓN BASE DE DATOS
    
    }

    function getAll() { //OBTENER TODOS LOS PILOTOS

        $query = $this->db->prepare("select * from drivers");
        $query->execute();
        $allDrivers = $query->fetchAll(PDO::FETCH_OBJ);
        return $allDrivers;

    }

    function get($driverID) { //OBTENER PILOTO POR ID

        $query = $this->db->prepare("select * from drivers where id = ?");
        $query->execute([$driverID]);
        $driverData = $query->fetch(PDO::FETCH_OBJ);
        return $driverData;

    }


    function delete($driverID) { //BORRAR PILOTO POR ID

        $query = $this->db->prepare("delete from drivers where id = ?");
        $query->execute([$driverID]);

    }

    function update($id, $name, $team, $nationality, $age, $victories, $podiums) { //ACTUALIZAR DATOS DE UN PILOTO

        $query = $this->db->prepare("update drivers set driverName = ?, teamID = ?, nationality = ?, age = ?, victories = ?, podiums = ? where id = ?");
        $query->execute([$name, $team, $nationality, $age, $victories, $podiums, $id]);
        
    }

    function insert($name, $team, $nationality, $age, $victories, $podiums) { //INSERTAR NUEVO PILOTO A LA BASE DE DATOS

        $query = $this->db->prepare("insert into drivers (driverName, teamID, nationality, age, victories, podiums) values (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $team, $nationality, $age, $victories, $podiums]);

        return $this->db->lastInsertId(); //DEVUELVE LA ID DE LA NUEVA INSERCIÓN

    }

}