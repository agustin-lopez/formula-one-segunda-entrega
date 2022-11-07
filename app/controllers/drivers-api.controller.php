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

            return json_decode($this->data);

        }

        public function getDrivers($params = null) { //OBTENER TODOS LOS PILOTOS

            $drivers = $this->model->getAll();
            $this->view->response($drivers);

        }

        public function getDriver($params = null) { //OBTENER UN PILOTO POR ID

            $id = $params[':ID']; //SACO EL ID DE LOS PARÁMETROS
            $driver = $this->model->get($driver);
    
            if (!$driver) { //SI NO EXISTE, MUESTRA ERROR 404 (NOT FOUND)

                $this->view->response("We couldn't find driver $id", 404);

            }
            else { //SI EXISTE, LO MANDA DE FORMA NORMAL

                $this->view->response($driver);

            }

        }

        public function insertDriver($params = null) { //INSERTAR NUEVO PILOTO

            $driver = $this->getData();
    
            //SI ALGUNO DE LOS DATOS ESTÁ VACÍO, MANDA ERROR 400 (BAD REQUEST)
            if (empty($driver->name) || empty($driver->team) || empty($driver->nationality)) || empty($driver->age) || empty($driver->victories) || empty($driver->podiums) {

                $this->view->response("Missing data", 400);

            }
            else {

                //INSERTA EL NUEVO PILOTO Y GUARDA SU ID EN LA VARIABLE $ID
                $id = $this->model->insert($driver->name, $driver->team, $driver->nationality, $driver->age, $driver->victories, $driver->podiums);
                $driver = $this->model->get($id); //MUESTRA EL NUEVO PILOTO INSERTADO
                $this->view->response($task, 201); //MANDA 201 (CREATED)

            }

        }
    
    }