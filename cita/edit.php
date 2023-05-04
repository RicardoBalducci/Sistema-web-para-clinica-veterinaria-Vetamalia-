<?php include("../database/db.php");
if (isset($_GET['id']))
{
    $cedula_propietario='';
    $cedula_asistente='';
    $historial='';
    $fecha_cita= '';
    $motivo = '';
    //SELECCIONAMOS TODOS LOS VALORES Y LOS LLENAMOS
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_cita = $_GET['fecha'];
    $query = "SELECT * FROM cita WHERE historial = '$id' and cedula_propietario = '$cedula_propietario' and fecha_cita = '$fecha_cita'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $cedula_propietario= $row['cedula_propietario'];
        $cedula_asistente= $row['cedula_asistente'];
        $historial = $row['historial'];
        $fecha_cita = $row['fecha_cita'];
        $motivo = $row['motivo'];
    }
include("../include/headers.php")?>
<div class="container p-4">
    <img src="../img/Citas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
                        <p class="h7">Cédula del usuario:</p>
                        <input  name="cedula_asistente" type="number" class="form-control me-2" required   value="<?php echo $cedula_asistente; ?>" placeholder="Ingrese cédula"  onkeypress="return valideKey(event);" aria-label="Search" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Fecha de cita:</p>
                        <input type="date" name="fecha_cita" class="form-control me-2" required value="<?php echo $fecha_cita; ?>"  placeholder="Ingrese la fecha de la cita" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Motivo:</p>
                        <input type="text" name="motivo" class="form-control" required  value="<?php echo $motivo; ?>" placeholder="Ingrese historia" onkeypress="return soloLetras(event)"onblur="limpia()">
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
        echo $cedula_asistente = $_POST['cedula_asistente'];//aqui
        echo $fecha_cita = $_POST['fecha_cita'];
        echo $motivo = $_POST['motivo'];
        $query = "UPDATE cita set motivo = '$motivo', cedula_asistente = $cedula_asistente
        WHERE historial = $historial and cedula_propietario = $cedula_propietario and fecha_cita = '$fecha_cita'";
        $result =mysqli_query($conn, $query);
        if($result){
            $_SESSION['message'] = "Se modifico satisfactoriamente ";
            $_SESSION['message_type'] = 'success';//esto es un color
            header('Location: cita.php');
        }
    }
?>