<?php include("../database/db.php");?>
<?php include("../include/headers.php");?>

<div class="container p-4">
        <img src="../img/Mascota.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <!--FORMULARIO-->
                <form action="registrar.php">
                    <p class="h7">Cédula de propietario</p>
                    <input type="number" name="cedula" class="form-control" placeholder="Ingrese cedula del propietario" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    <!--CAMBIAR BOTON AQUI -->
                    <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">

                </form>

                <form action="save.php" method="POST">
                    <?php
                    if(isset($_GET['cedula'])){
                        $cedula=$_GET['cedula'];
                        $sql = "SELECT * FROM propietario WHERE cedula_propietario LIKE '%$cedula%'";
                        $result = $conn->query($sql);
                        $sqly = "SELECT * FROM persona WHERE cedula LIKE '%$cedula%'";
                        $resulte = $conn->query($sqly);
                        if($rowe = $result->fetch_assoc()){
                        //--------------COMPROBAMOS QUE EL PROPIETARIO EXISTA----------------------
                        echo "<script> alert('El propietario ya se encuentra registrado, pero no cuenta con mascota'); </script>";
                            ?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula de propietario</p>
                                <input type="text" name="cedula_propietario" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <?php if($roww = $resulte->fetch_assoc()){?>
                                <div class="form-group"><!---->
                                    <p class="h7">Primer nombre del propietario</p>
                                    <input type="text" name="nombre" value="<?php echo $roww['nombre']; $nombre2 = $roww['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Apellido del propietario</p>
                                    <input type="text" name="apellido" value="<?php echo $roww['apellido']; $apellido2 = $roww['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                            <?php }?>
                            <p class="h7">Dirección de propietario</p>
                                <input name="direccion" rows="2"  value="<?php echo $rowe['direccion']; $cedula2 = $rowe['direccion'];?>" class="form-control" placeholder="Ingrese dirección"></textarea>
                            <br>
                            <div class="form-group"><!---->
                                <p class="h7">Teléfono</p>
                                <input type="text" name="telefono" value="<?php echo $rowe['telefono']; $cedula2 = $rowe['telefono'];?>"  class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <p class="h7">Nombre de la mascota:</p>
                            <div class="form-group">
                                <input type="text" name="nombre_mascota" class="form-control" placeholder="Ingrese nombre de la mascota" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                            </div><br>
                            <p class="h7">Fecha de nacimiento de la mascota:</p>
                            <div class="form-group"><!---->
                                <input type="date" name="fecha_nacimiento" class="form-control" min="1999-01-01" max="2040-01-01" placeholder="Ingrese fecha de nacimiento de la mascota">
                            </div><br>
                            <p class="h7">Fecha de registro de la mascota:</p>
                            <div class="form-group"><!---->
                                <input type="date" name="fecha_registro" class="form-control" min="1999-01-01" max="2040-01-01" placeholder="Ingrese fecha de registro de la mascota">
                            </div><br>
                            <div class="form-group"><!---->
                            <div>Seleccione Sexo :
                            <select name="sexo" id="sexo">
                                <option value="Seleccione sexo">Seleccione Sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select></div>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula del usuario</p>
                                <input type="number" name="cedula_asistente" class="form-control" placeholder="Ingrese cédula del usuario:" required  onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
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
                            <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                            <?php }else{
                                echo "
                                <script>let isBoss = confirm('¿Desea ingresar propietario?');
                                if (isBoss == true){
                                    location.href = '../propietario/registrar.php';
                                }else{
                                    location.href = 'registrar.php';
                                }
                                </script>";
                            }
                    }
                    ?>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php")


/*   */
?>