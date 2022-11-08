<?php

    //SE INCLUYEN LOS MODELOS Y VISTAS
    require_once './app/models/drivers.model.php';
    require_once './app/views/api.view.php';

    class driversApiController {

        private $model;
        private $view;
        private $data;

        public function __construct() {

            $this->model = new driversModel();
            $this->view = new apiView();
            $this->data = file_get_contents("php://input"); //PARA LEER EL BODY DEL REQUEST

        }

        private function getData() {

            return json_decode($this->data); //AGARRA LOS DATOS DE LA URL (CREO)

        }

        public function getDrivers($params = null) { //OBTENER TODOS LOS PILOTOS

            $drivers = $this->model->getAll();
            $this->view->response($drivers);

        }

        public function getDriver($params = null) { //OBTENER UN PILOTO POR ID

            $id = $params[':ID']; //SACO EL ID DE LOS PARÁMETROS
            $driver = $this->model->get($id);
    
            if (!$driver) { //SI NO EXISTE, MUESTRA ERROR 404 (NOT FOUND)

                $this->view->response("Driver $id not found", 404);

            }
            else { //SI EXISTE, LO MANDA DE FORMA NORMAL

                $this->view->response($driver);

            }

        }

        public function deleteDriver($params = null) { //BORRAR PILOTO

            $id = $params[':ID']; //AGARRA LA ID DE LOS PARÁMETROS
    
            $driver = $this->model->get($id);

            if ($driver) { //SI EXISTE ESE PILOTO

                $this->model->delete($id);
                $this->view->response("Driver $id deleted succefully", 200);

            }
            else {

                //SI NO EXISTE, MUESTRA 404 (NOT FOUND)
                $this->view->response("Driver $id not found", 404);

            }
        }
    

        public function insertDriver($params = null) { //INSERTAR NUEVO PILOTO

            $driver = $this->getData();

            //SI ALGUNO DE LOS DATOS ESTÁ VACÍO, MANDA ERROR 400 (BAD REQUEST)
            if (empty($driver->driverName) || empty($driver->teamID) || empty($driver->nationality) || empty($driver->age) || empty($driver->victories) || empty($driver->podiums)) {

                $this->view->response("Missing data", 400);

            }
            else {

                //INSERTA EL NUEVO PILOTO Y GUARDA SU ID EN LA VARIABLE $ID
                $id = $this->model->insert($driver->driverName, $driver->teamID, $driver->nationality, $driver->age, $driver->victories, $driver->podiums);
                $driver = $this->model->get($id); //MUESTRA EL NUEVO PILOTO INSERTADO
                $this->view->response($driver, 201); //MANDA 201 (CREATED)

            }

        }
    
    }