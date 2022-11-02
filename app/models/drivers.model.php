<?php

class driversModel {

    private $db;

    public function __construct() {

        $this->db = new PDO ('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root',''); //CONEXIÓN BASE DE DATOS
    
    }

    public function getTeamDrivers($team) {

        $query = $this->db->prepare("select * from drivers where teamID = ?");
        $query->execute([$team]);
        $driversData = $query->fetchAll(PDO::FETCH_OBJ);
        return $driversData;

    }

    function getAllDrivers() {

        $query = $this->db->prepare("select * from drivers");
        $query->execute();
        $allDrivers = $query->fetchAll(PDO::FETCH_OBJ);
        return $allDrivers;

    }

    function getSelectedDriver($driverID) {

        $query = $this->db->prepare("select * from drivers where id = ?");
        $query->execute([$driverID]);
        $driverData = $query->fetch(PDO::FETCH_OBJ);
        return $driverData;

    }


    function deleteDriverByID($driverID) {

        $driverData = $this->getSelectedDriver($driverID); //ANTES DE BORRAR EL EQUIPO, PIDE SUS DATOS A LA DB
        $this->deleteImage($driverData->image); //BORRA LA IMAGEN GUARDADA EN EL SERVIDOR
        $query = $this->db->prepare("delete from drivers where id = ?"); //BORRAR
        $query->execute([$driverID]);

    }

    function updateDriver($id, $name, $team, $nationality, $age, $victories, $podiums, $image) {

        if ($image) { //SI SE SUBIÓ UNA IMAGEN NUEVA... (NOT NULL)

            $driverData = $this->getSelectedDriver($id); //ANTES DE ACTUALIZAR, PIDO LOS DATOS ACTUALES DE LA ESCUDERÍA
            $this->deleteImage($driverData->image); //BORRO LA FOTO QUE ESTÁ GUARDADA ACTUALMENTE
            $imagePath = $this->uploadImage($image); //GUARDO LA FOTO NUEVA EN EL SERVIDOR

            //SE MANDAN LOS DATOS Y LA IMAGEN NUEVA
            $query = $this->db->prepare("update drivers set driverName = ?, teamID = ?, nationality = ?, age = ?, victories = ?, podiums = ?, image = ? where id = ?"); //SE ACTUALIZAN LOS DATOS
            $query->execute([$name, $team, $nationality, $age, $victories, $podiums, $imagePath, $id]);

        }
        else { //SI NO SE SUBIÓ UNA IMAGEN NUEVA... (NULL)

            //SE MANDAN LOS DATOS SIN LA IMAGEN
            $query = $this->db->prepare("update drivers set driverName = ?, teamID = ?, nationality = ?, age = ?, victories = ?, podiums = ? where id = ?"); //SE ACTUALIZAN LOS DATOS
            $query->execute([$name, $team, $nationality, $age, $victories, $podiums, $id]);

        }
        
    }

    private function uploadImage($image) {

        $imagePath = "./images/uploaded/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); //LE DA UN NOMBRE ÚNICO
        move_uploaded_file($image, $imagePath); //LO MUEVE AL SERVIDOR
        return $imagePath;

    }

    private function deleteImage($image) {

        unlink($image); //SE BORRA LA IMÁGEN DEL SERVIDOR (FUNCIONA :P)

    }

    function addDriverToDB($name, $team, $nationality, $age, $victories, $podiums, $image) {

        if ($image) { //SI HAY IMAGEN (NOT NULL)

            //LA SUBE AL SERVIDOR
            $imagePath = $this->uploadImage($image);

        }
        else {

            $imagePath = null; //SI NO SE SUBIÓ UNA IMAGEN, SE MANDA NULL A LA BASE DE DATOS

        }

        $query = $this->db->prepare("insert into drivers (driverName, teamID, nationality, age, victories, podiums, image) values (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $team, $nationality, $age, $victories, $podiums, $imagePath]);

    }

}