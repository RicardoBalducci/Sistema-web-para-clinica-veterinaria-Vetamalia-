<?php include("../database/db.php");?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
        <img src="../img/Medico.png" class="rounded mx-auto d-block" width="160" height="35"></a>
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <!--FORMULARIO-->
                <form action="registrar.php">
                    <div class="form-group"><!---->
                        <p class="h7">Cédula de  médico</p>
                        <input type="number" name="cedula" class="form-control" placeholder="Ingrese cédula de medico" required  onkeypress="return valideKey(event);"onblur="limpia()" >
                        <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                    </div><br>
                </form>
                <form action="save.php" method="POST">
                    <?php
                    if(isset($_GET['cedula'])){
                        if($conn->connect_error){
                            die("conexion fallida". $conn->connect_error);
                        }
                        $cedula=$_GET['cedula'];
                        $sql = "SELECT * FROM medico WHERE cedula_medico LIKE '%$cedula%'";
                        $sqls = "SELECT * FROM persona WHERE cedula LIKE '%$cedula%'";
                        $resultado = $conn->query($sql);
                        $resultados = $conn->query($sqls);

                        //------------------PRIMERA VALIDACION PARA SABER SI ES UN MEDICO------------
                        if($row = $resultado->fetch_assoc()){
                            echo "<script> alert('El medico ya se encuentra registrado'); </script>";?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula de médico</p>
                                <input type="text" name="cedula" value="<?php echo $row['cedula_medico']; $cedula2 = $row['cedula_medico'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                            </div><br>
                            <div  class="form-group">
                            <p class="h7">Número de colegiatura</p>
                                <input name="colegiatura" rows="2"  value="<?php echo $row['colegiatura']; $cedula2 = $row['colegiatura'];?>" class="form-control" placeholder="Ingrese dirección"></textarea>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Título</p>
                                <input type="text" name="titulo" value="<?php echo $row['titulo']; $cedula2 = $row['titulo'];?>"  class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <!--CAMBIAR BOTON AQUI -->
                            <a href="propietario.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Regresar</a>

                        <?php } elseif($row = $resultados->fetch_assoc()){
                        //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------
                        echo "<script> alert('La persona ya se encuentra registrada'); </script>";?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula del  médico</p>
                                <input type="text" name="cedula" value="<?php echo $row['cedula']; $cedula2 = $row['cedula'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Primer nombre del médico</p>
                                <input type="text" name="nombre" value="<?php echo $row['nombre']; $nombre2 = $row['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Apellido del médico</p>
                                <input type="text" name="apellido" value="<?php echo $row['apellido']; $apellido2 = $row['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Número de colegiatura</p>
                                <input type="number" name="colegiatura" class="form-control" placeholder="Ingrese número de colegiatura" required onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Título</p>
                                <input type="text" name="titulo" class="form-control" placeholder="Ingrese título" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                            </div><br>
                            <input type="submit" value="Guardar" class="btn btn-outline-light" name="save" style="background-color: #989cf3">

                        <?php }else{ ?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula del médico</p>
                                <input type="text" name="cedula" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Primer nombre del médico</p>
                                <input type="text" name="nombre"  class="form-control"  placeholder="Ingrese nombre" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Apellido del médico</p>
                                <input type="text" name="apellido"  class="form-control" placeholder="Ingrese apellido" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Número de colegiatura</p>
                                <input type="number" name="colegiatura" class="form-control" placeholder="Ingrese número de colegiatura" required onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br><!--y el tipo que es texto-->
                            <div class="form-group"><!---->
                                <p class="h7">Título</p>
                                <input type="text" name="titulo" class="form-control" placeholder="Ingrese título" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                            </div><br><!--y el tipo que es texto-->
                        <input type="submit" value="Guardar" class="btn btn-outline-light" name="save" style="background-color: #989cf3">
                    <?php } }?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php");













/*

                            //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------
                                echo "<script> alert('La persona ya se encuentra registrada'); </script>";
                                ?>
                                <div class="form-group"><!---->
                                    <p class="h7">Cédula de persona</p>
                                    <input type="text" name="cedula" value="<?php echo $row['cedula']; $cedula2 = $row['cedula'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Primer nombre de persona</p>
                                    <input type="text" name="nombre" value="<?php echo $row['nombre']; $nombre2 = $row['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Apellido de persona</p>
                                    <input type="text" name="apellido" value="<?php echo $row['apellido']; $apellido2 = $row['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                                </div><br>
                                    <p class="h7">Dirección de propietario</p>
                                <textarea name="direccion" rows="2" class="form-control" placeholder="Ingrese dirección"></textarea>
                                <br>
                                <div class="form-group"><!---->
                                    <p class="h7">Teléfono</p>
                                    <input type="text" name="telefono" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()">
                                </div><br>
                            <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                        <?php } else{$cedula=$_GET['cedula'];
                            //---------------SI NO CUMPLE NINGUNA DE LAS DOS ANTERIORES, SE REGISTRARA COMO UNA NUEVA PERSONA/PROPIETARIO------------
                            ?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula de propietario</p>
                                <input type="text" name="cedula" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Primer nombre de propietario</p>
                                <input type="text" name="nombre"  class="form-control" placeholder="Ingrese nombre" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Apellido de propietario</p>
                                <input type="text" name="apellido"  class="form-control" placeholder="Ingrese apellido" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <p class="h7">Dirección de propietario</p>
                            <textarea name="direccion" rows="2" class="form-control" placeholder="Ingrese dirección"></textarea>
                            <br>
                            <div class="form-group"><!---->
                                <p class="h7">Teléfono</p>
                                <input type="text" name="telefono" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()">
                            </div><br>
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                        <?php }
                        }?>
                </form>


























<?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
                <form action="save.php" method="POST"><!--esto se deja igual-->
                    <div class="form-group">
                        <p class="h7">Cédula del médico:</p>
                        <input type="number" name="cedula" class="form-control" placeholder="Ingrese su cédula" required  onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre del médico:</p>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br><!--y el tipo que es texto-->
                    <div class="form-group"><!---->
                        <p class="h7">Apellido del médico:</p>
                        <input type="text" name="apellido" class="form-control" placeholder="Ingrese su apellido" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br><!--y el tipo que es texto-->
                    <div class="form-group"><!---->
                        <p class="h7">Número de colegiatura:</p>
                        <input type="number" name="colegiatura" class="form-control" placeholder="Ingrese su numero de colegiatura" required onkeypress="return valideKey(event);"onblur="limpia()">
                    </div><br><!--y el tipo que es texto-->
                    <div class="form-group"><!---->
                        <p class="h7">Título:</p>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese su titulo" required onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br><!--y el tipo que es texto-->
                    <input type="submit" name="save" value="Guardar"  class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
            </div>

*/
?>