<?php include("../database/db.php");
$cedula = '';
$nombre = '';
$apellido = '';
$colegiatura = '';
$titulo = '';
if(isset($_GET['id'])){
    $cedula = $_GET['id'];//se queda igual
    //$query = "SELECT * FROM vacuna WHERE vacuna=$id";
    $query = "SELECT * FROM medico WHERE cedula_medico=$cedula";
    $querys = "SELECT * FROM persona WHERE cedula=$cedula";
    $result = mysqli_query($conn, $query);
    $resultado = mysqli_query($conn, $querys);
    //si el mysqli Retorna el número de filas del resultado es == 1
    if (mysqli_num_rows($resultado) == 1) {
        //las filas
        $row = mysqli_fetch_array($resultado);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
        $cedula = $row['cedula'];
        $nombre = $row['nombre'];//queda igual
        $apellido = $row['apellido'];//$costo= = $row['costo'];
    }
    if (mysqli_num_rows($result) == 1) {
        //las filas
        $row = mysqli_fetch_array($result);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
        $colegiatura = $row['colegiatura'];//queda igual
        $titulo = $row['titulo'];//llamamos a una funcion que nos permita guardar en una variable el valor
    }
    if (isset($_POST['update'])){
        $id = $_GET['id'];//queda igual
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $colegiatura= $_POST['colegiatura'];//queda igual
        $titulo = $_POST['titulo'];//$vacuna = $_POST['vacuna'];
        //$query = "UPDATE vacuna set direccion = '$direccion', costo = '$costo' WHERE cedula=$id";
        $query = "UPDATE medico set colegiatura = '$colegiatura', titulo = '$titulo' WHERE cedula_medico=$id";
        $querys = "UPDATE persona set nombre = '$nombre', apellido = '$apellido' WHERE cedula=$id";
        mysqli_query($conn, $query);
        mysqli_query($conn, $querys);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        $_SESSION['message'] = 'Se modifico exitosamente';
        $_SESSION['message_type'] = 'success';
        header('Location: medico.php');
    }
}
?>
<?php include("../include/headers.php")?><!--incluimos el header-->
<div class="container p-4">
    <img src="../img/Medico.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <p class="h7">Cédula del médico:</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="Remplace Clase" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre del médico:</p>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido del médico:</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="remplace apellido" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Número de colegiatura:</p>
                        <input name="colegiatura" type="number" class="form-control" value="<?php echo $colegiatura; ?>" placeholder="remplace colegiatura" onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Título:</p>
                        <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="remplace titulo" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br><!--cambiar telefono por costo igual en $telefono-->
                    <div class="form-group">
                        <input type="submit" name="update" value="Cambiar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>