# -- API RESTFUL DE PILOTOS DE FORMULA 1 --

API con los pilotos actuales de Formula 1.

Para su funcionamiento, se debe importar la base de datos ubicada en db/formula1.sql

## POSTMAN
*ENDPOINT*: http://localhost/FACULTAD/formula-one-segunda-entrega/api/

*RECURSO*: drivers

*FORMATO POST*:
{
    "driverName": "NAME",
    "teamID": 1,
    "nationality": "NACIONALITY",
    "age": 01,
    "victories": 01,
    "podiums": 01,
}
