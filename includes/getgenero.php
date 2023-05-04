<?php
	require ('conexion.php');
	$codigo_familia = $_POST['codigo_familia'];
	$query = "SELECT codigo_genero, descripcion FROM genero WHERE codigo_familia = '$codigo_familia' ORDER BY descripcion";
	$resultado=$mysqli->query($query);
	$html= "<option value='0'>Seleccione Genero </option>";
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['codigo_genero']."'>".$row['descripcion']."</option>";
	}
	echo $html;
?>
<?php
/*GUIA DEL ORDEN EN QUE SE REALIZA, Y CADA NOMBRE ES EL DE LA BASE DE DATOS
reino = codigo_reino,descripcion.
phylum = codigo_reino, descripcion, codigo_phylum
clase = codigo_phylum, descripcion, codigo_clase
orden = codigo_clase , descripcion, codigo_orden
familia = codigo_orden , descripcion, codigo_familia
genero = codigo_familia , descripcion, codigo_genero
especie = codigo_genero , descripcion, codigo_especie

YA LES ADELANTE ESTO SIN EMBARGO DEBEN VER EN PRUEBA QUE SE PUEDE MOSTRAR
*/
?>