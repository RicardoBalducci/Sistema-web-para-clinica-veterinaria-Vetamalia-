<?php
include("../database/db.php"); //INCLUIMOS LA BASE DE DATOS
require ('../includes/conexion.php');//INCLUIMOS LA CONEXION
if(isset($_POST['save'])){//SI SE EJECUTA
    $codigo_phylum = $_POST['cod_phylum'];//ALMACENAMOS EN UNA VARIABLE EL CODIGO DE LA CLASE
    $codigo_clase = $_POST['codigo_clase'];//ALMACENAMOS EL CODIGO QUE NOS DE EL PROGRAMA POR DEFECTO
    $descripcion = $_POST['descripcion'];//Y LA DESCRIPCION QUE LE INDIQUEMOS
    //EN UNA VARIABLE ALMACENAMOS LA INTRODUCCION A LA BASE DE DATOS DE CLASE DONDE SE ALMACENARAN LOS VALORES DE CODIGO_PHYLUM, CODIGO_CLASE Y DESCRIPCION
    $query = "INSERT INTO clase (codigo_phylum, codigo_clase, descripcion) VALUES ('$codigo_phylum', '$codigo_clase', '$descripcion')";
    $result=mysqli_query($conn,$query);//RESULTADO QUE INDICA SI LA OPERACION FUE EXITOSA
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";//MENSAJE
        $_SESSION['message_type'] = 'danger';//COLOR
        echo "<script>window.history.go(-1)</script>";//NOS REGRESA SI ENCUENTRA UN ERROR
    }
    else{
        header("Location: clase.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>