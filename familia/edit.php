<?php include("../database/db.php");
$codigo = '';
$descripcion = '';
    //si existe dentro de get id
    if(isset($_GET['id'])){
        $codigo = $_GET['id'];//se queda igual
        $query = "SELECT * FROM familia WHERE codigo_familia=$codigo";
        $result = mysqli_query($conn, $query);
        //si el mysqli Retorna el número de filas del resultado es == 1
        if (mysqli_num_rows($result) == 1) {
            //las filas
            $row = mysqli_fetch_array($result);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
            $codigo = $row['codigo_familia'];
            $descripcion = $row['descripcion'];//queda igual
        }
    }
    //si encontramos usando el metodo post el editar
    if (isset($_POST['update'])){
        $id = $_GET['id'];//queda igual
        $descripcion= $_POST['descripcion'];
        $query = "UPDATE familia set descripcion = '$descripcion' WHERE codigo_familia=$id";
        mysqli_query($conn, $query);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        $_SESSION['message'] = 'se modifico exitosamente';
        $_SESSION['message_type'] = 'success';
        header('Location: familia.php');
    }
?>
<?php include("../include/headers.php")?><!--incluimos el header-->

<div class="container p-4">
    <img src="../img/Familia.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a> 
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <p class="h7">Codigo de familia: </p>
                        <input name="codigo" type="text" class="form-control" class="display-1"  value="<?php echo $codigo; ?>" placeholder="Reemplace Familia" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                    <p class="h7">Nombre de la familia: </p>
                        <input name="descripcion" type="text" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Cambie la descripción" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <input type="submit" name="update" value="Cambiar"class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../include/footer.php")?>