# -- API RESTFUL DE PILOTOS DE FORMULA 1 --

![Logo F1](https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/F1.svg/2560px-F1.svg.png)

API con pilotos e información básica actual de Formula 1.

Para su funcionamiento, se debe importar la base de datos ubicada en *db/formula1.sql*

**GENERAR TOKEN PARA AUTENTICACIÓN**: .../api/auth/token (BASIC)

**ENDPOINT**: .../api/(RECURSO)

**RECURSO**: drivers

**EJEMPLOS DE USO**:

[GET] ```.../api/drivers``` (accede a un listado de todos los pilotos)

[GET] ```.../api/drivers/5``` (accede al piloto con la ID 5)

[POST] ```.../api/drivers/``` (lee el contenido del body y agrega un nuevo piloto - REQUIERE AUTENTICACIÓN)

[PUT] ```.../api/drivers/11``` (lee el contenido del body y actualiza los datos del piloto seleccionado - REQUIERE AUTENTICACIÓN)

[DELETE] ```.../api/drivers/12``` (borra al piloto con la ID 5 - REQUIERE AUTENTICACIÓN)

**FORMATO POST/PUT**: Para hacer una inserción (POST) o una modificación (PUT), se deben ingresar los datos a como se muestran a continuación.
```
{
    "driverName": "NAME",
    "teamID": 1,
    "nationality": "NACIONALITY",
    "age": 1,
    "victories": 1,
    "podiums": 1
}
```
Consultar por las IDs de los equipos en la tabla "teams" de la base de datos.

## FILTRAR Y ORDENAR CONTENIDO

**ASCENDENTEMENTE**: ```.../api/drivers?order=asc```

**DESCENDENTEMENTE**: ```.../api/drivers?order=desc```

**ORDENAR POR ATRIBUTO**: ```.../api/drivers?sortby=(ATRIBUTO)```

Los atributos válidos son:
    * drivername (nombre del piloto)
    * teamid (ID de la escudería a la que pertenece)
    * nationality (nacionalidad)
    * age (edad)
    * victories (victorias)
    * podiums (podios)

Se puede ordenar por atributo ascendente o descendentemente agregando %order=(asc/desc) al final de la url, como se mostró previamente

Ejemplos:

```.../api/drivers?sortby=drivername``` (ordena los pilotos ascendentemente por su nombre)

```.../api/drivers?sortby=victories&order=desc``` (ordena los pilotos descendentemente por cantidad de victorias)

```.../api/drivers?sortby=age&order=asc``` (ordena los pilotos ascendentemente por su edad)

**BUSCAR POR ATRIBUTO**: ```.../api/drivers?(ATRIBUTO)=(VALOR)```

Se puede colocar el valor entre "%" para indicar que el atributo debe contener el valor ingresado, pero no necesariamente tiene que ser igual.

Ejemplos:

```.../api/drivers?drivername=Lando Norris``` (busca entre los pilotos, al que tenga un nombre igual a "Lando Norris")

```.../api/drivers?drivername=%norris%``` (busca al piloto cuyo nombre contenga "norris")

```.../api/drivers?age=%3``` (busca a los pilotos cuya edad contenga un 3)

```.../api/drivers?nationality=British&order=desc``` (busca los pitolos con nacionalidad británica, y los ordena descendientementep por ID)
