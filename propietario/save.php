<?php
//incluimos desde db.php
include("../database/db.php");
//si el metodo Post coincide con save
if(isset($_POST['save'])){
    //lo que recibas a traves del metodo post sera parte de
    //cambiamos por REVISAR
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $query = "INSERT INTO persona (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
    $querys = "INSERT INTO propietario (cedula_propietario, direccion, telefono) VALUES ('$cedula', '$direccion', '$telefono')";
    $result=mysqli_query($conn,$query);
    $resultado = mysqli_query($conn,$querys);
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        echo "<script>window.history.go(-1)</script>";
    }
    else{
        header("Location: propietario.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
    if(!$resultado){
        $_SESSION['message'] = "Por favor, Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        echo "<script>window.history.go(-1)</script>";
    }else{
        header("Location: propietario.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}
?>