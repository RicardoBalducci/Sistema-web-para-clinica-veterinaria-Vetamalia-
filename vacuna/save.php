
<?php
//incluimos desde db.php
include("../database/db.php");

//si el metodo Post coincide con save
if(isset($_POST['save'])){
    $codigo = $_POST['codigo_vacuna'];
    $nombre = $_POST['nombre_vacuna'];
    $costo = $_POST['costo'];
    $query = "INSERT INTO vacuna (codigo_vacuna, nombre_vacuna, costo) VALUES ('$codigo', '$nombre', '$costo')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        $_SESSION['message'] = "Por favor, Verifique los datos";
        $_SESSION['message_type'] = 'danger';
        echo "<script>window.history.go(-1)</script>";
    }
    else{
        header("Location: vacuna.php");
        $_SESSION['message'] = "Se ingreso satisfactoriamente";
        $_SESSION['message_type'] = 'success';//esto es un color
    }
}

/*hab */

?>