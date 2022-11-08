# -- API RESTFUL DE PILOTOS DE FORMULA 1 --

![Logo F1](https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/F1.svg/2560px-F1.svg.png)

API con pilotos e información básica actual de Formula 1.

Para su funcionamiento, se debe importar la base de datos ubicada en *db/formula1.sql*

## POSTMAN
**ENDPOINT**: http://localhost/FACULTAD/formula-one-segunda-entrega/api/(RECURSO)

**RECURSO**: drivers

**Ejemplos de uso**:

.../api/drivers (accede a un listado de todos los pilotos)

.../api/drivers/5 (accede al piloto con la ID 5)

**FORMATO POST/PUT**:
```
{
    "driverName": "NAME",
    "teamID": 1,
    "nationality":   "NACIONALITY",
    "age": 01,
    "victories": 01,
    "podiums": 01
}
```


