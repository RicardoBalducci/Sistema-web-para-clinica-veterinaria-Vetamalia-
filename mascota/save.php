<?php
include("../database/db.php");
if(isset($_POST['save'])){
    $cedula1 = $_POST['cedula_propietario'];
    $cedula2 = $_POST['cedula_asistente'];
    $historial = $_POST['historial'];
    $nombre = $_POST['nombre_mascota'];
    $fecha1 = $_POST['fecha_nacimiento'];
    $fecha2 = $_POST['fecha_registro'];
    $fecha2 = $_POST['fecha_registro'];
    $sexo = $_POST['sexo'];
    $codigo = $_POST['cod_especie'];
    $query = "INSERT INTO mascota (cedula_propietario, cedula_asistente, historial, nombre_mascota, fecha_nacimiento,
    fecha_registro,sexo, codigo_especie) VALUES ('$cedula1','$cedula2','$historial','$nombre','$fecha1','$fecha2','$sexo','$codigo')";
    $result=mysqli_query($conn,$query);
    if($cedula1 != 1){?>
        <script>
            var x = confirm("El propietario no esta registrado. ¿Desea registrarlo?");
            if (x == true){
                window.location="../propietario/propietario.php";
            }else{
                window.history.go(-1);
            }
        </script>
    <?php }
    if(!$result){
        echo "<script>window.history.go(-1)</script>";
        $_SESSION['message'] = "Por favor, Verifique los datos";
        $_SESSION['message_type'] = 'danger';
    }
    else{
        header("Location: mascota.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}?>