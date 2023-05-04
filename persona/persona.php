<?php include("../database/db.php");?><!-- BASE DE DATOS -->
<?php include("../include/headers.php")?><!-- LLAMAMOS AL HEADER -->

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Persona.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
            <!--TABLA-->
            <table class="table table-bordered" id="example">
                <thead><!--ENCABEZADO DE LA TABLA-->
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM persona";
                    $result = mysqli_query($conn,$query);
                    while($row =mysqli_fetch_array($result)) {?><!--MOSTRANDO LOS DATOS EN LA TABLA-->
                        <tr>
                            <td><?php echo $row['cedula']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['apellido']?></td>
                            <td><!--INDICANDO ACCIONES A REALIZAR-->
                                <a href="edit.php?id=<?php echo $row['cedula']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb"  onclick="return  ConfirmarEditar()">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['cedula']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
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
<?php include("../include/footer.php")?><!-- LLAMAMOS AL FOOTER -->