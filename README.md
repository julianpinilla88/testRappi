# testRappi
prueba cube summation para rappi

Ejemplo
2
4 5
UPDATE 2 2 2 4
QUERY 1 1 1 3 3 3
UPDATE 1 1 1 23
QUERY 2 2 2 4 4 4
QUERY 1 1 1 3 3 3
2 4
UPDATE 2 2 2 1
QUERY 1 1 1 1 1 1
QUERY 1 1 1 2 2 2
QUERY 2 2 2 2 2 2

1. Capas de aplicacion

codeigniter es  un framework php que  usa el patron de diseño MVC con el fin de separar la funcinalidad
de aplicacion en sus difertentes capas. estas se mencionan a continuacion

VISTA: es la presentacion del aplicativo, para este caso se desarrollo utilizando bootstrap y html

CONTROLLER: esta es la capa de negocio donde se encuentran los controladores  que son los encargados de llevar la 
comunicacion entre el modelo y la vista. esta capa fue desarrollada en PHP

MODELO: Esta es la capa que contiene  el mamejo de los datos como por ejemplo la ejecucion de un CRUD y esta ejecuta una solicitud realizada desde el controlador

2. Responsabilidad de las clases

clase: index.php : esta clase es con la que inicia la prueba y redirecciona a la clase cubeSummation.php
clase: cubeSummation.php: esta clase es la encargada de solicitar los datos de entrada de la prueba
clase: cubeSummationController: esta clase es la encargada de realizar la validacion de la informacion y la ejecucion de los casos de entrada (UPDATEY QUERY) y finalmente redirecciona la respuesta a la clase errores.php o result.php dependiendo de las acciones realiadas
clase: errores.php: clase encargada de visualizar los errores de la ejecucion
clase: result.php: clase encargada de visualzar los resultados de la prueba

3. Componentes usuados

bootstrap http://getbootstrap.com/

4. framework

codeigniter: https://www.codeigniter.com/

