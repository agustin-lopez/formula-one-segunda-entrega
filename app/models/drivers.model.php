<?php

class driversModel {

    private $db;

    public function __construct() {

        $this->db = new PDO ('mysql:host=localhost;'.'dbname=formula1;charset=utf8', 'root',''); //CONEXIÓN BASE DE DATOS
    
    }

    public function getAttributes() { //DEVUELVE ATRIBUTOS

        $query = $this->db->prepare("SHOW COLUMNS FROM `drivers`");
        $query->execute();
        $attributes = $query->fetchAll(PDO::FETCH_OBJ);

        $arrayAttributes[0] = ""; //GUARDA STRING VACÍO EN EL PRIMER ÍNDICE DEL ARREGLO

        //$ATTRIBUTES CONTIENE TODA LA INFORMACIÓN DE CADA COLUMNA DE LA TABLA
        foreach ($attributes as $key => $attribute) {

            //POR CADA ATRIBUTO, SE GUARDA SOLO EL NOMBRE EN MINÚSCULAS EN EL ARREGLO $ARRAYATTRIBUTES
            $arrayAttributes[$key + 1] = strtolower($attribute->Field);

        }

        return $arrayAttributes;

    }

    function getAll($attributes, $attributesFilter, $sortby, $order, $page, $limit) { //OBTENER TODOS LOS PILOTOS

        //INICIO DE LA CONSULTA
        $sql = "SELECT * FROM drivers";

        //FILTRAR POR ATRIBUTO DE LA TABLA (COLUMNA)
        //EJEMPLO: .../API/DRIVERS?NATIONALITY=AUSTRALIAN&PODIUMS=32
        $sqlFilter = "";
        $filterValues = [];

        foreach ($attributesFilter as $key => $attribute) { //RECORRE EL ARREGLO DE FILTRO DE ATRIBUTOS

            if (!empty($attribute)) { //SI EL ATRIBUTO NO ESTÁ VACÍO

                //SE CONCATENA EL ÍNDICE + FRAGMENTO DE CONSULTA (...NATIONALITY LIKE ? AND PODIUMS LIKE ?) <-- EJEMPLO
                $sqlFilter .= "$key LIKE ? AND ";
                //SE GUARDA EL VALOR DEL ATRIBUTO EN EL OTRO ARREGLO
                $filterValues[] = "$attribute";
                /*
                FILTERVALUES {
                    [0] => "AUSTRALIAN"
                    [1] => "32""
                }
                */

            }

        }

        if (!empty($sqlFilter)) { //SI NO ESTÁ VACÍO

            //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + WHERE + LOS FILTROS (...NATIONALITY LIKE ? AND PODIUMS LIKE ?)
            //Y LE BORRA EL ÚLTIMO "AND" PARA QUE NO SE ROMPA LA CONSULTA
            $sql .= " WHERE " . rtrim($sqlFilter, " AND");

        }

        //ORDENAR POR ATRIBUTO
        if (!empty($sortby)) {

            if (array_search($sortby, $attributes) != false) {

                //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + ORDER BY (DRIVERNAME) <-- EJEMPLO
                $sql .= " ORDER BY $sortby";

            }

        } else { //POR DEFECTO SE ORDENAN POR ID

            //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + ORDER BY ID
            $sql .= " ORDER BY id";

        }

        //ORDENAR ASCENDENTE (ASC) O DESCENDENTEMENTE (DESC)
        if (!empty($order)) {

            if ($order == "desc") {

                //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + DESC
                $sql .= " DESC";

            }
            else {

                if ($order == "asc") {

                    //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + ASC
                $sql .= " ASC";

                }

            }

        }

        //PAGINACIÓN

        //SI $PAGE NO ESTÁ VACÍO, ES UN NÚMERO, ES MAYOR A CERO Y $LIMIT NO ESTÁ VACÍO, ES NUMÉRICO Y MAYOR A CERO...
        if (!empty($page) && is_numeric($page) && $page > 0 && !empty($limit) && is_numeric($limit) && $limit > 0) {

            $pos = $limit * ($page - 1);
            //SE CONCATENA LA CONSULTA (SELECT * FROM DRIVERS) + LIMIT (3 5) <-- EJEMPLO
            $sql .= " LIMIT $pos, $limit";

        }

        $query = $this->db->prepare($sql);

        if (!empty($filterValues)) {

            $query->execute($filterValues);

        }
        else {

            $query->execute();

        }


        $drivers = $query->fetchAll(PDO::FETCH_OBJ);

        return $drivers;

    }

    function get($driverID) { //OBTENER PILOTO POR ID

        $query = $this->db->prepare("select * from drivers where id = ?");
        $query->execute([$driverID]);
        $driverData = $query->fetch(PDO::FETCH_OBJ);
        return $driverData;

    }


    function delete($driverID) { //BORRAR PILOTO POR ID

        $query = $this->db->prepare("delete from drivers where id = ?");
        $query->execute([$driverID]);

    }

    function update($id, $name, $team, $nationality, $age, $victories, $podiums) { //ACTUALIZAR DATOS DE UN PILOTO

        $query = $this->db->prepare("update drivers set driverName = ?, teamID = ?, nationality = ?, age = ?, victories = ?, podiums = ? where id = ?");
        $query->execute([$name, $team, $nationality, $age, $victories, $podiums, $id]);
        
    }

    function insert($name, $team, $nationality, $age, $victories, $podiums) { //INSERTAR NUEVO PILOTO A LA BASE DE DATOS

        $query = $this->db->prepare("insert into drivers (driverName, teamID, nationality, age, victories, podiums) values (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $team, $nationality, $age, $victories, $podiums]);

        return $this->db->lastInsertId(); //DEVUELVE LA ID DE LA NUEVA INSERCIÓN

    }

}