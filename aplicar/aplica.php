<?php include("../database/db.php");?> <!-- LLAMAMOS A LA BASE DE DATOS -->
<?php include("../include/headers.php")?> <!-- LLAMAMOS AL ENCABEZADO  -->

<div class="container p-5">
    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 18000px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Aplica.png" class="rounded mx-auto d-block" width="160" height="35"></a>
            <a href="../consulta/consulta.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Consulta</a>
            <!-- MOSTRAMOS LOS MENSAJES -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
            <table class="table table-bordered" id="example">
                <thead><!--creamos un encabezado-->
                    <tr><!--seccionamos todos los elementos que contendra-->
                        <!--PROPIETARIO-->
                        <th>Cédula del propietario</th>
                        <!--MASCOTA-->
                        <th>Historial de mascota</th>
                        <!--CONSULTA-->
                        <th>Fecha consulta</th>
                        <th>Motivo</th>
                        <!--VACUNA-->
                        <th>Código vacuna</th>
                        <th>Nombre de vacuna</th>
                        <th>Costo de vacuna en $</th>
                        <!--APLICA-->
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM aplica, vacuna, consulta WHERE
                        aplica.codigo_vacuna = vacuna.codigo_vacuna and aplica.cedula_propietario = consulta.cedula_propietario and
                        aplica.codigo_vacuna = vacuna.codigo_vacuna";
                        $resultado = mysqli_query($conn,$query);//Y EL RESULTADO QUE DE LO ALMACENAMOS EN RESULT
                        while($row =mysqli_fetch_array($resultado)) {?>
                        <tr>
                            <!--DATOS DEL PROPIETARIO-->
                            <td><?php echo $row['cedula_propietario']?></td>
                            <!--DATOS DE LA MASCOTA-->
                            <td><?php echo $row['historial']?></td><!---->
                            <!--DATOS DE LA CONSULTA-->
                            <td><?php echo $row['fecha_consulta']?></td>
                            <td><?php echo $row['motivo']?></td><!---->
                            <!--DATOS DE LA VACUNAS-->
                            <td><?php echo $row['codigo_vacuna']?></td><!---->
                            <td><?php echo $row['nombre_vacuna']?></td>
                            <td><?php echo $row['costo']?></td>
                            <td><?php echo $row['dosis']?></td>
                            <td>
                                <?php
                                $id = $row['historial'];
                                $fecha = $row['fecha_consulta'];
                                $cedula = $row['cedula_propietario'];
                                $codigo = $row['codigo_vacuna'];
                                ?>
                                <?php echo "<a href='edit.php?id=$id&fecha=$fecha&cedula=$cedula&codigo=$codigo' title='editar' class='btn btn-outline-light' type='button' style='background-color: #6a6aeb' terget='_blank' onclick='return  ConfirmarEditar()'><i class='fas fa-marker'></i></a>"?>
                                <?php echo "<a href='delete.php?id=$id&fecha=$fecha&cedula=$cedula&codigo=$codigo' title='Eliminar' class='btn btn-outline-light' type='button' style='background-color: #fa9543' terget='_blank' onclick='return ConfirmarEliminar()'><i class='far fa-trash-alt'></i></a>"?>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../include/footer.php");

?><!-- LLAMAMOS AL PIE DE PAGINA  -->