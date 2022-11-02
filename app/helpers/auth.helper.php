<?php

class authHelper { //ESTE HELPER VERIFICA QUE HAYA UNA SESIÓN INICIADA

    public function checkLogin() {

        if (isset($_SESSION['IS_LOGGED'])) {

            return true;
            die();

        }
        else {

            //SI NO HAY SESIÓN INICIADA, TE MANDA AL HOME CON UN MENSAJE DE ERROR
            header('Location: ' . BASE_URL . 'notauthorized');
            die();

        }

    } 

}
