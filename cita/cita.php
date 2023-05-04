<?php include("../database/db.php");?>
<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Citas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
                    <thead>
                        <tr><!--seccionamos todos los elementos que contendra-->
                            <th>Cédula de propietario</th>
                            <th>Nombre de propietario</th>
                            <th>Apellido de propietario</th>
                            <th>Historial de mascota</th>
                            <th>Nombre de mascota</th>
                            <th>Cédula usuario</th>
                            <th>fecha cita</th>
                            <th>Motivo</th>
                            <th>Acciones</th><!--colocar igual-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM cita, persona, mascota, propietario where cita.cedula_propietario = propietario.cedula_propietario
                        and propietario.cedula_propietario = persona.cedula and
                        cita.historial = mascota.historial";//revisar mascota
                        $result = mysqli_query($conn,$query);
                        while($row =mysqli_fetch_array($result)) {?>
                            <tr>
                                <td><?php echo $row['cedula_propietario']?>
                                <td><?php echo $row['nombre']?>
                                <td><?php echo $row['apellido']?>
                                <td><?php echo $row['historial']?></td>
                                <td><?php echo $row['nombre_mascota']?></td>
                                <td><?php echo $row['cedula_asistente']?></td>
                                <td><?php echo $row['fecha_cita']?></td>
                                <td><?php echo $row['motivo']?></td>
                                <?php
                                    $historial = $row['historial'];
                                    $cedula_propietario = $row['cedula_propietario'];
                                    $fecha_cita = $row['fecha_cita'];
                                ?>
                                <td>
                                    <?php
                                    $id = $row['historial'];
                                    $cedula = $row['cedula_propietario'];
                                    $fecha = $row['fecha_cita'];
                                    ?>
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

<?php include("../include/footer.php");?>