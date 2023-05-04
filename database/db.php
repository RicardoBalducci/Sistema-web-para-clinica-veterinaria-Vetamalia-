<?php
//crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST
session_start();

/*usamos la biblioteca de mysql llamada mysqli
dentro de esta biblioteca llamamos a la funcion connect
con la que tendra los parametros para conectar la base de datos*/
$conn = mysqli_connect(//en una variable llamada con guardamos esta funcion
    'localhost',//ubicacion de la base de datos
    'root',//usuario
    '',//contraseña
    'vetamalia'//nombre de la bd a la que queremos conectarnos
);
if($conn -> connect_error){
    die("conexion fallida");
}
?>