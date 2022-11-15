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

GET (FETCH ALL):http://localhost/TPE-WEB-2-REST/api/cars  (trae todos los autos de la tabla)

GET (FETCH) : http://localhost/TPE-WEB-2-REST/api/cars/id  (trae un solo auto solicitado por el id)

POST : http://localhost/TPE-WEB-2-REST/api/cars  (crea un nuevo auto en la base de datos)

PUT: http://localhost/TPE-WEB-2-REST/api/cars/id  (edita un auto por su id)

DELETE:http://localhost/TPE-WEB-2-REST/api/cars/id  (borra un auto por su id)

ASC o DESC: http://localhost/TPE-WEB-2-REST/api/cars?order=   (trae todos los autos ASCENDENTEMENTE o DESCENDENTEMENTE)
