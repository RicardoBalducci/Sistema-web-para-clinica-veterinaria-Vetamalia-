<?php include("../database/db.php");

if (isset($_GET['id']))
{
    $cedula_propietario='';
    $fecha_consulta= '';
    $codigo_medicina = '';
    $tiempo = '';
    $cantidad = '';

    //SELECCIONAMOS TODOS LOS VALORES Y LOS LLENAMOS
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_consulta = $_GET['fecha'];
    $codigo_medicina = $_GET['codigo'];
    $query = "SELECT * FROM receta WHERE historial = '$id' and cedula_propietario = '$cedula_propietario'
    and fecha_consulta = '$fecha_consulta' and codigo_medicina = '$codigo_medicina'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $cedula_propietario= $row['cedula_propietario'];
        $historial = $row['historial'];
        $fecha_consulta = $row['fecha_consulta'];
        $codigo_medicina = $row['codigo_medicina'];
        $cantidad = $row['cantidad'];
        $tiempo = $row['tiempo'];
    }

include ("../include/headers.php")?>


<div class="container p-4">
    <img src="../img/Receta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <p class="h7">Cédula del propietario:</p>
                        <input type="number" name="cedula_propietario" class="form-control"required  value="<?php echo $cedula_propietario; ?>" placeholder="Ingrese cedula del propietario"  onkeypress="return valideKey(event);" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Historial de la mascota:</p>
                        <input type="text" name="historial" class="form-control" required  value="<?php echo $historial; ?>" placeholder="Ingrese historia" onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Fecha de consulta:</p>
                        <input type="date" name="fecha_consulta" class="form-control me-2" required value="<?php echo $fecha_consulta; ?>"  placeholder="Ingrese la fecha de la consulta" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Código de la medicina:</p>
                        <input type="text" name="codigo_medicina" class="form-control me-2" required value="<?php echo $codigo_medicina; ?>"  placeholder="Ingrese la fecha de la consulta" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Cantidad:</p>
                        <input type="text" name="cantidad" class="form-control me-2" required value="<?php echo $cantidad; ?>"  placeholder="Ingrese la fecha de la consulta" >
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Tiempo:</p>
                        <input type="text" name="tiempo" class="form-control me-2" required value="<?php echo $tiempo; ?>"  placeholder="Ingrese la fecha de la consulta" >
                    </div><br>
                    <input type="submit" name="update" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include("../include/footer.php");
}elseif  (!isset($_GET['id'])) { //entro cuando modifico
    echo $historial = $_POST['historial'];
    echo $cedula_propietario = $_POST['cedula_propietario'];
    echo $fecha_consulta = $_POST['fecha_consulta'];
    echo $codigo_medicina = $_POST['codigo_medicina'];
    echo $cantidad = $_POST['cantidad'];
    echo $tiempo = $_POST['tiempo'];
    $query = "UPDATE receta set cantidad = '$cantidad', tiempo = '$tiempo'
    WHERE historial = $historial and cedula_propietario = $cedula_propietario and fecha_consulta = '$fecha_consulta'
    and codigo_medicina = '$codigo_medicina'";
    $result =mysqli_query($conn, $query);
    if($result){
        $_SESSION['message'] = "Se modifico satisfactoriamente ";
        $_SESSION['message_type'] = 'success';//esto es un color
        header('Location: receta.php');
    }else{
        $_SESSION['message'] = "Ocurrio un error ";
        $_SESSION['message_type'] = 'danger';//esto es un color
        header('Location: receta.php');
    }
}

/*



cedula_propietario
historial
codigo_vacuna
fecha_consulta
dosis
    */
?>