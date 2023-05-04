<?php
    include("../database/db.php");

    if(isset($_POST['save'])){
        $cedula_asistente = $_POST['cedula_usuario'];
        $cedula_propietario = $_POST['cedula_propietario'];
        $historial = $_POST['historial'];
        $fecha_cita = $_POST['fecha_cita'];
        $motivo = $_POST['motivo'];
        $query = "INSERT INTO cita (cedula_asistente, cedula_propietario, historial, fecha_cita, motivo)
        VALUES ('$cedula_asistente','$cedula_propietario','$historial','$fecha_cita','$motivo')";
        $result=mysqli_query($conn,$query);
        if($cedula_propietario != 1){?>
            <script>
                var x = confirm("El propietario no esta registrado. ¿Desea registrarlo?");
                if (x == true){
                    window.location="../propietario/propietario.php";
                }else{
                    window.history.go(-1);
                }
            </script>
        <?php }
        if($historial != 1){?>
            <script>
                var x = confirm("El historial de la mascota no esta registrado. ¿Desea registrarlo?");
                if (x == true){
                    window.location="../mascota/mascota.php";
                }else{
                    window.history.go(-1);
                }
            </script>
        <?php }
        if($fecha_cita != 1){?>
            <script>
                var x = confirm("La fecha de la cita esta erronea. ¿Desea volverlo al inicio?");
                if (x == true){
                    window.location="../cita/cita.php";
                }else{
                    window.history.go(-1);
                }
            </script>
        <?php }
        if(!$result){
            $_SESSION['message'] = "Por favor, verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: cita.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';
        }
    }
?>