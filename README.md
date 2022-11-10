# -- API RESTFUL DE PILOTOS DE FORMULA 1 --

![Logo F1](https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/F1.svg/2560px-F1.svg.png)

API con pilotos e información básica actual de Formula 1.

Para su funcionamiento, se debe importar la base de datos ubicada en *db/formula1.sql*

**GENERAR TOKEN PARA AUTENTICACIÓN**: .../api/auth/token (BASIC)

**ENDPOINT**: .../api/(RECURSO)

**RECURSO**: drivers

**Ejemplos de uso**:

[GET] .../api/drivers (accede a un listado de todos los pilotos)

[GET] .../api/drivers/5 (accede al piloto con la ID 5)

[DELETE] .../api/drivers/12 (borra al piloto con la ID 5, requiere autenticación)

**FORMATO POST/PUT**: Para hacer una inserción (POST) o una modificación (PUT), se deben ingresar los datos de forma similar a como se muestra a continuación.
```
{
    "driverName": "NAME",   *[nombre del piloto]*
    "teamID": 1,   *[ID del equipo al que pertenece (ver base de datos)]*
    "nationality":   "NACIONALITY", *[nacionalidad]*
    "age": 01,   *[edad]*
    "victories": 01,   *[victorias]*
    "podiums": 01   *[podios]*
}
```
Consultar por las IDs de los equipos en la tabla "teams" de la base de datos.

##ORDENAR CONTENIDO

**ASCENDENTEMENTE**: #...