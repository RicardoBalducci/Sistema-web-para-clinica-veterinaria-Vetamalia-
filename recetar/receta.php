<?php include("../database/db.php");?> <!-- LLAMAMOS A LA BASE DE DATOS -->
<?php include("../include/headers.php")?> <!-- LLAMAMOS AL ENCABEZADO  -->

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 1000px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Receta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
                        <th>Cédula del propietario</th>
                        <th>Historial de la mascota</th>
                        <th>Fecha de consulta</th>
                        <th>Motivo</th>
                        <th>Cdigo de la medicina</th>
                        <th>Nombre de lamedicina</th>
                        <th>Costo de la medicina en $</th>
                        <th>Cantidad</th>
                        <th>Tiempo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM receta, medicina, consulta WHERE receta.codigo_medicina = medicina.codigo_medicina and receta.cedula_propietario = consulta.cedula_propietario";
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
                            <!--DATOS DE LA MEDICINA-->
                            <td><?php echo $row['codigo_medicina']?></td><!---->
                            <td><?php echo $row['nombre_medicina']?></td>
                            <td><?php echo $row['costo']?></td>
                            <!--DATOS DE RECETA-->
                            <td><?php echo $row['cantidad']?></td>
                            <td><?php echo $row['tiempo']?></td>
                            <td>
                                <?php
                                $id = $row['historial'];
                                $fecha = $row['fecha_consulta'];
                                $cedula = $row['cedula_propietario'];
                                $codigo = $row['codigo_medicina'];
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
