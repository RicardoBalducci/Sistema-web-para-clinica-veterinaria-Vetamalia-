<?php include("../database/db.php");

if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $status = $_POST['status'];
    if($password == $confirmpassword){
        $query = "INSERT INTO persona (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
        $querys = "INSERT INTO asistente (cedula_asistente, login, password, status) VALUES ('$cedula', '$login', '$password', '$status')";
        $result=mysqli_query($conn,$query);
        $resultado = mysqli_query($conn,$querys);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        echo
        "<script> alert('Error verifique de nuevo'); </script>";
    }
    if(!$resultado){
        echo
        "<script> alert('Error verifique de nuevo'); </script>";
    }
    header("Location: usuario.php");

    //con esto creamos un mensaje que se mostrara en pantalla cuando se guarde de manera exitosa
    $_SESSION['message'] = "Tarea guardada satisfactoriamente";
    $_SESSION['message_type'] = 'success';//esto es un color
    echo
    "<script> alert('Exitosa'); </script>";
    }else{
        echo
        "<script> alert('No coinciden los password'); </script>";
    }
}
include ("../include/headers.php");
?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
            <img src="../img/Usuario.png" class="rounded mx-auto d-block" style="width=160 height=35; margin-top: -10px !important; margin-bottom: 50px !important;"></a>
            <div class="card card-body"><!--formulario de preguntas-->
                <form action="registrar.php">
                    <div class="form-group"><!---->
                        <p class="h7">Cédula de usuario</p>
                        <input type="number" name="cedula" class="form-control" placeholder="Ingrese cédula de usuario" required  onkeypress="return valideKey(event);"onblur="limpia()" >
                        <input type="submit" class="btn btn-outline-light" name="buscar" value="Buscar" style="background-color: #989cf3; margin-top: 20px !important;">
                    </div><br>
                </form>
                <form action="save.php" method="POST">
                    <?php
                        if(isset($_GET['cedula'])){
                            $cedula=$_GET['cedula'];
                            $sql = "SELECT * FROM asistente WHERE cedula_asistente LIKE '%$cedula%'";
                            $resultado = $conn->query($sql);
                            $sqls = "SELECT * FROM persona WHERE cedula LIKE '%$cedula%'";
                            $resultados = $conn->query($sqls);
                            //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
                            if($row = $resultado->fetch_assoc()){
                                echo "<script> alert('El usuario ya se encuentra registrado'); </script>";?>
                                <div class="form-group"><!---->
                                    <p class="h7">Cédula de usuario</p>
                                    <input type="text" name="cedula" value="<?php echo $row['cedula_asistente']; $cedula2 = $row['cedula_asistente'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Nombre de usuario</p>
                                    <input type="text" name="cedula" value="<?php echo $row['login']; $login = $row['login'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Contraseña </p>
                                    <input type="password" name="cedula" value="<?php echo $row['password']; $login = $row['password'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Status </p>
                                    <input type="text" name="cedula" value="<?php echo $row['status']; $login = $row['status'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <a href="usuario.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Finalizar</a>

                        <?php }elseif($row = $resultados->fetch_assoc()){
                             //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------
                            echo "<script> alert('La persona ya se encuentra registrada'); </script>";?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula del usuario</p>
                                <input type="text" name="cedula" value="<?php echo $row['cedula']; $cedula2 = $row['cedula'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Primer nombre del usuario</p>
                                <input type="text" name="nombre" value="<?php echo $row['nombre']; $nombre2 = $row['nombre'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Apellido del usuario</p>
                                <input type="text" name="apellido" value="<?php echo $row['apellido']; $apellido2 = $row['apellido'];?>" class="form-control" placeholder="Ingrese teléfono" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Nombre de usuario</p>
                                <input type="text" name="login" class="form-control" required placeholder="Ingrese su nombre de usuario">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Contraseña</p>
                                <input type="password" name="password" class="form-control" required placeholder="Ingrese su contraseña">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Confirme su contraseña</p>
                                <input type="password" name="confirmpassword" class="form-control" required placeholder="Confirme su contraseña">
                            </div><br>
                            <div class="form-group">
                                <div>Seleccione  :
                                <select name="status" id="status">
                                    <option value="Seleccione status">Seleccione status</option>
                                    <option value="activo">Activo</option>
                                </select></div>
                            </div><br>
                            <input type="submit" value="Guardar" class="btn btn-outline-light" name="save" style="background-color: #989cf3">
                            </div>
                        <?php } else { $cedula=$_GET['cedula'];?>
                            <div class="form-group"><!---->
                                <p class="h7">Cédula de persona</p>
                                <input type="text" name="cedula" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Primer nombre de persona</p>
                                <input type="text" name="nombre"class="form-control" required  placeholder="Ingrese su primer nombre" onkeypress="return soloLetras(event)"  id="miInput">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Apellido de persona</p>
                                <input type="text" name="apellido" class="form-control" required  placeholder="Ingrese su apellido" onkeypress="return soloLetras(event)"  id="miInput">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Nombre de usuario</p>
                                <input type="text" name="login" class="form-control" required placeholder="Ingrese su nombre de usuario">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Contraseña</p>
                                <input type="password" name="password" class="form-control" required placeholder="Ingrese su contraseña">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Confirme su contraseña</p>
                                <input type="password" name="confirmpassword" class="form-control" required placeholder="Confirme su contraseña">
                            </div><br>
                            <div class="form-group">
                                    <div>Seleccione  :
                                    <select name="status" id="status">
                                        <option value="Seleccione status">Seleccione status</option>
                                        <option value="activo">Activo</option>
                                    </select></div>
                                    </div><br>
                            <div class="form-group">
                                <input type="submit" value="Guardar" class="btn btn-outline-light" name="save" style="background-color: #989cf3">

                            </div>
                            <?php } }?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../include/footer.php");


/*

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
                            <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">

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
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    <?php } }?>
                </form>
















<form action="registrar.php" method="POST">
                    <p class="h1">Usuario</p>
                    <p class="h2">Registrar</p><br>
                    <div class="form-group">
                        <p class="h7">Cédula de persona</p>
                        <input type="number" name="cedula"class="form-control" required  placeholder="Ingrese su cédula" onkeypress="return valideKey(event);">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Primer nombre de persona</p>
                        <input type="text" name="nombre"class="form-control" required  placeholder="Ingrese su primer nombre" onkeypress="return soloLetras(event)"  id="miInput">
                    </div><br>

                    <div class="form-group">
                        <p class="h7">Apellido de persona</p>
                        <input type="text" name="apellido" class="form-control" required  placeholder="Ingrese su apellido" onkeypress="return soloLetras(event)"  id="miInput">
                    </div><br>

                    <div class="form-group">
                        <p class="h7">Nombre de usuario</p>
                        <input type="text" name="login" class="form-control" required placeholder="Ingrese su nombre de usuario">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Contraseña</p>
                        <input type="password" name="password" class="form-control" required placeholder="Ingrese su contraseña">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Confirme su contraseña</p>
                        <input type="password" name="confirmpassword" class="form-control" required placeholder="Confirme su contraseña">
                    </div><br>
                    <div class="form-group">
                            <div>Seleccione  :
                            <select name="status" id="status">
                                <option value="Seleccione status">Seleccione status</option>
                                <option value="activo">activo</option>
                            </select></div>
                            </div><br>
                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn btn-success" name="save">
                    </div>
                </form>

*/
?><!--aqui incluimos el footer y lo repetimos-->