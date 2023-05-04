<?php include("../database/db.php");?>

<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Medicinas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
            <a href="registrar.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
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
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Costo $</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM medicina";
                    $result = mysqli_query($conn,$query);
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['codigo_medicina']?></td>
                            <td><?php echo $row['nombre_medicina']?></td>
                            <td><?php echo $row['costo']?></td>
                            <td><!---->
                                <a href="edit.php?id=<?php echo $row['codigo_medicina']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb"  onclick="return  ConfirmarEditar()">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['codigo_medicina']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
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