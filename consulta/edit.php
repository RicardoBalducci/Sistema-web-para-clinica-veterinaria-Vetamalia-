<?php include("../database/db.php");
if (isset($_GET['id']))
{
    $cedula_medico='';
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
        $cedula_medico= $row['cedula_medico'];
        $historial = $row['historial'];
        $fecha_consulta = $row['fecha_consulta'];
        $motivo = $row['motivo'];
        $rxm = $row['rxm'];
        $pxm = $row['pxm'];
        $temperatura = $row['temperatura'];
    }
include("../include/headers.php")?>
<div class="container p-4">
<img src="../img/Consulta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
                        <p class="h7">Cédula del médico:</p>
                        <input  name="cedula_medico" type="number" class="form-control me-2" required   value="<?php echo $cedula_medico; ?>" placeholder="Ingrese cédula"  onkeypress="return valideKey(event);" aria-label="Search" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Fecha de consulta:</p>
                        <input type="date" name="fecha_consulta" class="form-control me-2" required value="<?php echo $fecha_consulta; ?>"  placeholder="Ingrese la fecha de la consulta" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Motivo:</p>
                        <input type="text" name="motivo" class="form-control" required  value="<?php echo $motivo; ?>" placeholder="Ingrese el motivo de la consulta" onkeypress="return soloLetras(event)"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Respiración por minuto:</p>
                        <input type="text" name="rxm" class="form-control" required  value="<?php echo $rxm; ?>" placeholder="Ingrese la respiración por minuto" onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Pulsación por minuto:</p>
                        <input type="text" name="pxm" class="form-control" required  value="<?php echo $pxm; ?>" placeholder="Ingrese el pulso por minuto" onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Temperatura:</p>
                        <input type="text" name="temperatura" class="form-control" required  value="<?php echo $temperatura; ?>" placeholder="Ingrese la temperatura" onkeypress="return  valideKey(event);"onblur="limpia()">
                    </div><br>
                    <input type="submit" name="update" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include("../include/footer.php");
    }elseif   (!isset($_GET['id'])) { //entro cuando modifico
        echo "AQUI ENTRO AL MODIFICAR";
        echo $historial = $_POST['historial'];
        echo $cedula_propietario = $_POST['cedula_propietario'];
        echo $cedula_medico = $_POST['cedula_medico'];//aqui
        echo $fecha_consulta = $_POST['fecha_consulta'];
        echo $motivo = $_POST['motivo'];
        echo $rxm = $_POST['rxm'];
        echo $pxm = $_POST['pxm'];
        echo $temperatura = $_POST['temperatura'];
        $query = "UPDATE consulta set motivo = '$motivo', rxm = '$rxm', pxm = '$pxm', temperatura = '$temperatura', cedula_medico = $cedula_medico
        WHERE historial = $historial and cedula_propietario = $cedula_propietario and fecha_consulta = '$fecha_consulta'";
        $result =mysqli_query($conn, $query);
        if($result){
            $_SESSION['message'] = "Se modifico satisfactoriamente ";
            $_SESSION['message_type'] = 'success';//esto es un color
            header('Location: consulta.php');
        }
    }
?>