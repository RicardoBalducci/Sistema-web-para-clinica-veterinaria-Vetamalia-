<?php
    include("../database/db.php");#incluimos la base de datos
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_consulta = $_GET['fecha'];
    $codigo = $_GET['codigo'];
    $query = "DELETE FROM receta WHERE historial = '$id' and cedula_propietario = '$cedula_propietario' and fecha_consulta = '$fecha_consulta' and codigo_medicina = '$codigo'";
    $result = mysqli_query($conn,$query);
    if(!$result){#condicionales para mostrar mensajes bonitos.
        $_SESSION['message'] = "Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        header("Location: receta.php");
    }
    else{
        $_SESSION['message'] = 'se removió existosamente';
        $_SESSION['message_type'] = 'success';
        header("Location: receta.php");
    }
?>