<?php
    //incluyo la base de datos
    include("../database/db.php");
    //si existe el el id
    if(isset($_GET['id'])){
        //lo almaceno en una variable llamada id
        $id = $_GET['id'];
        //creo una variable llamada query y le indico que elimine el id
        $query = "DELETE FROM orden WHERE codigo_orden= $id";//aqui cambiamos y queda
        //posteriormete llamo a mysqli
        //combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultado
        $result = mysqli_query($conn,$query);
        //si no envia un resultado se manda un error
        if(!$result){
            //y se indica que no hay conexion
            die("query failed");
        }
        $_SESSION['message'] = 'se removio existosamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: orden.php");
    }
?>