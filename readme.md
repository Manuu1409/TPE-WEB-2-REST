 API REST para mostrar autos ford
 
Importar la base de datos desde PHPMyAdmin (o otros)  database/db_ford

Ejemplo de JSON

{
       
        "nombre": "Bronco",
        "fecha": "2020",
        "color": "Marron",
        "prioridad": "2",
        "id_categoria_fk": "1"
    }

ENDPOINTS DE LA API 

GET (FETCH ALL):http://localhost/TPE-WEB-2-REST/api/cars

GET (FETCH) : http://localhost/TPE-WEB-2-REST/api/cars/id

POST : http://localhost/TPE-WEB-2-REST/api/cars

PUT: http://localhost/TPE-WEB-2-REST/api/cars/id

DELETE:http://localhost/TPE-WEB-2-REST/api/cars/id

ASC o DESC: http://localhost/TPE-WEB-2-REST/api/cars?order=
