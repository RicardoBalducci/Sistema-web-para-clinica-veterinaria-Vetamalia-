<?php include("../database/db.php");?>
<?php include("../include/headers.php")?>

<div class="container p-4">
        <img src="../img/Citas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="registrar.php">
                    <p class="h7">Cédula de propietario</p>
                    <input type="number" name="cedula" class="form-control" placeholder="Ingrese cedula del propietario" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    <br>
                    <!--CAMBIAR BOTON AQUI -->
                    <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 10px !important;">
                </form>
                <form action="save.php" method="POST">
                    <?php if (isset($_GET['cedula'])){
                        $cedula=$_GET['cedula'];
                        //cita
                        $sqla = "SELECT * FROM cita WHERE cedula_propietario LIKE '%$cedula%'";
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
                            //--------SI EL PROPIETARIO YA TIENE CITA Y DESEA VOLVER A REGISTRAR--------------
                                echo "<script>let isBoss = confirm('El Propietario ya cuenta con una cita. ¿Desea agendar otra cita?');
                                if (isBoss == true){
                                    Window.confirm();
                                }else{
                                    location.href = 'cita.php';
                                }
                                </script>";?>
                                <br><div class="form-group"><!---->
                                    <p class="h7">Cédula de propietario</p>
                                    <input type="text" name="cedula_propietario" value="<?php echo $row['cedula_propietario']; $nombre2 = $row['cedula_propietario'];?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Historial de la mascota</p>
                                    <input type="number" name="historial" class="form-control" placeholder="Ingrese Historial de la mascota" onkeypress="return valideKey(event);" aria-label="Search">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Cédula del usuario:</p>
                                    <input  name="cedula_usuario" type="search" class="form-control me-2" required placeholder="Ingrese cédula de usuario"  onkeypress="return valideKey(event);" aria-label="Search">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Fecha de cita:</p>
                                    <input type="date" name="fecha_cita" class="form-control me-2" required placeholder="Ingrese la fecha de la cita" >
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Motivo:</p>
                                    <textarea name="motivo" id="" cols="30" rows="10"class="form-control" placeholder="Indique el motivo de la cita"></textarea>
                                </div><br>
                                <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                            <?php } elseif($row = $result->fetch_assoc()){
                                $cedula=$_GET['cedula'];
                                //-------------------EL PROPIETARIO SE ENCUENTRA REGISTRADO PERO NO TIENE CITA----------
                                echo "<script>let isBoss = confirm('El Propietario se encuentra registrado pero no tiene cita. ¿Desea agendar una cita?');
                                if (isBoss == true){
                                    Window.confirm();
                                }else{
                                    location.href = 'cita.php';
                                }
                                </script>";?>
                                <div class="form-group"><!---->
                                    <p class="h7">Cédula de propietario</p>
                                    <input type="text" name="cedula_propietario" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Historial de la mascota</p>
                                    <input type="number" name="historial" class="form-control" placeholder="Ingrese historial de la mascota" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Cédula del usuario:</p>
                                    <input  name="cedula_usuario" type="search" class="form-control me-2" required placeholder="Ingrese cédula del usuario"  onkeypress="return valideKey(event);" aria-label="Search">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Fecha de cita:</p>
                                    <input type="date" name="fecha_cita" class="form-control me-2" required placeholder="Ingrese la fecha de la cita" >
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Motivo:</p>
                                    <textarea name="motivo" id="" cols="30" rows="10"class="form-control" placeholder="Indique el motivo de la cita"></textarea>
                                </div><br>
                                <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                            <?php } elseif($row = $resultados->fetch_assoc()){
                                //----------SI LA PERSONA SE ENCUENTRA REGISTRADA PERO NO ES PROPIETARIO------------
                                    echo "
                                    <script>let isBoss = confirm('La persona se encuentra registrada, pero no es un propietario ¿Desea registrarlo como propietario?');
                                    if (isBoss == true){
                                        location.href = '../propietario/registrar.php';
                                    }else{
                                        location.href = 'cita.php';
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
                                        location.href = 'cita.php';
                                    }
                                    </script>";
                                ?>


                            <?php }
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");?>