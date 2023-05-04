<?php
include("../database/db.php"); //INCLUIMOS LA BASE DE DATOS
require ('../includes/conexion.php');//INCLUIMOS LA CONEXION
if(isset($_POST['save'])){//SI SE EJECUTA
    $codigo_clase = $_POST['cod_clase'];
    $codigo_orden = $_POST['codigo_orden'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO orden (codigo_clase, codigo_orden, descripcion) VALUES ('$codigo_clase', '$codigo_orden', '$descripcion')";
    $result=mysqli_query($conn,$query);//RESULTADO QUE INDICA SI LA OPERACION FUE EXITOSA
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";//MENSAJE
        $_SESSION['message_type'] = 'danger';//COLOR
        echo "<script>window.history.go(-1)</script>";//NOS REGRESA SI ENCUENTRA UN ERROR
    }
    else{
        header("Location: orden.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>