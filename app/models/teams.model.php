<?php

    class teamsModel {

        private $db;

        public function __construct() {

            $this->db = new PDO ('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root',''); //CONEXIÓN BASE DE DATOS
        
        }

        function getAllTeams() {

            $query = $this->db->prepare("select * from teams"); //PIDE TODAS LAS ESCUDERÍAS DE LA TABLA
            $query->execute(); //SE EJECUTA LA CONSULTA
            $teamsList = $query->fetchAll(PDO::FETCH_OBJ);
            return $teamsList; //DEVUELVE LA LISTA

        }

        function getSelectedTeam ($teamID) {
            
            $query = $this->db->prepare("select * from teams where id = ?"); //PIDE LA ESCUDERÍA DE LA ID RECIBIDA
            $query->execute([$teamID]); //SE EJECUTA LA CONSULTA
            $teamData = $query->fetch(PDO::FETCH_OBJ);
            return $teamData; //DEVUELVE LOS DATOS DE LA ESCUDERÍA
            
        }

        function deleteTeamByID($teamID) {

            $teamData = $this->getSelectedTeam($teamID); //ANTES DE BORRAR EL EQUIPO, PIDE SUS DATOS A LA DB
            $this->deleteImage($teamData->image); //BORRA LA IMAGEN GUARDADA EN EL SERVIDOR
            $query = $this->db->prepare("delete from teams where id = ?"); //BORRA LA ESCUDERÍA DE LA DB
            $query->execute([$teamID]);

        }

        function updateTeam($id, $name, $nationality, $totalVictories, $totalPodiums, $image = null) {

            if ($image) { //SI SE SUBIÓ UNA IMAGEN NUEVA... (NOT NULL)

                $teamData = $this->getSelectedTeam($id); //ANTES DE ACTUALIZAR, PIDO LOS DATOS ACTUALES DE LA ESCUDERÍA
                $this->deleteImage($teamData->image); //BORRO LA FOTO QUE ESTÁ GUARDADA ACTUALMENTE
                $imagePath = $this->uploadImage($image); //GUARDO LA FOTO NUEVA EN EL SERVIDOR

                //SE MANDAN LOS DATOS Y LA IMAGEN NUEVA
                $query = $this->db->prepare("update teams set teamName = ?, teamNationality = ?, totalVictories = ?, totalPodiums = ?, image = ? where id = ?");
                $query->execute([$name, $nationality, $totalVictories, $totalPodiums, $imagePath, $id]);

            }
            else { //SI NO SE SUBIÓ UNA IMAGEN NUEVA... (NULL)

                //SE MANDAN LOS DATOS SIN LA IMAGEN
                $query = $this->db->prepare("update teams set teamName = ?, teamNationality = ?, totalVictories = ?, totalPodiums = ? where id = ?");
                $query->execute([$name, $nationality, $totalVictories, $totalPodiums, $id]);

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

        function addTeamToDB($name, $nationality, $totalVictories, $totalPodiums, $image = null) {
            
            if ($image) { //SI HAY IMAGEN (NOT NULL)

                //LA SUBE AL SERVIDOR
                $imagePath = $this->uploadImage($image);

            }
            else {

                $imagePath = null; //SI NO SE SUBIÓ UNA IMAGEN, SE MANDA NULL A LA BASE DE DATOS

            }

            $query = $this->db->prepare("insert into teams (teamName, teamNationality, totalVictories, totalPodiums, image) values (?, ?, ?, ?, ?)");
            $query->execute([$name, $nationality, $totalVictories, $totalPodiums, $imagePath]);

        }


    }