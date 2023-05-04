<?php
    include("../database/db.php");
    if(isset($_POST['save'])){
        $codigo_reino = $_POST['codigo_reino'];
        $descripcion = $_POST['descripcion'];
        $query = "INSERT INTO reino (codigo_reino, descripcion) VALUES ('$codigo_reino', '$descripcion')";
        $result=mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Por favor, Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: reino.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
    }

?>