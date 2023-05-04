<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VETAMALIA - Sistema Veterinario</title>
    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FONT-AWESONE-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- DATA TABLE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<!--Icon OffPage-->
<link rel="icon" type="image/png" href="../img/VetamaliaIcon.png">

</head>
<body>

<!-- PARTE SUPERIOR--> 
<a class="row">
<img src="..\img\BannerVetamalia2.png"></a>
<a class="navbar-brand" href="../home.php">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #989cf3;">
<img src="..\img\HomeReload.png" width="160" height="35"></a>


<!-- BOTONES Y REDIRECCIONAMIENTOS-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <div class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../img/Persona.png" width="110" height="20"></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../persona/persona.php">Persona</a>
                    <a class="dropdown-item" href="../propietario/propietario.php">Propietario</a>
                    <a class="dropdown-item" href=../medico/medico.php>Médico</a>
                </div>
            </div>
            <div class="navbar-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../img/Consulta.png" width="110" height="20"></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../aplicar/aplica.php">Aplica</a>
                        <a class="dropdown-item" href="../consulta/consulta.php">Consulta</a>
                        <a class="dropdown-item" href="../recetar/receta.php">Receta</a>
                        <a class="dropdown-item" href="../vacuna/vacuna.php">Vacunas</a>
                        <a class="dropdown-item" href="../medicina/medicina.php">Medicinas</a>
                </div>
            </div>
            <div class="navbar-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../img/Citas.png" width="110" height="20"></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../cita/cita.php">Citas</a>
                        <a class="dropdown-item" href="../mascota/mascota.php">Mascota</a>
                </div>
            </div>
            <div class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../img/Mascota.png" width="110" height="20"></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../reino/reino.php">Reino</a>
                        <a class="dropdown-item" href="../phylum/phylum.php">Phylum</a>
                        <a class="dropdown-item" href="../clase/clase.php">Clase</a>
                        <a class="dropdown-item" href="../orden/orden.php">Orden</a>
                        <a class="dropdown-item" href="../familia/familia.php">Familia</a>
                        <a class="dropdown-item" href="../genero/genero.php">Género</a>
                        <a class="dropdown-item" href="../especie/especie.php">Especie</a>
                </div>
            </div>
            <div class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../img/Informacion.png" width="120" height="22"></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../contacto.php">Contáctanos</a>
                </div>
            </div>
            <div class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../img/Usuario.png" width="110" height="20"></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../usuario/usuario.php">Usuario</a>
                    <a class="dropdown-item" href="../login/logout.php">Salir</a>
                </div>
            </div>
        </ul>
    </div>
