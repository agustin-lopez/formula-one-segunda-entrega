<?php
    require_once './libs/Router.php';
    require_once './app/controllers/drivers.api.controller.php'; //CREAR ESTE ARCHIVO
    require_once './app/controllers/teams.api.controller.php'; //CREAR ESTE ARCHIVO

    $router = new Router();

    //EJEMPLO DE TAREAS
    $router->addRoute('drivers', 'GET', 'driversApiController', 'getDrivers');
    $router->addRoute('drivers', 'POST', 'driversApiController', 'createDriver');
    $router->addRoute('drivers/:ID', 'GET', 'driversApiController', 'getSelectedDriver');

    //RUTEA
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
    