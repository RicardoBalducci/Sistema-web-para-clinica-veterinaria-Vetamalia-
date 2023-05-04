<?php include("../database/db.php");?>

<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
                <img src="../img/Usuario.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <a href="registrar.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } //el session_unset limpia los datos que tenemos?>
            <table class="table table-bordered" id="example">
                <thead><!--creamos un encabezado-->
                    <tr><!--seccionamos todos los elementos que contendra-->
                    <th>Cédula</th><!--<th>codigo</th>-->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre de usuario</th><!--<th>nombre</th>-->
                        <th>Contraseña</th>
                        <th>Status</th>
                        <th>Acciones</th><!--colocar igual-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //selecciona todas las tareas de persona
                    $query = "SELECT * FROM persona, asistente where persona.cedula = asistente.cedula_asistente";
                    //indicamos que hay una conexion
                    $result = mysqli_query($conn,$query);
                    //y recorremos por medio de row todos los elementos y mostramos en pantalla
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['cedula_asistente']?>
                            <td><?php echo $row['nombre']?>
                            <td><?php echo $row['apellido']?>
                            <td><?php echo $row['login']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><?php echo $row['status']?></td>
                            <td><!---->
                                <a href="edit.php?id=<?php echo $row['cedula_asistente']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb"  onclick=" return  ConfirmarEditar()" >
                                    <i class="fas fa-marker"></i><!--cambiar por codigo-->
                                </a>
                                <a href="delete.php?id=<?php echo $row['cedula_asistente']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../include/footer.php")?><!--aqui incluimos el footer y lo repetimos-->

