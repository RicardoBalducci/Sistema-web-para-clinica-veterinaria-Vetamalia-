<?php
    include("../database/db.php");
    if(isset($_POST['save'])){
        $cedula_propietario = $_POST['cedula_propietario'];
        $historial = $_POST['historial'];
        $cedula_medico = $_POST['cedula_medico'];
        $fecha = $_POST['fecha_consulta'];
        $motivo = $_POST['motivo'];
        $rxm = $_POST['rxm'];
        $pxm = $_POST['pxm'];
        $temperatura = $_POST['temperatura'];
        $query = "INSERT INTO consulta(cedula_propietario, historial, cedula_medico, fecha_consulta, motivo, rxm, pxm, temperatura)
        VALUES ('$cedula_propietario','$historial','$cedula_medico','$fecha','$motivo', '$rxm', '$pxm', '$temperatura')";
        $result=mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Por favor, Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: consulta.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
    }

    /*
    cedula_propietario	historial	cedula_medico	fecha_consulta	motivo	rxm	pxm	temperatura

    
     $cedula1 = $_POST['cedula_propietario'];
        $cedula2 = $_POST['cedula_medico'];
        $historial = $_POST['historial'];
        $fecha = $_POST['fecha_consulta'];
        $motivo = $_POST['motivo'];
        $rxm = $_POST['rxm'];
        $pxm = $_POST['pxm'];
        $temperatura = $_POST['temperatura'];
        $query = "INSERT INTO consulta (cedula_propietario, historial, cedula_medico, fecha_consulta, motivo, rxm, pxm, temperatura)
        VALUES (' $cedula1','$historial','$cedula2','$fecha','$motivo','$rxm','$pxm ','$temperatura')";
        $result=mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Por favor, Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: consulta.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
        
        */
?>