</nav>
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
        tecla_especial = false
        for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
    function valideKey(evt){
			// code is the decimal ASCII representation of the pressed key.
			var code = (evt.which) ? evt.which : evt.keyCode;
			if(code==8) { // backspace.
			    return true;
			} else if(code>=48 && code<=57) { // is a number.
			    return true;
			} else{ // other keys.
			    return false;
			}
	}
    function ConfirmarEliminar(){
        var respuesta = confirm("¿Estas seguro que deseas eliminar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
    function ConfirmarEditar(){
        var respuesta = confirm("¿Esta seguro que deseas modificar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
    function ConfirmarAplicar(){
        var respuesta = confirm("¿Esta seguro que deseas aplicar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
    function ConfirmarRecetar(){
        var respuesta = confirm("¿Esta seguro que deseas aplicar?");
        if(respuesta == true){
            return true
        }else{
            return false
        }
    }
</script>
<?php
    require ('../includes/conexion.php');
    $query = "SELECT codigo_reino, descripcion FROM reino ORDER BY descripcion";
    $resultado=$mysqli->query($query);
    $queryss = "SELECT codigo_vacuna, nombre_vacuna FROM vacuna ORDER BY nombre_vacuna";
    $resultados =$mysqli->query($queryss);

    $querysd = "SELECT codigo_medicina, nombre_medicina FROM medicina ORDER BY nombre_medicina";
    $resultas=$mysqli->query($querysd);

    $queryb= "SELECT cedula_propietario, nombre_mascota FROM mascota ORDER BY nombre_mascota";
    $resultb=$mysqli->query($queryb);

    ?>
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script language="javascript">
            $(document).ready(function(){
            $("#cod_reino").change(function (){//SI SE ENCUENTRA EL CODIGO SE REALIZARAN VARIAS OPERACIONES
                $('#cod_phylum').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');//DENTRO DE LAS OPCIONES
                $("#cod_reino option:selected").each(function () {//DAMOS ACCESO A PODER MOSTRAR
                    codigo_reino = $(this).val();
						$.post("../includes/getphylum.php", { codigo_reino: codigo_reino}, function(data){
							$("#cod_phylum").html(data);//EL CODIGO DE PHYLUM
					});
                });
            });
        });
        $(document).ready(function(){//DECLARAMOS FUNCIONES QUE NOS PERMITAN FILTRAR EL PROYECTO
			$("#cod_phylum").change(function () {//INDICAMOS EL CODIGO DEL CUAL NOS BASAREMOS PARA HACER LA BUSQUEDA
				$("#cod_phylum option:selected").each(function () {//Y POR MEDIO DE OTRA FUNCION PEDIMOS QUE SELECCIONE
					codigo_phylum = $(this).val();//AL MOMENTO DE SELECCIONAR INDICAMOS QUE ESA VARIABLE
					$.post("../includes/getclase.php", { codigo_phylum: codigo_phylum }, function(data){//LLAMARA A LOS GET DE CADA CAMPO
						$("#cod_clase").html(data);//Y DE ESTA FORMA, ACCEDEMOS Y MOSTRAMOS LOS DATOS QUE CONFORMAN LA OPCION QUE SELECCIONEMOS
					});
				});
			})
		});
        $(document).ready(function(){//DECLARAMOS FUNCIONES QUE NOS PERMITAN FILTRAR EL PROYECTO
			$("#cod_clase").change(function () {//INDICAMOS EL CODIGO DEL CUAL NOS BASAREMOS PARA HACER LA BUSQUEDA
				$("#cod_clase option:selected").each(function () {//Y POR MEDIO DE OTRA FUNCION PEDIMOS QUE SELECCIONE
					codigo_clase = $(this).val();//AL MOMENTO DE SELECCIONAR INDICAMOS QUE ESA VARIABLE
					$.post("../includes/getorden.php", { codigo_clase: codigo_clase }, function(data){//LLAMARA A LOS GET DE CADA CAMPO
						$("#cod_orden").html(data);//Y DE ESTA FORMA, ACCEDEMOS Y MOSTRAMOS LOS DATOS QUE CONFORMAN LA OPCION QUE SELECCIONEMOS
					});
				});
			})
		});
        $(document).ready(function(){//DECLARAMOS FUNCIONES QUE NOS PERMITAN FILTRAR EL PROYECTO
			$("#cod_orden").change(function () {//INDICAMOS EL CODIGO DEL CUAL NOS BASAREMOS PARA HACER LA BUSQUEDA
				$("#cod_orden option:selected").each(function () {//Y POR MEDIO DE OTRA FUNCION PEDIMOS QUE SELECCIONE
					codigo_orden = $(this).val();//AL MOMENTO DE SELECCIONAR INDICAMOS QUE ESA VARIABLE
					$.post("../includes/getfamilia.php", { codigo_orden: codigo_orden }, function(data){//LLAMARA A LOS GET DE CADA CAMPO
						$("#cod_familia").html(data);//Y DE ESTA FORMA, ACCEDEMOS Y MOSTRAMOS LOS DATOS QUE CONFORMAN LA OPCION QUE SELECCIONEMOS
					});
				});
			})
		});
        $(document).ready(function(){//DECLARAMOS FUNCIONES QUE NOS PERMITAN FILTRAR EL PROYECTO
			$("#cod_familia").change(function () {//INDICAMOS EL CODIGO DEL CUAL NOS BASAREMOS PARA HACER LA BUSQUEDA
				$("#cod_familia option:selected").each(function () {//Y POR MEDIO DE OTRA FUNCION PEDIMOS QUE SELECCIONE
					codigo_familia = $(this).val();//AL MOMENTO DE SELECCIONAR INDICAMOS QUE ESA VARIABLE
					$.post("../includes/getgenero.php", { codigo_familia: codigo_familia }, function(data){//LLAMARA A LOS GET DE CADA CAMPO
						$("#cod_genero").html(data);//Y DE ESTA FORMA, ACCEDEMOS Y MOSTRAMOS LOS DATOS QUE CONFORMAN LA OPCION QUE SELECCIONEMOS
					});
				});
			})
		});
        $(document).ready(function(){//DECLARAMOS FUNCIONES QUE NOS PERMITAN FILTRAR EL PROYECTO
			$("#cod_genero").change(function () {//INDICAMOS EL CODIGO DEL CUAL NOS BASAREMOS PARA HACER LA BUSQUEDA
				$("#cod_genero option:selected").each(function () {//Y POR MEDIO DE OTRA FUNCION PEDIMOS QUE SELECCIONE
					codigo_genero = $(this).val();//AL MOMENTO DE SELECCIONAR INDICAMOS QUE ESA VARIABLE
					$.post("../includes/getespecie.php", { codigo_genero: codigo_genero }, function(data){//LLAMARA A LOS GET DE CADA CAMPO
						$("#cod_especie").html(data);//Y DE ESTA FORMA, ACCEDEMOS Y MOSTRAMOS LOS DATOS QUE CONFORMAN LA OPCION QUE SELECCIONEMOS
					});
				});
			})
		});
    </script>
</body>
</html>