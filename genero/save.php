<?php
include("../database/db.php"); //INCLUIMOS LA BASE DE DATOS
require ('../includes/conexion.php');//INCLUIMOS LA CONEXION
if(isset($_POST['save'])){//SI SE EJECUTA
    $codigo_familia = $_POST['cod_familia'];
    $codigo_genero = $_POST['codigo_genero'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO genero (codigo_familia, codigo_genero, descripcion) VALUES ('$codigo_familia', '$codigo_genero', '$descripcion')";
    $result=mysqli_query($conn,$query);//RESULTADO QUE INDICA SI LA OPERACION FUE EXITOSA
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";//MENSAJE
        $_SESSION['message_type'] = 'danger';//COLOR
        echo "<script>window.history.go(-1)</script>";//NOS REGRESA SI ENCUENTRA UN ERROR
    }
    else{
        header("Location: genero.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>