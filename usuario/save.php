<?php
include("../database/db.php");
if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $status = $_POST['status'];
    if($password == $confirmpassword){
        $query = "INSERT INTO persona (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
        $querys = "INSERT INTO asistente (cedula_asistente, login, password, status) VALUES ('$cedula', '$login', '$password', '$status')";
        $result=mysqli_query($conn,$query);
        $resultado = mysqli_query($conn,$querys);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        echo
        "<script> alert('Error verifique de nuevo'); </script>";
    }
    if(!$resultado){
        echo
        "<script> alert('Error verifique de nuevo'); </script>";
    }
    header("Location: usuario.php");

    //con esto creamos un mensaje que se mostrara en pantalla cuando se guarde de manera exitosa
    $_SESSION['message'] = "Tarea guardada satisfactoriamente";
    $_SESSION['message_type'] = 'success';//esto es un color
    echo
    "<script> alert('Exitosa'); </script>";
    }else{
        echo
        "<script> alert('No coinciden los password'); </script>";
    }
}
?>