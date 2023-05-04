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
<img src="../img/Consulta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
<img src="../img/Aplica.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <p class="h7">Cédula de propietario</p>
                        <input type="number" name="cedula_propietario" class="form-control"required  value="<?php echo $cedula_propietario; ?>" placeholder="Ingrese cédula de propietario"  onkeypress="return valideKey(event);" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Historial de mascota</p>
                        <input type="text" name="historial" class="form-control" required  value="<?php echo $historial; ?>" placeholder="Ingrese historial" onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Fecha de consulta</p>
                        <input type="date" name="fecha_consulta" class="form-control me-2" required value="<?php echo $fecha_consulta; ?>"  placeholder="Ingrese fecha de consulta" readonly>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione vacuna : <select name="cod_vacuna" id="cod_vacuna"><!-- CREAMOS UN DIV QUE NOS MUESTRE USANDO SELECT TODOS LOS ELEMENTOS QUE CONFORMAN A REINO  -->
                            <option value="0">Seleccionar vacuna</option>
                            <?php while($row = $resultados->fetch_assoc()) { ?><!-- Y POR MEDIO DE RECORRER TODOS LOS ELEMENTOS  -->
                                <option value="<?php echo $row['codigo_vacuna']; ?>"><?php echo $row['nombre_vacuna']; ?></option><!-- LOS LLAMAMOS Y MOSTRAMOS EN OPCIONES  -->
                            <?php } ?>
                        </select></div>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Dosis</p>
                        <input type="text" name="dosis" class="form-control me-2" required  placeholder="Ingrese dosis">
                    </div><br>
                    <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");
}
?>