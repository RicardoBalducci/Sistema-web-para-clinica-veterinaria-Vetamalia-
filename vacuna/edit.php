<?php
include("../database/db.php");//incluir base de datos
$codigo ='';
$nombre = '';//colocarmos igual
$costo = '';//$costo = ''
    //si existe dentro de get id
    if(isset($_GET['id'])){
        $codigo = $_GET['id'];//se queda igual
        //$query = "SELECT * FROM vacuna WHERE vacuna=$id";
        $querys = "SELECT * FROM vacuna WHERE codigo_vacuna=$codigo";
        $result = mysqli_query($conn, $querys);
        if (mysqli_num_rows($result) == 1) {
            //las filas
            $row = mysqli_fetch_array($result);//mysqli_fetch_array el guardar la información en los índices numéricos del array resultante
            $codigo = $row['codigo_vacuna'];
            $nombre = $row['nombre'];//queda igual
            $costo = $row['costo'];//$costo= = $row['costo'];
        }
    }
    //si encontramos usando el metodo post el editar
    if (isset($_POST['update'])){
        $id = $_GET['id'];//queda igual
        $nombre= $_POST['nombre_vacuna'];//queda igual
        $costo = $_POST['costo'];//$vacuna = $_POST['vacuna'];
        $query = "UPDATE vacuna set nombre_vacuna = '$nombre', costo = '$costo' WHERE codigo_vacuna=$id";
        mysqli_query($conn, $query);//comprobamos
        //y mendamos un mensaje diciendo que fue exitoso
        $_SESSION['message'] = 'Se modifico exitosamente';
        $_SESSION['message_type'] = 'success';
        header('Location: vacuna.php');
    }
?>
<?php include('../include/headers.php'); ?>
<div class="container p-4">
    <img src="../img/Vacunas.png" class="rounded mx-auto d-block" width="160" height="35"></a>
    <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <img src="../img/Modificar.png" class="rounded mx-auto d-block" width="160" height="35"></a>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <p class="h7">Código de la vacuna:</p>
                        <input name="codigo" type="text" class="form-control" class="display-1"  value="<?php echo $codigo; ?>" placeholder="remplace cedula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Nombre de la vacuna:</p>
                        <input name="nombre_vacuna" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Introduzca nuevo nombre"  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div>
                    <br><div class="form-group">
                        <p class="h7">Costo de la vacuna:</p>
                        <input name="costo" type="number" step="0.001" min="0.00" max="999999.99" class="form-control" value="<?php echo $costo; ?>" placeholder="Introduzca nuevo costo">
                    </div><!--cambiar apellido por costo igual en $apellido-->
                    <br> <button class="btn btn-outline-light" name="update" style="background-color: #989cf3">
                        Cambiar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php'); ?>