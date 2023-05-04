<?php include("../database/db.php");
$cedula= '';
$nombre = '';
$apellido = '';
    if(isset($_GET['id'])){
        $cedula = $_GET['id'];
        $query = "SELECT * FROM persona WHERE cedula=$cedula";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $cedula = $row['cedula'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
        }
    }
    if (isset($_POST['update'])){
        $cedula= $_GET['id'];//queda igual
        $nombre= $_POST['nombre'];//queda igual
        $apellido = $_POST['apellido'];
        $query = "UPDATE persona set cedula = '$cedula',nombre = '$nombre', apellido = '$apellido' WHERE cedula=$cedula";
        mysqli_query($conn, $query);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        $_SESSION['message'] = 'Se modifico exitosamente';
        $_SESSION['message_type'] = 'success';
        header('Location: persona.php');
    }
?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
    <img src="../img/Persona.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">                    
                    <div class="form-group">
                        <p class="h7">Cédula de la persona:</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="remplace cedula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre de la persona:</p>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido de la persona:</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="remplace apellido" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br><!--cambiar apellido por costo igual en $apellido-->
                    <div class="form-group">
                        <input type="submit" name="update" value="Cambiar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>