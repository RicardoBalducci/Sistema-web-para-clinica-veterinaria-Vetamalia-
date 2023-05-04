<?php
    include("../database/db.php");
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_cita = $_GET['fecha'];
    $query = "DELETE FROM cita WHERE historial = '$id' and cedula_propietario = '$cedula_propietario' and fecha_cita = '$fecha_cita'";
    $result = mysqli_query($conn,$query);
    if(!$result){#condicionales para mostrar mensajes bonitos.
        $_SESSION['message'] = "Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        header("Location: cita.php");
    }
    else{
        $_SESSION['message'] = 'se removió existosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: cita.php");
    }
?>