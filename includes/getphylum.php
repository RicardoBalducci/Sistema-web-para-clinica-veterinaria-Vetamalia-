<?php
	require ('conexion.php');//CONEXION CON BASE DE DATOS
	$codigo_reino = $_POST['codigo_reino'];//INDICAMOS CUAL ES EL CODIGO DE REINO
	//LO BUSCAMOS EN LA BASE DE DATOS SI COINCIDE
	$queryM = "SELECT codigo_phylum, descripcion FROM phylum WHERE codigo_reino = '$codigo_reino' ORDER BY descripcion";
	$resultadoM = $mysqli->query($queryM);//LO ALMACENAMOS EN UNA VARIABLE QUE DEVUELVE UN TRUE
	$html= "<option value='0'>Seleccione phylum </option>";//POR MEDIO DE LA VARIABLE HTML DAMOS LAS OPCIONES Y LOS SELECT
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['codigo_phylum']."'>".$rowM['descripcion']."</option>";//Y POR ULTIMO TODOS LOS VALORES LOS MOSTRAMOS
	}
	echo $html;

/*GUIA DEL ORDEN EN QUE SE REALIZA, Y CADA NOMBRE ES EL DE LA BASE DE DATOS
reino = codigo_reino,descripcion.
phylum = codigo_reino, descripcion, codigo_phylum
clase = codigo_phylum, descripcion, codigo_clase
orden = codigo_clase , descripcion, codigo_orden
familia = codigo_orden , descripcion, codigo_familia
genero = codigo_familia , descripcion, codigo_genero
especie = codigo_genero , descripcion, codigo_especie

YA LES ADELANTE ESTO SIN EMBARGO DEBEN VER EN PRUEBA QUE SE PUEDE MOSTRAR
*/?>
