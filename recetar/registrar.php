<?php include("../database/db.php");
$cedula_medico='';
$cedula_propietario='';
$historial='';
$fecha_consulta= '';
$motivo = '';
$rxm = '';
$pxm = '';
$temperatura = '';
if (isset($_GET['id']))
{
    $cedula_propietario='';
    $historial='';
    $fecha_consulta= '';
    $motivo = '';
    $rxm = '';
    $pxm = '';
    $temperatura = '';
    //SELECCIONAMOS TODOS LOS VALORES Y LOS LLENAMOS
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_consulta = $_GET['fecha'];
    $query = "SELECT * FROM consulta WHERE historial = '$id' and cedula_propietario = '$cedula_propietario' and fecha_consulta = '$fecha_consulta'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $cedula_propietario= $row['cedula_propietario'];
        $historial = $row['historial'];
        $fecha_consulta = $row['fecha_consulta'];
    }
?>




<?php include("../include/headers.php")?>

<div class="container p-4">
    <img src="../img/Receta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <!--FORMULARIO-->
                <form action="save.php" method="POST">
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
                        <div>Selecciona medicina : <select name="cod_medicina" id="cod_medicina"><!-- CREAMOS UN DIV QUE NOS MUESTRE USANDO SELECT TODOS LOS ELEMENTOS QUE CONFORMAN A REINO  -->
                            <option value="0">Seleccionar medicina</option>
                            <?php while($row = $resultas->fetch_assoc()) { ?><!-- Y POR MEDIO DE RECORRER TODOS LOS ELEMENTOS  -->
                                <option value="<?php echo $row['codigo_medicina']; ?>"><?php echo $row['nombre_medicina']; ?></option><!-- LOS LLAMAMOS Y MOSTRAMOS EN OPCIONES  -->
                            <?php } ?>
                        </select></div>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Cantidad:</p>
                        <input type="text" name="cantidad" class="form-control me-2" required  placeholder="Ingrese la Cantidad de la medicina">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Tiempo:</p>
                        <input type="text" name="tiempo" class="form-control me-2" required  placeholder="Ingrese el tiempo de la medicina">
                    </div><br>
                    <input type="submit" name="save" value="Guardar"  class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");
}
?>