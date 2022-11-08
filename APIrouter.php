<?php
    require_once './libs/Router.php'; //INCLUYO LA LIBRERÍA DEL ROUTER
    require_once './app/controllers/drivers-api.controller.php'; //<-- CREAR ESTE ARCHIVO

    $router = new Router();

    $router->addRoute('drivers', 'GET', 'driversApiController', 'getDrivers'); //OBTENER TODOS LOS PILOTOS
    $router->addRoute('drivers/:ID', 'GET', 'driversApiController', 'getDriver'); //OBTENER PILOTO POR ID
    $router->addRoute('drivers/:ID', 'DELETE', 'driversApiController', 'deleteDriver'); //BORRAR PILOTO
    $router->addRoute('drivers', 'POST', 'driversApiController', 'insertDriver'); //CREAR NUEVO PILOTO

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']); //RUTEA
    