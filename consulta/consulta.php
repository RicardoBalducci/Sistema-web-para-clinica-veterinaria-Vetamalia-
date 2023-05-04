<?php include("../database/db.php");?>
<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 1360px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Consulta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
            <a href="registrar.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
            <!-- MESSAJES -->
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); }?>
                <table class="table table-bordered" id="example">
                    <thead><!--creamos un encabezado #cedula_propietario	historial	cedula_medico	fecha_consulta	motivo	rxm	pxm	temperatura-->
                        <tr><!--seccionamos todos los elementos que contendra-->
                            <th>Cédula de propietario</th>
                            <th>Nombre de propietario</th>
                            <th>Apellido de propietario</th>
                            <th>Historial</th>
                            <th>Nombre de la mascota</th>
                            <th>Cédula médico</th>
                            <th>Fecha de consulta</th>
                            <th>Motivo</th>
                            <th>Respiración por minuto</th>
                            <th>Pulsación por minuto</th>
                            <th>Temperatura</th>
                            <th>Acciones</th><!--colocar igual-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM consulta, persona, mascota where consulta.cedula_propietario = persona.cedula and consulta.historial = mascota.historial";
                        $result = mysqli_query($conn,$query);
                        while($row =mysqli_fetch_array($result)) {?>
                            <tr>
                                <td><?php echo $row['cedula_propietario']?>
                                <td><?php echo $row['nombre']?>
                                <td><?php echo $row['apellido']?>
                                <td><?php echo $row['historial']?></td>
                                <td><?php echo $row['nombre_mascota']?></td>
                                <td><?php echo $row['cedula_medico']?></td>
                                <td><?php echo $row['fecha_consulta']?></td>
                                <td><?php echo $row['motivo']?></td>
                                <td><?php echo $row['rxm']?></td>
                                <td><?php echo $row['pxm']?></td>
                                <td><?php echo $row['temperatura']?></td>
                                <td>
                                    <?php
                                    $id = $row['historial'];
                                    $cedula = $row['cedula_propietario'];
                                    $fecha = $row['fecha_consulta'];
                                    ?>
                                    <?php echo "<a href='../recetar/registrar.php?id=$id&fecha=$fecha&cedula=$cedula' title='editar' class='btn btn-outline-light' type='button' style='background-color: #6a6aeb' terget='_blank' onclick='return  ConfirmarAplicar()'>Receta</a>"?>
                                    <?php echo "<a href='../aplicar/registrar.php?id=$id&fecha=$fecha&cedula=$cedula' title='editar' class='btn btn-outline-light' type='button' style='background-color: #fa9543' terget='_blank' onclick='return  ConfirmarAplicar()'>Aplicar</a>"?>
                                    <?php echo "<a href='edit.php?id=$id&fecha=$fecha&cedula=$cedula' title='editar' class='btn btn-outline-light' type='button' style='background-color: #6a6aeb' terget='_blank' onclick='return  ConfirmarEditar()'><i class='fas fa-marker'></i></a>"?>
                                    <?php echo "<a href='delete.php?id=$id&fecha=$fecha&cedula=$cedula' title='Eliminar' class='btn btn-outline-light' type='button' style='background-color: #fa9543' terget='_blank' onclick='return ConfirmarEliminar()'><i class='far fa-trash-alt'></i></a>"?>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("../include/footer.php");


/* 
                                    <a href="'../aplicar/aplicar.php?id=$id&fecha=$fecha&cedula=$cedula' class='btn btn-secondary'">aplicar</a>



Base
    Cedula_propietario 
    historial
    fecha_consulta
    #cedula_propietario	historial	cedula_medico	fecha_consulta	motivo	rxm	pxm	temperatura

<td><?php echo $row['cedula_propietario']?>
                            <td><?php echo $row['historial']?>
                            <td><?php echo $row['nombre_mascota']?>
                            <td><?php echo $row['fecha_nacimiento']?>
                            <td><?php echo $row['fecha_registro']?>
                            <td><?php echo $row['sexo']?>
                            <td><?php echo $row['cedula_asistente']?>
                            <td><?php echo $row['codigo_especie']?>
                            <td><?php echo $row['descripcion']?>




    Solo palabras
    onkeypress="return soloLetras(event)" id="miInput"

    solo numeros
    onkeypress="return valideKey(event);"
<div class="col-md-20 mx-auto">
            <br>
            <!--TABLA-->
            <table class="table table-bordered" id="example">
                <thead><!--ENCABEZADO DE LA TABLA-->
                    <tr>
                        <th>Cedula del propietario</th>
                        <th>Nombre del propietario</th>
                        <th>Apellido del propietario</th>
                        <th>Numero del Historial</th>
                        <th>Nombre de la mascota</th>
                        <th>Codigo de especie</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Cedula del medico</th>
                        <th>Fecha de consulta</th>
                        <th>Motivo de la consulta</th>
                        <th>Respiración por minuto</th>
                        <th>Pulsaciones por minuto</th>
                        <th>Temperatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM consulta, mascota, persona where consulta.historial = mascota.historial and consulta.cedula_propietario = persona.cedula";
                    $result = mysqli_query($conn,$query);
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['cedula_propietario']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['apellido']?></td>
                            <td><?php echo $row['historial']?></td>
                            <td><?php echo $row['nombre_mascota']?></td>
                            <td><?php echo $row['codigo_especie']?></td>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['sexo']?></td>
                            <td><?php echo $row['cedula_medico']?></td>
                            <td><?php echo $row['fecha_consulta']?></td>
                            <td><?php echo $row['motivo']?></td>
                            <td><?php echo $row['rxm']?></td>
                            <td><?php echo $row['pxm']?></td>
                            <td><?php echo $row['temperatura']?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
*/
?>