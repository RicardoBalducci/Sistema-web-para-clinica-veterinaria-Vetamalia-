<?php
	require ('conexion.php');//HACEMOS UN LLAMADO A LA BASE DE DATOS CONEXION
	$codigo_phylum = $_POST['codigo_phylum'];//INDICAMOS CUAL ES EL NOMBRE QUE GUARDAREMOS
	$query = "SELECT codigo_clase, descripcion FROM clase WHERE codigo_phylum = '$codigo_phylum' ORDER BY descripcion";//Y HACEMOS UNA BUSQUEDA
	//DONDE MUESTRA GTODOS LOS VALORES QUE ESTEN RELACIONES AL CODIGO DE PHYLUM, DENTRO DE LA BASE DE DATOS DE CLASE
	$resultado=$mysqli->query($query);
	$html= "<option value='0'>Seleccione Clase </option>";//POR MEDIO DE UNA VARIABLE QUE LLAMAMOS HTML PERMITIREMOS EL LLAMAR A LAS OPCIONES
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['codigo_clase']."'>".$row['descripcion']."</option>";//Y MOSTRAMOS LOS RESULTADOS
	}
	echo $html;
	/*GUIA DEL ORDEN EN QUE SE REALIZA, Y CADA NOMBRE ES EL DE LA BASE DE DATOS
reino = codigo_reino,descripcion.---listo
phylum = codigo_reino, descripcion, codigo_phylum---listo
clase = codigo_phylum, descripcion, codigo_clase---listo
orden = codigo_clase , descripcion, codigo_orden---listo
familia = codigo_orden , descripcion, codigo_familia---listo
genero = codigo_familia , descripcion, codigo_genero
especie = codigo_genero , descripcion, codigo_especie

YA LES ADELANTE ESTO SIN EMBARGO DEBEN VER EN PRUEBA QUE SE PUEDE MOSTRAR
*/
?>