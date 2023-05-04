<?php include("../database/db.php");?><!--incluimos la base de datos-->
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
        <img src="../img/Medicinas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="registrar.php">
                    <div class="form-group"><!---->
                        <p class="h7">Nombre de la medicina</p>
                        <input type="text" name="nombre_medicina" class="form-control" placeholder="Ingrese el nombre de la medicina" required >
                        <!--CAMBIAR BOTON AQUI -->
                        <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                    </div><br>
                </form>
                <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['nombre_medicina'])){
                            $nombre = $_GET['nombre_medicina'];
                            $sql = "SELECT * FROM medicina WHERE nombre_medicina LIKE '%$nombre%'";
                            $resultado = $conn->query($sql);
                            if($row = $resultado->fetch_assoc()){
                            //----------------REVISAMOS SI EXISTE LA medicina Y SE MANDA UN ALERTA DE QUE YA EXISTE-----
                                echo "<script> alert('La medicina ya se encuentra registrada'); </script>";
                                ?>
                                <div class="form-group">
                                    <p class="h7">Código de la medicina</p>
                                    <input type="text" name="codigo_medicina" value="<?php echo $row['codigo_medicina']; $nombre_medicina = $row['codigo_medicina'];?>" class="form-control" required placeholder="Digite el nombre de la medicina" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" readonly>
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Nombre de la medicina</p>
                                    <input type="text" name="nombre_medicina" value="<?php echo $row['nombre_medicina']; $nombre_medicina = $row['nombre_medicina'];?>" class="form-control" required placeholder="Digite el nombre de la medicina" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" readonly>
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Precio de la medicina</p>
                                    <input type="number" name="costo" class="form-control" value="<?php echo $row['costo']; $nombre_medicina = $row['costo'];?>" required step="0.001" min="0.00" max="999999.99" placeholder="Digite el costo"  readonly>
                                </div><br>
                                <button><a href="medicina.php">Regresar</a></button>
                                <?php } else{ $nombre = $_GET['nombre_medicina'];
                                echo "<script> alert('La medicina no se encuentra registrada'); </script>";
                                 //----------------SI NO EXISTE AUTOMATICAMENTE PASAMOS A REGISTRARLA-----?>
                                <div class="form-group"><!--aqui lo unico a modificar es cedula por codigo-->
                                    <p class="h7">Nombre de la medicina:</p>
                                    <input type="text" name="nombre_medicina" class="form-control" value="<?php echo "$nombre"; $nombre1 = $nombre?>" required placeholder="Digite el nombre de la medicina" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br><!--y el tipo que es texto-->
                                <div class="form-group">
                                    <p class="h7">Precio de la medicina:</p>
                                    <input type="number" name="costo" class="form-control" required step="0.001" min="0.00" max="999999.99" placeholder="Digite el costo" >
                                </div><br><!--y el tipo que es texto-->
                                <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                            <?php }
                        }?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php");?>