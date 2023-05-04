<?php
include("../database/db.php"); //INCLUIMOS LA BASE DE DATOS
require ('../includes/conexion.php'); //INCLUIMOS LA CONEXION
if(isset($_POST['save'])){//SI SE EJECUTA
    $codigo_reino = $_POST['cod_reino'];//ALMACENAMOS EN UNA VARIABLE EL CODIGO DE REINO
    $codigo_phylum = $_POST['codigo_phylum'];//ALMACENAMOS EN UNA VARIABLE EL CODIGO DE LA CLASE
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO phylum (codigo_reino, codigo_phylum, descripcion) VALUES ('$codigo_reino', '$codigo_phylum', '$descripcion')";
    $result=mysqli_query($conn,$query);//RESULTADO QUE INDICA SI LA OPERACION FUE EXITOSA
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";//MENSAJE
        $_SESSION['message_type'] = 'danger';//COLOR
        echo "<script>window.history.go(-1)</script>";//NOS REGRESA SI ENCUENTRA UN ERROR
    }
    else{
        header("Location: phylum.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>