<?php
    include("../database/db.php");//llamado a la base de datos
    if(isset($_GET['id'])){//comprobamos que exista
        $id = $_GET['id'];
        $query = "DELETE FROM medico WHERE cedula_medico = '$id'";//eliminamos de la base de datos
        $result = mysqli_query($conn,$query);
        //si no envia un resultado se manda un error
        if(!$result){
            die("query failed");//si hay error muestra
        }
        $_SESSION['message'] = 'se removio existosamente';//manda mensaje exitoso
        $_SESSION['message_type'] = 'danger';
        header("Location: medico.php");//devuelve al punto de origen
    }
?>