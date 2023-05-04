
<?php
//incluimos desde db.php
include("../database/db.php");

//si el metodo Post coincide con save
if(isset($_POST['save'])){
    //lo que recibas a traves del metodo post sera parte de
    //cambiamos por
    $codigo = $_POST['codigo_medicina'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre_medicina'];//queda igual
    $costo = $_POST['costo'];//costo = $_POST['costo']
    //esto quiere decir, inserta dentro de la tabla persona, (cedula, nombre, apellido) y los valores son (cedula, nombre, apellido)
    $query = "INSERT INTO medicina (codigo_medicina, nombre_medicina, costo) VALUES ('$codigo', '$nombre', '$costo')";
    //$query = "INSERT INTO vacuna (codigo_vacuna, nombre, costo) VALUES ('$codigo', '$nombre', '$costo')";
    //al hacer esto, nos devuelve un resultado
    $result=mysqli_query($conn,$query);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        echo "<script>window.history.go(-1)</script>";
    }
    else{
        header("Location: medicina.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}

/*hab */

?>