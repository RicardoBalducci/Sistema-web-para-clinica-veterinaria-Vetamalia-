<?php include("../database/db.php");
$cedula_propietario='';
$cedula_asistente='';
$historial='';
$nombre_mascota='';
$fecha_nacimiento='';
$fecha_registro= '';
$sexo = '';
$codigo_especie='';
    if(isset($_GET['id'])){
        $historial = $_GET['id'];
        $query = "SELECT * FROM mascota WHERE historial=$historial";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $cedula_propietario= $row['cedula_propietario'];
            $cedula_asistente= $row['cedula_asistente'];
            $historial = $row['historial'];
            $nombre_mascota = $row['nombre_mascota'];
            $fecha_nacimiento = $row['fecha_nacimiento'];
            $fecha_registro = $row['fecha_registro'];
            $sexo = $row['sexo'];
            $codigo_especie = $row['codigo_especie'];
        }
    }
    if (isset($_POST['update'])){
        $historial = $_GET['id'];
        $nombre_mascota = $_POST['nombre_mascota'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $fecha_registro = $_POST['fecha_registro'];
        $sexo = $_POST['sexo'];
        $query = "UPDATE mascota set nombre_mascota = '$nombre_mascota', fecha_nacimiento = '$fecha_nacimiento', fecha_registro = '$fecha_registro', sexo = '$sexo' WHERE  historial= $historial";
        $result =mysqli_query($conn, $query);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        if(!$result){
            $_SESSION['message'] = "Por favor, Verifique los datos";
            $_SESSION['message_type'] = 'danger';
            echo "<script>window.history.go(-1)</script>";
        }
        else{
            header("Location: mascota.php");
            $_SESSION['message'] = "Se ingreso satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
        }
    }
?>
<?php include("../include/headers.php")?>
<div class="container p-4">
    <img src="../img/Mascota.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <p class="h7">Cédula del propietario:</p>
                    <input name="cedula_propietario" type="text" class="form-control" class="display-1"  value="<?php echo $cedula_propietario; ?>" placeholder="Ingrese cedula del propietario" aria-label="Disabled input example" disabled>
                </div><br>
                <div class="form-group">
                    <p class="h7">Cédula del asistente:</p>
                    <input name="cedula_asistente" type="text" class="form-control" class="display-1"  value="<?php echo $cedula_asistente; ?>" placeholder="Ingrese cedula del asistente" aria-label="Disabled input example" disabled>
                </div><br>
                <div class="form-group">
                    <p class="h7">Historial de la mascota:</p>
                    <input name="historial" type="text" class="form-control" class="display-1"  value="<?php echo $historial; ?>" placeholder="Ingrese Historial de la mascota" aria-label="Disabled input example" disabled>
                </div><br>
                <div class="form-group">
                    <p class="h7">Nombre de la mascota:</p>
                    <input name="nombre_mascota" type="text" class="form-control" value="<?php echo $nombre_mascota; ?>" placeholder="Ingrese el nombre de la mascota" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                </div><br>
                <div class="form-group">
                    <p class="h7">Fecha de nacimiento de la mascota:</p>
                    <input name="fecha_nacimiento" type="date" class="form-control" class="display-1"  value="<?php echo $fecha_nacimiento; ?>" placeholder="Ingrese la fecha de nacimiento">
                </div><br>
                <div class="form-group">
                    <p class="h7">Fecha de registro de la mascota:</p>
                    <input name="fecha_registro" type="date" class="form-control" class="display-1"  value="<?php echo $fecha_registro; ?>" placeholder="Ingrese la fecha de registro">
                </div><br>
                <div class="form-group">
                    <p class="h7">Sexo de la mascota:</p>
                    <select name="sexo" id="sexo">
                        <option value="Seleccione sexo">Seleccione Sexo:</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <p class="h7">Código de especie de la mascota:</p>
                    <input name="codigo_especie" type="text" class="form-control" class="display-1"  value="<?php echo $codigo_especie; ?>" placeholder="Ingrese el codigo de la especie " aria-label="Disabled input example" disabled>
                </div><br>
                <div class="form-group">
                </div><br>
                <div class="form-group">
                    <input type="submit" name="update" value="Cambiar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>
<?php
/*
cedula_propietario
cedula_asistente
historial
nombre_mascota
fecha_nacimiento
fecha_registro
codigo_especie

*/
?>





