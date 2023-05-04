<?php
    include("../database/db.php");#incluimos la base de datos
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_consulta = $_GET['fecha'];
    $query = "DELETE FROM consulta WHERE historial = '$id' and cedula_propietario = '$cedula_propietario' and fecha_consulta = '$fecha_consulta'";
    $result = mysqli_query($conn,$query);
    if(!$result){#condicionales para mostrar mensajes bonitos.
        $_SESSION['message'] = "Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        header("Location: consulta.php");
    }
    else{
        $_SESSION['message'] = 'se removió existosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: consulta.php");
    }
?>