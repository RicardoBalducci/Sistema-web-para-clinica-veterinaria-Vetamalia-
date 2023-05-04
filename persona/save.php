<?php
    include("../database/db.php");
    if(isset($_POST['save'])){
        //lo que recibas a traves del metodo post sera parte de
        //cambiamos por
        $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
        $nombre = $_POST['nombre'];//queda igual
        $apellido = $_POST['apellido'];//costo = $_POST['costo']
        $query = "INSERT INTO persona (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
        $result=mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['message'] = "Por favor, Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: persona.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
    }

/*
$q = "SELECT * FROM persona WHERE cedula = '$cedula'";
        $resultado = $conn->query($q);
        if($resultado){
            header("Location: ../persona.php");
            $_SESSION['message'] = "La cedula ya existe, por favor verifique";
            $_SESSION['message_type'] = 'danger';
        }elseif(!$resultado){
            header("Location: ../persona.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
        if(isset($_POST['cedula'])){
            $q = "SELECT * FROM persona WHERE cedula = '$cedula'";
            $resultado = $conn->query($q);
            if($resultado){
                header("Location: ../persona.php");
                $_SESSION['message'] = "La cedula ya existe, por favor verifique";
                $_SESSION['message_type'] = 'danger';
            }
        }
        }

        


*/
?>