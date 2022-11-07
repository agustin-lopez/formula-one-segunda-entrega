<?php

class apiView {

    public function response($data, $status = 200) { //RECIBE LOS DATOS Y EL ESTADO DE LA SOLICITUD

        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . "" . $this->_requestStatus($status));

        echo json_encode($data); //PASA A JSON

    }

    private function _requestStatus($code) { //RECIBE EL CÓDIGO DE ERROR (POR DEFECTO: 200)

        $status = array( //SE LE ASIGNA UN ESTADO, SEGÚN EL CÓDIGO DE ERROR

            200 => 'OK',
            300 => 'Created',
            400 => 'Bad request',
            401 => 'Not authorized',
            404 => 'Not found',
            500 => 'Internal server error'

        );

        return (isset($status[$code])) ? $status[$code] : $status[500]; //RETORNA EL ESTADO

    }
}