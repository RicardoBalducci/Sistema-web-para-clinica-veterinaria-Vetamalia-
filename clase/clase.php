<?php include("../database/db.php");?>
<?php include("../include/headers.php")?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <img src="../img/Clase.png" class="rounded mx-auto d-block" width="160" height="35"></a>
            <a href="registrar.php" class="btn btn-outline-light" type="button" style="background-color: #989cf3">Registrarse</a>
            <!-- MESSAGES -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>
            <table class="table table-bordered" id="example">
                <thead><!--creamos un encabezado-->
                    <tr><!--seccionamos todos los elementos que contendra-->
                        <th>Código Phylum</th>
                        <th>Código Clase</th>
                        <th>Descripción</th>
                        <th>Acciones</th><!--colocar igual-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM clase";
                    $result = mysqli_query($conn,$query);
                    while($row =mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['codigo_phylum']?>
                            <td><?php echo $row['codigo_clase']?>
                            <td><?php echo $row['descripcion']?>
                            <td>
                                <a href="edit.php?id=<?php echo $row['codigo_clase']?>" class="btn btn-outline-light" type="button" style="background-color: #6a6aeb" onclick="return  ConfirmarEditar()">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['codigo_clase']?>" class="btn btn-outline-light" type="button" style="background-color: #fa9543" onclick="return ConfirmarEliminar()">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../include/footer.php")
/*
        $(document).ready(function(){
			$("#cod_phylum").change(function () {
				$("#cod_phylum option:selected").each(function () {
					codigo_phylum = $(this).val();
					$.post("../includes/getclase.php", { codigo_phylum: codigo_phylum }, function(data){
						$("#cod_clase").html(data);
					});
				});
			})
		});
        $(document).ready(function(){
			$("#cod_clase").change(function () {
				$("#cod_clase option:selected").each(function () {
					codigo_clase = $(this).val();
					$.post("../includes/getorden.php", { codigo_clase: codigo_clase }, function(data){
						$("#cod_orden").html(data);
					});
				});
			})
		});
        $(document).ready(function(){
			$("#cod_orden").change(function () {
				$("#cod_orden option:selected").each(function () {
					codigo_orden = $(this).val();
					$.post("../includes/getfamilia.php", { codigo_orden: codigo_orden }, function(data){
						$("#cod_familia").html(data);
					});
				});
			})
		});
        $(document).ready(function(){
			$("#cod_familia").change(function () {
				$("#cod_familia option:selected").each(function () {
					codigo_familia = $(this).val();
					$.post("../includes/getgenero.php", { codigo_familia: codigo_familia }, function(data){
						$("#cod_genero").html(data);
					});
				});
			})
		});
        $(document).ready(function(){
			$("#cod_genero").change(function () {
				$("#cod_genero option:selected").each(function () {
					codigo_familia = $(this).val();
					$.post("../include/getespecie.php", { codigo_familia: codigo_familia }, function(data){
						$("#cod_especie").html(data);
					});
				});
			})
		});
		$(document).ready(function(){
			$("#cod_genero").change(function () {
				$("#cod_genero option:selected").each(function () {
					codigo_familia = $(this).val();
					$.post("../include/getespecie.php", { codigo_familia: codigo_familia }, function(data){
						$("#cod_especie").html(data);
					});
				});
			})
		});
*/
?>