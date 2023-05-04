<?php include("../database/db.php");?>
<!--necesito incluir de primero la vase de datos para eso utilizamos include junto con el archivo donde se
encuentra ubicada la conexion de bd-->
<?php include("../include/headers.php")?><!--aqui incluimos el header-->

<div class="container p-4">
    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Propietario.png" class="rounded mx-auto d-block" width="160" height="35"></a>
            <a href="registrar.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
            <br>
            <!-- MESSAGES -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
            <br>
            <table class="table table-bordered" id="example">
                <thead><!--creamos un encabezado-->
                    <tr><!--seccionamos todos los elementos que contendra-->
                        <th>Cédula</th><!--<th>codigo</th>-->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th><!--<th>nombre</th>-->
                        <th>Teléfono</th>
                        <th>Acciones</th><!--colocar igual-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //selecciona todas las tareas de persona
                    $query = "SELECT * FROM persona, propietario where persona.cedula = propietario.cedula_propietario";
                    //indicamos que hay una conexion
                    $result = mysqli_query($conn,$query);
                    //y recorremos por medio de row todos los elementos y mostramos en pantalla
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['cedula_propietario']?>
                            <td><?php echo $row['nombre']?>
                            <td><?php echo $row['apellido']?>
                            <td><?php echo $row['direccion']?></td><!--$row['nombre']-->
                            <td><?php echo $row['telefono']?></td><!--$row['costo']-->
                            <td><!---->
                                <a href="edit.php?id=<?php echo $row['cedula_propietario']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb" "onclick="return  ConfirmarEditar()" >
                                    <i class="fas fa-marker"></i><!--cambiar por codigo-->
                                </a>
                                <a href="delete.php?id=<?php echo $row['cedula_propietario']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
                                <i class="far fa-trash-alt"></i><!--cambiar por codigo-->
                                </a><!--queda igual de aqui para abajo-->
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../include/footer.php");?>