<?php include("../database/db.php");

if (isset($_GET['id']))
{
    $cedula_propietario='';
    $fecha_consulta= '';
    $codigo_vacuna = '';
    $dosis = '';

    //SELECCIONAMOS TODOS LOS VALORES Y LOS LLENAMOS
    $id = $_GET['id'];
    $cedula_propietario = $_GET['cedula'];
    $fecha_consulta = $_GET['fecha'];
    $codigo_vacuna = $_GET['codigo'];
    $query = "SELECT * FROM aplica WHERE historial = '$id' and cedula_propietario = '$cedula_propietario'
    and fecha_consulta = '$fecha_consulta' and codigo_vacuna = '$codigo_vacuna'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $cedula_propietario= $row['cedula_propietario'];
        $historial = $row['historial'];
        $fecha_consulta = $row['fecha_consulta'];
        $codigo_vacuna = $row['codigo_vacuna'];
        $dosis = $row['dosis'];
    }

include ("../include/headers.php")?>


<div class="container p-4">
<img src="../img/Aplica.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <p class="h7">Cédula de propietario</p>
                        <input type="number" name="cedula_propietario" class="form-control"required  value="<?php echo $cedula_propietario; ?>" placeholder="Ingrese cédula del propietario"  onkeypress="return valideKey(event);" readonly>
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
                        <p class="h7">Código de la vacuna</p>
                        <input type="text" name="codigo_vacuna" class="form-control me-2" required value="<?php echo $codigo_vacuna; ?>"  placeholder="Ingrese código" readonly>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Dosis</p>
                        <input type="text" name="dosis" class="form-control me-2" required value="<?php echo $dosis; ?>"  placeholder="Ingrese dosis" >
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
    echo $codigo_vacuna = $_POST['codigo_vacuna'];
    echo $dosis = $_POST['dosis'];
    $query = "UPDATE aplica set dosis = '$dosis'
    WHERE historial = $historial and cedula_propietario = $cedula_propietario and fecha_consulta = '$fecha_consulta'
    and codigo_vacuna = '$codigo_vacuna'";
    $result =mysqli_query($conn, $query);
    if($result){
        $_SESSION['message'] = "Se modificó satisfactoriamente ";
        $_SESSION['message_type'] = 'success';//esto es un color
        header('Location: aplica.php');
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