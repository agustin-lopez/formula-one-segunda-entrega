<?php

//SE INCLUYEN MODELOS, VISTAS Y HELPER
require_once './app/models/drivers.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';

function base64url_encode($data) {

    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');

}

class AuthApiController {

    private $model;
    private $view;
    private $authHelper;
    private $db;

    private $data;

    public function __construct() {

        $this->view = new apiView();
        $this->authHelper = new authApiHelper();
        $this->db = new PDO('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root', '');
        
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

            if ($basic[0] != "Basic") {

                $this->view->response('Authentication must be Basic', 401);
                return;

            }

        }
        
        //VALIDACIÓN DE USUARIO Y CONTRASEÑA
        $userPassword = base64_decode($basic[1]); //(USER:PASSWORD)
        $userPassword = explode(":", $userpass);
        $user = $userpassword[0]; //OBTENGO USUARIO INGRESADO
        $password = $userpassword[1]; //OBTENGO CONTRASEÑA INGRESADA

        var_dump($user);

        if ($this->validateUserPassword($user, $password)) { //SI LA RESPUESTA ES TRUE

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

    public function validateUserPassword($user, $password) { //COMPRUEBA USUARIO Y CONTRASEÑA DE LA BASE DE DATOS

        $query = $this->db->prepare("select * from users where email = ?");
        $query->execute([$user]);
        $userPassword = $query->fetch(PDO::FETCH_OBJ);

        //if ($user && password_verify($password, $user->password))

        if (($userPassword->email) && password_verify($password, $userPassword->password)) { //SI LOS DATOS COINCIDEN, DEVUELVE TRUE

            return true;

        }
        else {

            return false;

        }

    }

}
