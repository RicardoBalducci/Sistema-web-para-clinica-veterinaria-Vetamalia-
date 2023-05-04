<?php include("../database/db.php");?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
        <img src="../img/Phylum.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">
            <div class="card card-body">
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="registrar.php">
                        <div class="form-group"><!---->
                            <p class="h7">Nombre del phylum</p>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre del phylum" required  onkeypress="return soloLetras(event)">
                            <!--CAMBIAR BOTON AQUI -->
                            <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                        </div><br>
                    </form>
                    <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['nombre'])){
                            $nombre=$_GET['nombre'];
                            $sql = "SELECT * FROM phylum WHERE descripcion LIKE '%$nombre%'";
                            $result = $conn->query($sql);
                            if($rowe = $result->fetch_assoc()){
                                echo "<script> alert('El phylum ya se encuentra registrado'); </script>";
                                ?>
                                <div class="form-group">
                                    <p class="h7">Código del phylum:</p>
                                    <input type="text" name="descripcion" value="<?php echo $rowe['codigo_phylum']; $nombre2 = $rowe['codigo_phylum'];?>" class="form-control"required placeholder="Ingrese el nombre del phylum"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Nombre del phylum:</p>
                                    <input type="text" name="descripcion" value="<?php echo $rowe['descripcion']; $nombre2 = $rowe['descripcion'];?>"  class="form-control"required placeholder="Ingrese el nombre del phylum"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <a href="phylum.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrar</a>
                            <?php } else{  $nombre=$_GET['nombre'];?>
                                <div>Selecciona Reino : <select name="cod_reino" id="cod_reino"><!-- CREAMOS UN DIV QUE NOS MUESTRE USANDO SELECT TODOS LOS ELEMENTOS QUE CONFORMAN A REINO  -->
                                        <option value="0">Seleccionar Reino</option>
                                        <?php while($row = $resultado->fetch_assoc()) { ?><!-- Y POR MEDIO DE RECORRER TODOS LOS ELEMENTOS  -->
                                            <option value="<?php echo $row['codigo_reino']; ?>"><?php echo $row['descripcion']; ?></option><!-- LOS LLAMAMOS Y MOSTRAMOS EN OPCIONES  -->
                                        <?php } ?>
                                    </select></div><br>
                                <div class="form-group"><!-- INGRESAMOS DESCRIPCION DELIMITADA  -->
                                    <p class="h7">Nombre del phylum:</p>
                                    <input type="text" name="descripcion" value="<?php echo "$nombre"; $nombre3 = $nombre?>" class="form-control" placeholder="Ingrese la descripción" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                        <?php }
                    }?>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");


/*
                    <


<form id="combo" name="combo" action="save.php" method="POST" >
                        <div>Selecciona Reino : <select name="cod_reino" id="cod_reino"><!-- CREAMOS UN DIV QUE NOS MUESTRE USANDO SELECT TODOS LOS ELEMENTOS QUE CONFORMAN A REINO  -->
                                <option value="0">Seleccionar Reino</option>
                                <?php while($row = $resultado->fetch_assoc()) { ?><!-- Y POR MEDIO DE RECORRER TODOS LOS ELEMENTOS  -->
                                    <option value="<?php echo $row['codigo_reino']; ?>"><?php echo $row['descripcion']; ?></option><!-- LOS LLAMAMOS Y MOSTRAMOS EN OPCIONES  -->
                                <?php } ?>
                            </select></div><br>
                        <div class="form-group"><!-- INGRESAMOS DESCRIPCION DELIMITADA  -->
                            <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                        </div><br>
                        <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </form>


                    <form action="registrar.php">
                        <div class="form-group"><!---->
                            <p class="h7">Nombre del phylum</p>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre del phylum" required  onkeypress="return soloLetras(event)">
                            <input type="submit" class="btn btn-success btn-block" name="buscar" value="buscar" >
                        </div><br>
                    </form>
                    <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['nombre'])){
                            $nombre=$_GET['nombre'];
                            $sql = "SELECT * FROM phylum WHERE descripcion LIKE '%$nombre%'";
                            $resultado = $conn->query($sql);
                            if($row = $resultado->fetch_assoc()){
                                echo "<script> alert('El phylum ya se encuentra registrado'); </script>";
                                ?>
                                <div class="form-group">
                                    <p class="h7">Código del phylum:</p>
                                    <input type="text" name="descripcion" value="<?php echo $row['codigo_phylum']; $nombre2 = $row['codigo_phylum'];?>" class="form-control"required placeholder="Ingrese el nombre del phylum"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Nombre del phylum:</p>
                                    <input type="text" name="descripcion" value="<?php echo $row['descripcion']; $nombre2 = $row['descripcion'];?>"  class="form-control"required placeholder="Ingrese el nombre del phylum"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <button><a href="phylum.php">Registrar</a></button>
                        <?php } else{  $nombre=$_GET['nombre'];?>

                            <div>Selecciona Reino : <select name="cod_reino" id="cod_reino"><!-- CREAMOS UN DIV QUE NOS MUESTRE USANDO SELECT TODOS LOS ELEMENTOS QUE CONFORMAN A REINO  -->
                            <option value="0">Seleccionar Reino</option>
                            <?php while($row = $resultado->fetch_assoc()) { ?><!-- Y POR MEDIO DE RECORRER TODOS LOS ELEMENTOS  -->
                                <option value="<?php echo $row['codigo_reino']; ?>"><?php echo $row['descripcion']; ?></option><!-- LOS LLAMAMOS Y MOSTRAMOS EN OPCIONES  -->
                            <?php } ?>
                        </select></div>
                    </div><br>
                    <div class="form-group"><!-- INGRESAMOS DESCRIPCION DELIMITADA  -->
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                            <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>

                        <?php }
                        }?>
*/
?>