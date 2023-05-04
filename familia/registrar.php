<?php include("../database/db.php");?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
        <img src="../img/Familia.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body"> 
                <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <!--FORMULARIO-->
                <form action="registrar.php">
                        <div class="form-group"><!---->
                            <p class="h7">Nombre del familia</p>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre del familia" required  onkeypress="return soloLetras(event)">
                            <!--CAMBIAR BOTON AQUI -->
                            <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                        </div><br>
                    </form>
                    <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['nombre'])){
                            $nombre=$_GET['nombre'];
                            $sql = "SELECT * FROM familia WHERE descripcion LIKE '%$nombre%'";
                            $result = $conn->query($sql);
                            if($rowe = $result->fetch_assoc()){
                                echo "<script> alert('El familia ya se encuentra registrado'); </script>";
                                ?>
                                <div class="form-group">
                                    <p class="h7">Código del familia:</p>
                                    <input type="text" name="descripcion" value="<?php echo $rowe['codigo_familia']; $nombre2 = $rowe['codigo_familia'];?>" class="form-control"required placeholder="Ingrese el nombre del familia"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Nombre del familia:</p>
                                    <input type="text" name="descripcion" value="<?php echo $rowe['descripcion']; $nombre2 = $rowe['descripcion'];?>"  class="form-control"required placeholder="Ingrese el nombre del familia"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <a href="familia.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrar</a>
                            <?php } else{  $nombre=$_GET['nombre'];?>
                                <div style="margin-top: 8px !important; margin-bottom: 8px !important;">Seleccione Reino : <select name="cod_reino" id="cod_reino">
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
                                <div class="form-group"><!-- INGRESAMOS DESCRIPCION DELIMITADA  -->
                                    <p class="h7">Nombre del familia:</p>
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




                    <form id="combo" name="combo" action="save.php" method="POST" >
                    <div style="margin-top: 8px !important; margin-bottom: 8px !important;">Seleccione Reino : <select name="cod_reino" id="cod_reino">
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
                        <p class="h7">Nombre de la familia</p>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <input type="submit" id="enviar" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                </form>
*/?>