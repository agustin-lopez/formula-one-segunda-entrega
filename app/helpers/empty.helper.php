<?php

class emptyHelper { //ESTE HELPER VERIFICA QUE UN ARREGLO TRAIDO DE LA BASE DATOS NO ESTÉ VACÍO (BOOL: FALSE)

    public function checkEmpty($content) {

        if (!($content)) {

             //SI EL USUARIO INTENTA PEDIR UN EQUIPO/ESCUDERÍA QUE NO EXISTE, TE MANDA A LA PÁGINA DE INICIO
            header('Location: ' . BASE_URL . 'notfound');
            die();

        }

    } 

}
