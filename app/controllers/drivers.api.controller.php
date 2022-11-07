<?php

    //SE INCLUYEN LOS MODELOS Y VISTAS
    require_once './app/models/drivers.model.php';
    require_once './app/views/api.view.php';

    class driversApiController {

        private $model;
        private $view;
        private $data;

        public function __construct(){
            $this->model= new driversModel();
            $this->view= new apiView();
            $this->data= file_get_contents("php://input");
        }

        private function getData(){
            return json_decode($this->data);
        }

        public function getTask($params=null){
            $task=$this->model->getAllDrivers()();
            $this->view->response($task);
        }




    }