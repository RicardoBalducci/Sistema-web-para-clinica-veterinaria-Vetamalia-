<?php include("../database/db.php");
$cedula= '';
$nombre = '';
$apellido = '';
$direccion = '';//colocarmos igual
$telefono = '';//$costo = ''
    //si existe dentro de get id
    if(isset($_GET['id'])){
        $id = $_GET['id'];//se queda igual
        //$query = "SELECT * FROM vacuna WHERE vacuna=$id";
        $query = "SELECT * FROM propietario WHERE cedula_propietario=$id";
        $querys = "SELECT * FROM persona WHERE cedula=$id";
        $result = mysqli_query($conn, $query);
        $resultado = mysqli_query($conn, $querys);
        //si el mysqli Retorna el número de filas del resultado es == 1
        if (mysqli_num_rows($result) == 1) {
            //las filas
            $row = mysqli_fetch_array($result);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
            $cedula = $row['cedula_propietario'];//
            $direccion = $row['direccion'];//queda igual
            $telefono = $row['telefono'];//$costo= = $row['costo'];
        }
        if (mysqli_num_rows($resultado) == 1) {
            //las filas
            $cedula = $row['cedula_propietario'];//
            $row = mysqli_fetch_array($resultado);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
            $nombre = $row['nombre'];//queda igual
            $apellido = $row['apellido'];//$costo= = $row['costo'];
        }
    }
    //si encontramos usando el metodo post el editar
    if (isset($_POST['update'])){
        $cedula= $_GET['id'];//queda igual
        $direccion= $_POST['direccion'];//queda igual
        $telefono = $_POST['telefono'];//$vacuna = $_POST['vacuna'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        //$query = "UPDATE vacuna set direccion = '$direccion', costo = '$costo' WHERE cedula=$id";
        $query = "UPDATE propietario set direccion = '$direccion', telefono = '$telefono' WHERE cedula_propietario=$cedula";
        $querys = "UPDATE persona set nombre = '$nombre', apellido = '$apellido' WHERE cedula=$cedula";
        mysqli_query($conn, $query);
        mysqli_query($conn, $querys);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        $_SESSION['message'] = 'Se modifico exitosamente';
        $_SESSION['message_type'] = 'success';
        header('Location: propietario.php');
    }
?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
    <img src="../img/Propietario.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
            <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <p class="h7">Cédula del propietario</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="Remplace cédula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre del propietario</p>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Remplace Nombre" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido del propietario</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Remplace apellido" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Dirección del propietario</p>
                        <input name="direccion" rows="2" class="form-control" value="<?php echo $direccion; ?>" placeholder="Ingrese su dirección">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Número de teléfono</p>
                        <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Remplace teléfono" onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br><!--cambiar telefono por costo igual en $telefono-->
                    <div class="form-group">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>
