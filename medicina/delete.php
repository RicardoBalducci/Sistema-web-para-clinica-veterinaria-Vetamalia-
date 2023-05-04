<?php
    //incluyo la base de datos
    include("../database/db.php");
    //si existe el el id
    if(isset($_GET['id'])){
        //lo almaceno en una variable llamada id
        $id = $_GET['id'];
        //creo una variable llamada query y le indico que elimine el id
        $query = "DELETE FROM medicina WHERE codigo_medicina = '$id'";//aqui cambiamos y queda
        //$query = "DELETE FROM vacuna WHERE codigo_vacuna = $id";
        //posteriormete llamo a mysqli
        //combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultado
        $result = mysqli_query($conn,$query);
        //si no envia un resultado se manda un error
        if(!$result){
            //y se indica que no hay conexion
            die("query failed");
        }

        //esto permite manejar mensajes los cuales e mostraran en index al inicio. estos sirven para saber como esta la tarea
        $_SESSION['message'] = 'se removio existosamente';//dejar igual esta parta
        $_SESSION['message_type'] = 'danger';
        header("Location: medicina.php");//dejar igual
    }
?>