<?php

class AuthApiHelper {

    function getToken() { //OBTIENE EL TOKEN

        $auth = $this->getAuthHeader(); //[BEARER HEADER.PAYLOAD.SIGNATURE] <- FORMATO
        $auth = explode(" ", $auth);

        var_dump($auth);

        if ($auth[0] != "Bearer" || count($auth) != 2) { //¿BASIC O BEARER? NO SÉ POR QUÉ USA LOS DOS... (NO ANDA)

            return array();

        }
        else {

            //DIVIDE EL CONTENIDO DEL TOKEN
            var_dump($auth[1]);
            $token = explode(".", $auth[1]); //ERROR ACÁ...........................................!
            $header = $token[0];
            $payload = $token[1];
            $signature = $token[2];

            $new_signature = hash_hmac('SHA256', "$header.$payload", "supersecret", true);
            $new_signature = base64url_encode($new_signature);

            $payload = json_decode(base64_decode($payload));

            //SI NO COINCIDEN LAS FIRMAS O EL TIEMPO YA EXPIRÓ...
            if (($signature != $new_signature) || (!isset($payload->exp) || $payload->exp<time())) {

                return array();

            }

            return $payload;

        }
        

    }

    function getAuthHeader() { //OBTIENE EL HEADER

        $header = "";

        if(isset($_SERVER['HTTP_AUTHORIZATION'])) {

            $header = $_SERVER['HTTP_AUTHORIZATION'];

        }
        else {

            if(isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {

                $header = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];

            }

        }
        
        return $header;

    }

    function isLoggedIn() {

        $payload = $this->getToken();

        var_dump($payload); //ARREGLO VACÍO GODDAMN

        if (isset($payload->id)) {

            return true;

        }
        else {

            return false;

        }

    }

}
