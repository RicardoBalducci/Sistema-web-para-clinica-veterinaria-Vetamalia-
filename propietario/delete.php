<?php
    include("../database/db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM propietario WHERE cedula_propietario = '$id'";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        $_SESSION['message'] = 'se removio existosamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: propietario.php");
    }
?>