<?php
include("../database/db.php"); //INCLUIMOS LA BASE DE DATOS
require ('../includes/conexion.php');//INCLUIMOS LA CONEXION
if(isset($_POST['save'])){//SI SE EJECUTA
    $codigo_orden = $_POST['cod_orden'];
    $codigo_familia = $_POST['codigo_familia'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO familia (codigo_orden, codigo_familia, descripcion) VALUES ('$codigo_orden', '$codigo_familia', '$descripcion')";
    $result=mysqli_query($conn,$query);//RESULTADO QUE INDICA SI LA OPERACION FUE EXITOSA
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";//MENSAJE
        $_SESSION['message_type'] = 'danger';//COLOR
        echo "<script>window.history.go(-1)</script>";//NOS REGRESA SI ENCUENTRA UN ERROR
    }
    else{
        header("Location: familia.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>