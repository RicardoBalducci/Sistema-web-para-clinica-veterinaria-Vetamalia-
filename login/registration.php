<?php
include("../include/heads.php");
include("../database/db.php");
if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $status = $_POST['status'];
    if($password == $confirmpassword){
        $query = "INSERT INTO persona (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
        $querys = "INSERT INTO asistente (cedula_asistente, login, password, status) VALUES ('$cedula', '$login', '$password', '$status')";
        $result=mysqli_query($conn,$query);
        $resultado = mysqli_query($conn,$querys);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        echo
        "<script> alert('error verifique de nuevo'); </script>";
    }
    if(!$resultado){
        echo
        "<script> alert('error verifique de nuevo'); </script>";
    }
    header("Location: login.php");

    //con esto creamos un mensaje que se mostrara en pantalla cuando se guarde de manera exitosa
    $_SESSION['message'] = "Tarea guardada satisfactoriamente";
    $_SESSION['message_type'] = 'success';//esto es un color
    echo
    "<script> alert('Exitosa'); </script>";
    }else{
        echo
        "<script> alert('no coinciden los password'); </script>";
    }
}
?>

<!--Funcionamiento-->
<div class="col-md-4 mx-auto" style="width: 700px; margin-top: 40px !important; margin-bottom: 100px !important;">
        <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>   
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php session_unset(); } //el session_unset limpia los datos que tenemos?>
    <div class="card card-body form-control-sm"><!--formulario de preguntas-->
        <form action="registration.php" method="POST"><!--esto se deja igual-->
            <div class="form-group"><!--aqui lo unico a modificar es cedula por codigo-->
                <input type="number" name="cedula"class="form-control" required  placeholder="Cédula">
            </div><br><!--y el tipo que es texto-->
            <div class="row">
             <div class="col">
                <input type="text" name="nombre"class="form-control" required  placeholder="Nombre">
            </div><br><!--y el tipo que es texto-->
            <div class="col">
                <input type="text" name="apellido" class="form-control" required  placeholder="Apellido">
            </div>
            </div><br><!--y el tipo que es texto-->
            <div class="form-group"><!--nombre se queda igual-->
                <input type="text" name="login" class="form-control" required placeholder="Nombre de usuario">
            </div><br><!---->
            <div class="form-group"><!--=-->
                <input type="password" name="password" class="form-control" required placeholder="Contraseña">
            </div><br><!---->
            <div class="form-group"><!--=-->
                <input type="password" name="confirmpassword" class="form-control" required placeholder="Confirme su contraseña">
            </div><br><!---->
            <div class="form-group"><!---->
                    <div>Seleccione  :
                    <select name="status" id="status">
                        <option value="Seleccione sexo">Seleccione status</option>
                        <option value="activo">activo</option>
                    </select></div>
                    </div><br>
            <div class="form-group">
            <div class="d-grid gap-2 col-6 mx-auto"> 
                <input type="submit" value="Registrarse" name="save" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                <a href="login.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Ingresar</a>       
            </div>

        </form>
    </div>
</div>

<?php include("../include/footer.php");?>