<?php

class AuthApiModel {
	
	private $db;
	
	public function __construct() {
		
		$this->db = new PDO('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root', '');
		
	}
	
	public function validateUserPassword($user, $password) {
		
        $query = $this->db->prepare("select * from users where email = ?");
		$query->execute([$user]);
        $userPassword = $query->fetch(PDO::FETCH_OBJ);

        if (!$userPassword) {

            return false;
            
        }

        if (($userPassword->email == $user) && password_verify($password, $userPassword->password)) { //SI LOS DATOS COINCIDEN, DEVUELVE TRUE

            return true;

        }
        else {

            return false;

        }
		
	}
	
}