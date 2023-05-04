<?php
    include("../database/db.php");
    require ('../includes/conexion.php');
    if(isset($_POST['save'])){
        $cedula_propietario = $_POST['cedula_propietario'];
        $historial = $_POST['historial'];
        $fecha_consulta = $_POST['fecha_consulta'];
        $codigo_vacuna = $_POST['cod_vacuna'];
        $dosis = $_POST['dosis'];
        $query = "INSERT INTO aplica (cedula_propietario, historial, codigo_vacuna, fecha_consulta, dosis)
        VALUES ('$cedula_propietario', '$historial', '$codigo_vacuna', '$fecha_consulta','$dosis');";
        $result=mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Por favor, verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: aplica.php");
            $_SESSION['message'] = "Se ingresó satisfactoriamente";
            $_SESSION['message_type'] = 'success';
        }
    }
   
?>