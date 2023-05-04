<?php include("../database/db.php");?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
        <img src="../img/Persona.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <!--ENUNCIADO-->
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <!--FORMULARIO-->
                <form action="registrar.php">
                    <div class="form-group"><!---->
                        <p class="h7">Cédula de persona</p>
                        <input type="number" name="cedula" class="form-control" placeholder="Ingrese cédula" required  onkeypress="return valideKey(event);"onblur="limpia()" >
                        <!--CAMBIAR BOTON AQUI -->
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
                            $sql = "SELECT * FROM persona WHERE cedula LIKE '%$cedula%'";
                            $resultado = $conn->query($sql);
                            if($row = $resultado->fetch_assoc()){
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
                                <!--CAMBIAR BOTON AQUI -->
                                <a href="persona.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Regresar</a>
                            </div>
                            <div class="form-group">
                            <?php } else{ $cedula=$_GET['cedula'];?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula de persona</p>
                                <input type="text" name="cedula" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Primer nombre de persona</p>
                                <input type="text" name="nombre"  class="form-control" placeholder="Ingrese nombre" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Apellido de persona</p>
                                <input type="text" name="apellido"  class="form-control" placeholder="Ingrese apellido" required onkeypress="return soloLetras(event)"onblur="limpia()">
                            </div><br>
                            <input type="submit" value="Guardar" class="btn btn-outline-light" name="save" style="background-color: #989cf3">
                            <?php } }?>
                    <?php
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>