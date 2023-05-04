<?php
    include("../database/db.php");#incluimos la base de datos
    if(isset($_GET['id'])){#verificamos si existe el id
        $historial = $_GET['id'];
        $query = "DELETE FROM mascota WHERE historial = '$historial'";#usando comando DELETE lo eliminamos de la base de datos
        $result = mysqli_query($conn,$query);
        if(!$result){#condicionales para mostrar mensajes bonitos.
            $_SESSION['message'] = "Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            header("Location: mascota.php");
        }
        else{
            $_SESSION['message'] = 'se removio existosamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: mascota.php");
        }
    }
?>