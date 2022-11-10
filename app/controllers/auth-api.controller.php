<?php

//SE INCLUYEN MODELOS, VISTAS Y HELPER
require_once './app/models/drivers.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';
require_once './app/models/auth-api.model.php';

function base64url_encode($data) {

    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');

}

class AuthApiController {

    private $model;
    private $view;
    private $authHelper;
    private $data;

    public function __construct() {

		$this->model = new authApiModel;
        $this->view = new apiView();
        $this->authHelper = new authApiHelper();
        $this->data = file_get_contents("php://input");

    }

    private function getData() {

        return json_decode($this->data);

    }

    public function getToken($params = null) { //OBTENER TOKEN [BASIC BASE64(USER:PASSWORD)] <- FORMATO

        $basic = $this->authHelper->getAuthHeader(); //OBTIENE EL HEADER
        
        if (empty($basic)) { //SI $BASIC ESTÁ VACÍO, MANDA 401 (UNAUTHORIZED)

            $this->view->response('Unauthorized', 401);
            return;

        }
        else {

            $basic = explode(" ",$basic);

            if ($basic[0] != "Basic") { //SI NO ES BASIC TIRA 401 (UNAUTHORIZED)

                $this->view->response('Authentication must be Basic', 401);
                return;

            }

        }
        
        //VALIDACIÓN DE USUARIO Y CONTRASEÑA
        $userPassword = base64_decode($basic[1]); //(USER:PASSWORD)
        $userPassword = explode(":", $userPassword);
        $user = $userPassword[0]; //OBTENGO USUARIO INGRESADO
        $password = $userPassword[1]; //OBTENGO CONTRASEÑA INGRESADA

        if ($this->model->validateUserPassword($user, $password)) { //SI LA RESPUESTA ES TRUE (LOS DATOS COINCIDEN)

            //SE CREA UN TOKEN
            $header = array(

                'alg' => 'HS256',
                'typ' => 'JWT'

            );

            $payload = array(

                'id' => 1,
                'name' => "$user",
                'exp' => time()+3600 //TIEMPO DE VIDA DEL TOKEN

            );

            $header = base64url_encode(json_encode($header)); //SE PASA EL HEADER A JSON
            $payload = base64url_encode(json_encode($payload)); //SE PASA EL PAYLOAD A JSON
            $signature = hash_hmac('SHA256', "$header.$payload", "supersecret", true); //SE CREA LA FIRMA
            $signature = base64url_encode($signature); //SE CODIFICA LA FIRMA
            $token = "$header.$payload.$signature"; //SE CREA EL TOKEN CON TODO LO ANTERIOR

            $this->view->response($token);

        }
        else { //SI LA RESPUESTA ES FALSE (DATOS ERRÓNEOS), MANDA 401 (UNAUTHORIZED)

            $this->view->response('Unauthorized', 401);

        }
           
    }

}
