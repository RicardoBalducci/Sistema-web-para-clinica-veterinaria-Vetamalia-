<?php include("../database/db.php");?>
<?php include("../include/headers.php")?><!--incluimos el header-->


<div class="container p-4">
<img src="../img/Reino.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
            <img src="../img/Registro.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                    <form action="registrar.php">
                        <div class="form-group"><!---->
                            <p class="h7">Nombre del reino</p>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre del reino" required  onkeypress="return soloLetras(event)">
                            <!--CAMBIAR BOTON AQUI -->
                            <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                        </div><br>
                    </form>
                    <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['nombre'])){
                            $nombre=$_GET['nombre'];
                            $sql = "SELECT * FROM reino WHERE descripcion LIKE '%$nombre%'";
                            $resultado = $conn->query($sql);
                            if($row = $resultado->fetch_assoc()){
                                echo "<script> alert('El reino ya se encuentra registrado'); </script>";
                                ?>
                                <div class="form-group">
                                    <p class="h7">Código del reino:</p>
                                    <input type="text" name="descripcion" value="<?php echo $row['codigo_reino']; $nombre2 = $row['codigo_reino'];?>" class="form-control"required placeholder="Ingrese el nombre del reino"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <div class="form-group">
                                    <p class="h7">Nombre del reino:</p>
                                    <input type="text" name="descripcion" value="<?php echo $row['descripcion']; $nombre2 = $row['descripcion'];?>"  class="form-control"required placeholder="Ingrese el nombre del reino"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                                </div><br>
                                <a href="reino.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrar</a>
                        <?php } else{  $nombre=$_GET['nombre'];?>
                            <div class="form-group">
                                <p class="h7">Nombre del reino:</p>
                                <input type="text" name="descripcion" value="<?php echo "$nombre"; $nombre3 = $nombre?>" class="form-control"required placeholder="Ingrese el nombre del reino"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                            </div><br>
                            <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                        <?php }
                        }?>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");


/*
                    <div class="form-group">
                        <p class="h7">Nombre del reino:</p>
                        <input type="text" name="descripcion" class="form-control"required placeholder="Ingrese el nombre del reino"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <input type="submit" name="save" value="Guardar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                
*/
?>