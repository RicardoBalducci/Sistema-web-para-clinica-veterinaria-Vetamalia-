<?php
    //incluyo la base de datos
    include("../database/db.php");
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM asistente WHERE cedula_asistente = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            header("Location: usuario.php");
        }
        else{
            $_SESSION['message'] = 'Se removió existosamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: usuario.php");
        }
    }
?>