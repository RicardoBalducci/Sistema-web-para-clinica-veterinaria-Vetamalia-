<?php include("../database/db.php");?>
<?php include("../include/headers.php")?>

<div class="container p-4">
        <img src="../img/Consulta.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="registrar.php">
                    <p class="h7">Cédula de propietario</p>
                    <input type="number" name="cedula" class="form-control" placeholder="Ingrese cedula del propietario" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    <br>
                    <!--CAMBIAR BOTON AQUI -->
                    <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                </form>
                <form action="save.php" method="POST">
                    <?php if (isset($_GET['cedula'])){
                        $cedula=$_GET['cedula'];
                        //consulta
                        $sqla = "SELECT * FROM consulta WHERE cedula_propietario LIKE '%$cedula%'";
                        $resulta = $conn->query($sqla);
                        //propietario
                        $sql = "SELECT * FROM propietario WHERE cedula_propietario LIKE '%$cedula%'";
                        $result = $conn->query($sql);
                        //mascota
                        $queryb= "SELECT * FROM mascota WHERE cedula_propietario LIKE '%$cedula%'";
                        $resultb=$mysqli->query($queryb);
                        //persona
                        $sqls = "SELECT * FROM persona WHERE cedula LIKE '%$cedula%'";
                        $resultados = $conn->query($sqls);
                        if($row = $resulta->fetch_assoc()){
                            echo "<script> alert('El propietario ya se encuentra registrado'); </script>";
                            //----------SI LA PERSONA YA TUVO UNA CONSULTA PREVIAMENTE-----------------?>
                            <br><div class="form-group"><!---->
                                <p class="h7">Cédula de propietario</p>
                                <input type="text" name="cedula_propietario" value="<?php echo $row['cedula_propietario']; $nombre2 = $row['cedula_propietario'];?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <?php if($rowe = $resultados->fetch_assoc()){
                                if($rowe ['cedula'] == $row ['cedula_propietario']){?>
                                    <div class="form-group"><!---->
                                    <p class="h7">Primer nombre de persona</p>
                                    <input type="text" name="nombre" value="<?php echo $rowe['nombre']; $nombre2 = $rowe['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Apellido de persona</p>
                                    <input type="text" name="apellido" value="<?php echo $rowe['apellido']; $apellido2 = $rowe['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <?php }
                            }
                            ?>
                            <div class="form-group">
                                <p class="h7">Historial de la mascota:</p>
                                <input type="text" name="historial" class="form-control" required placeholder="Ingrese historial" onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cédula del médico:</p>
                                <input type="number" name="cedula_medico" class="form-control" required placeholder="Ingrese cedula del medico" onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Fecha de la consulta:</p>
                                <input type="date" name="fecha_consulta" class="form-control" required placeholder="Ingrese fecha de la consulta" >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Motivo de la consulta:</p>
                                <textarea name="motivo" id="" cols="30" rows="10"class="form-control" placeholder="Indique el motivo de la consulta"></textarea>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Respiración por minuto:</p>
                                <input type="text" name="rxm" class="form-control me-2" required placeholder="Ingrese la respiración por minuto">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Pulso por minuto:</p>
                                <input type="text" name="pxm" class="form-control me-2" required placeholder="Ingrese el pulso por minuto">
                            </div><br>
                            <div class="form-group"><p class="h7">Temperatura:</p>
                                <input type="text" name="temperatura" class="form-control me-2" required placeholder="Ingrese la temperatura de la mascota" >
                            </div><br>
                            <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                        <?php }elseif($rows = $result->fetch_assoc()){
                        //------------SI LA PERSONA ES PROPIETARIO PERO NO TIENE CONSULTA PREVIA---------
                        echo "<script> alert('El propietario se encuentra registrado pero no tiene consulta'); </script>";?>
                        <br><div class="form-group"><!---->
                                <p class="h7">Cédula de propietario</p>
                                <input type="text" name="cedula_propietario" value="<?php echo $rows['cedula_propietario']; $nombre2 = $rows['cedula_propietario'];?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <?php if($rowe = $resultados->fetch_assoc()){
                                if($rowe ['cedula'] == $rows ['cedula_propietario']){?>
                                    <div class="form-group"><!---->
                                    <p class="h7">Primer nombre de persona</p>
                                    <input type="text" name="nombre" value="<?php echo $rowe['nombre']; $nombre2 = $rowe['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Apellido de persona</p>
                                    <input type="text" name="apellido" value="<?php echo $rowe['apellido']; $apellido2 = $rowe['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <p class="h7">Dirección de propietario</p>
                                    <input name="direccion"   value="<?php echo $rows['direccion']; $cedula2 = $rows['direccion'];?>" class="form-control" placeholder="Ingrese dirección">
                                <br>
                                <div class="form-group"><!---->
                                    <p class="h7">Teléfono</p>
                                    <input type="text" name="telefono" value="<?php echo $rows['telefono']; $cedula2 = $rows['telefono'];?>"  class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()">
                                </div><br>
                                <?php }
                            }
                            ?>
                            <div class="form-group">
                                <p class="h7">Historial de la mascota:</p>
                                <input type="text" name="historial" class="form-control" required placeholder="Ingrese historial" onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cédula del médico:</p>
                                <input type="number" name="cedula_medico" class="form-control" required placeholder="Ingrese cedula del medico" onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Fecha de la consulta:</p>
                                <input type="date" name="fecha_consulta" class="form-control" required placeholder="Ingrese fecha de la consulta" >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Motivo de la consulta:</p>
                                <textarea name="motivo" id="" cols="30" rows="10"class="form-control" placeholder="Indique el motivo de la consulta"></textarea>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Respiración por minuto:</p>
                                <input type="text" name="rxm" class="form-control me-2" required placeholder="Ingrese la respiración por minuto">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Pulso por minuto:</p>
                                <input type="text" name="pxm" class="form-control me-2" required placeholder="Ingrese el pulso por minuto">
                            </div><br>
                            <div class="form-group"><p class="h7">Temperatura:</p>
                                <input type="text" name="temperatura" class="form-control me-2" required placeholder="Ingrese la temperatura de la mascota" >
                            </div><br>
                            <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                            <?php } elseif($row = $resultados->fetch_assoc()){
                                //----------SI LA PERSONA SE ENCUENTRA REGISTRADA PERO NO ES PROPIETARIO------------
                                    echo "
                                    <script>let isBoss = confirm('La persona se encuentra registrada, pero no es un propietario ¿Desea registrarlo como propietario?');
                                    if (isBoss == true){
                                        location.href = '../propietario/registrar.php';
                                    }else{
                                        location.href = 'registrar.php';
                                    }
                                    </script>";
                                ?>

                            <?php } else{
                                 //----------SI LA PERSONA NO SE ENCUENTRA REGISTRADA en el sistema------------
                                echo "
                                    <script>let isBoss = confirm('La cedula ingresada no se encuentra registrada ¿Desea registrar a la persona?');
                                    if (isBoss == true){
                                        location.href = '../persona/registrar.php';
                                    }else{
                                        location.href = 'registrar.php';
                                    }
                                    </script>";
                                ?>


                            <?php }
                    }
                    ?>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");?>