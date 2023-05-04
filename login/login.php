<?php include("../database/db.php");?>
<?php include("../include/heads.php")?>
<?php
if(isset($_POST['validar'])){
    $login = $_POST["login"];
    $password = $_POST["password"];
    $query = "SELECT * FROM asistente WHERE login = '$login' or password = '$password'";
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: ../home.php");
            }
            else{
            echo
            "<script> alert('Contraseña Incorrecta. Por favor, verifique'); </script>";
            }
    }
    else{
        echo
        "<script> alert('Usted no se ha registrado.'); </script>";
    }
}
?>
<!--Funcionamiento-->
<div class="col-md-4 mx-auto" style="width: 500px; margin-top: 70px !important;">  
    <img src="../img/IniciarSesion.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php session_unset(); } //el session_unset limpia los datos que tenemos?>
    <div class="card card-body"><!--formulario de preguntas-->
        <form action="login.php" method="POST"><!--esto se deja igual-->
            <div class="form-group"><!--nombre se queda igual-->
                <input type="text" name="login" class="form-control" placeholder="Nombre de usuario">
            </div><br><!---->
            <div class="form-group"><!--nombre se queda igual-->
                <input type="password" name="password" class="form-control" placeholder="Introduzca su contraseña">
            </div><br>           
            <div class="d-grid gap-2 col-6 mx-auto">         
                <input type="submit" value=Ingresar name="validar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                <a href="registration.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
           
            </div>
        </form>
    </div>
    
<?php include("../include/footer.php");?>