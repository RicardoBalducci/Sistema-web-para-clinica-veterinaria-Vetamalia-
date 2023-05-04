<?php
include("../database/db.php");//incluir base de datos
$cedula='';
$nombre='';
$apellido='';
$login='';
$password='';
$status = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM asistente WHERE cedula_asistente=$id";
        $querys = "SELECT * FROM persona WHERE cedula=$id";
        $result = mysqli_query($conn, $query);
        $resultado = mysqli_query($conn, $querys);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $cedula = $row['cedula_asistente'];
            $login = $row['login'];
            $password = $row['password'];
            $status = $row['status'];
        }
        if (mysqli_num_rows($resultado) == 1) {
            $cedula = $row['cedula_asistente'];
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
        }
    }
    if (isset($_POST['update'])){
        $cedula= $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $status = $_POST['status'];
        if($password == $confirmpassword){
            $query = "UPDATE asistente set login = '$login', password = '$password', status = '$status'";
            $querys = "UPDATE persona set nombre = '$nombre', apellido = '$apellido' WHERE cedula=$cedula";
            mysqli_query($conn, $query);
            mysqli_query($conn, $querys);
            if(!$result){
                echo
                "<script> alert('error verifique de nuevo'); </script>";
            }
            if(!$resultado){
                echo
                "<script> alert('error verifique de nuevo'); </script>";
            }
            header("Location: usuario.php");
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

<?php include('../include/headers.php'); ?>

<div class="container p-4">
        <img src="../img/Usuario.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                        <p class="h7">Cédula del usuario:</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="remplace cédula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                            <p class="h7">Nombre del usuario:</p>
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido del usuario:</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="remplace apellido" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre de usuario:</p>
                        <input name="login" type="text" class="form-control" value="<?php echo $login; ?>" placeholder="remplace el nombre de usuario" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Contraseña:</p>
                        <input name="password" type="password" class="form-control" value="<?php echo $password; ?>" placeholder="remplace contraseña" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Confirmar contraseña:</p>
                        <input name="confirmpassword" type="password" class="form-control" placeholder="confirme contraseña" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group"><!---->
                    <div>Seleccione  :
                    <select name="status" id="status">
                        <option value="Seleccione sexo">Seleccione status</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select></div>
                    </div><br>
                    <div class="form-group">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('../include/footer.php'); ?>