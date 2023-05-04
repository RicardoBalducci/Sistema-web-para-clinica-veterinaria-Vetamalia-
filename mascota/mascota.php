<?php include("../database/db.php");?>
<!--necesito incluir de primero la vase de datos para eso utilizamos include junto con el archivo donde se
encuentra ubicada la conexion de bd-->

<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto" style="width: 1360px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Mascota.png" class="rounded mx-auto d-block" width="160" height="35"></a>
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
                <thead><!--creamos un encabezado-->
                    <tr><!--seccionamos todos los elementos que contendra-->
                        <th>Cédula de propietario</th>
                        <th>Nombre de propietario</th>
                        <th>Apellido de propietario</th>
                        <th>Historial de mascota</th>
                        <th>Nombre de mascota</th>
                        <th>Fecha de nacimiento</th>
                        <th>Fecha de registro</th>
                        <th>Sexo</th>
                        <th>Cédula de usuario</th>
                        <th>Código de especie</th>
                        <th>Nombre de especie</th>
                        <th>Acciones</th><!--colocar igual-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM mascota, especie,persona where mascota.codigo_especie = especie.codigo_especie and mascota.cedula_propietario = persona.cedula";
                    $result = mysqli_query($conn,$query);
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['cedula_propietario']?>
                            <td><?php echo $row['nombre']?>
                            <td><?php echo $row['apellido']?>
                            <td><?php echo $row['historial']?>
                            <td><?php echo $row['nombre_mascota']?>
                            <td><?php echo $row['fecha_nacimiento']?>
                            <td><?php echo $row['fecha_registro']?>
                            <td><?php echo $row['sexo']?>
                            <td><?php echo $row['cedula_asistente']?>
                            <td><?php echo $row['codigo_especie']?>
                            <td><?php echo $row['descripcion']?>
                            <td>
                                <a href="edit.php?id=<?php echo $row['historial']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb" onclick="return  ConfirmarEditar()">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['historial']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
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


<?php include("../include/footer.php");?>
<!--
char
char
char
date
date
char

-->
<?php
/*







                    
<form id="combo" name="combo" action="save.php" method="POST" >
                <p class="h1">Mascota</p>
                <p class="h2">Registrar</p><br>
                    <div class="form-group"><!---->
                        <input type="number" name="cedula_propietario" class="form-control" placeholder="Ingrese cédula del propietario" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br><!---->
                    <div class="form-group"><!---->
                        <input type="number" name="historial" class="form-control" placeholder="Ingrese número de historial" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre de la mascota" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group"><!---->
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Ingrese fecha de nacimiento de la mascota">
                    </div><br>
                    <input type="number" name="cedula_asistene" class="form-control" placeholder="Ingrese cédula del cedula usuari:" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    <br><div>Selecciona Reino : <select name="cod_reino" id="cod_reino">
                    <option value="0">Seleccionar Reino</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codigo_reino']; ?>"><?php echo $row['descripcion']; ?></option>
                    <?php } ?>
                    </select></div><br>
                    <div class="form-group">
                        <div>Seleccione Phylum : <select name="cod_phylum" id="cod_phylum"></select></div>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione Clase : <select name="cod_clase" id="cod_clase"></select></div>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione Orden : <select name="cod_orden" id="cod_orden"></select></div>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione Familia : <select name="cod_familia" id="cod_familia"></select></div>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione Género : <select name="cod_genero" id="cod_genero"></select></div>
                    </div><br>
                    <div class="form-group">
                        <div>Seleccione Especie : <select name="cod_especie" id="cod_especie"></select></div>
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <input type="submit" id="enviar" class="btn btn-success btn-block" name="save" value="Guardar"/>
                </form>


NO TOCAR, FUNCIONA


*/
?>