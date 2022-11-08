<?php

require_once './libs/Router.php'; //LIBRERÍA ROUTER
require_once './app/controllers/drivers-api.controller.php'; //CONTROLADOR API
require_once './app/controllers/auth-api.controller.php'; //AUTENTICADOR

$router = new Router();

//CRUD
$router->addRoute('drivers', 'GET', 'driversApiController', 'getDrivers'); //OBTENER TODOS LOS PILOTOS
$router->addRoute('drivers/:ID', 'GET', 'driversApiController', 'getDriver'); //OBTENER PILOTO POR ID
$router->addRoute('drivers/:ID', 'DELETE', 'driversApiController', 'deleteDriver'); //BORRAR PILOTO
$router->addRoute('drivers/:ID', 'PUT', 'driversApiController', 'updateDriver'); //ACTUALIZAR DATOS DE PILOTO
$router->addRoute('drivers', 'POST', 'driversApiController', 'insertDriver'); //CREAR NUEVO PILOTO

//AUTENTICACIÓN
$router->addRoute("auth/token", 'GET', 'authApiController', 'getToken');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']); //RUTEA
    