<?php include("include/header.php");?>

<br><br>
<div class="col-md-4 mx-auto" style="width: 400px; margin-top: -10px !important; margin-bottom: 50px !important;">
  <img src="img/Contactanos.png" class="rounded mx-auto d-block" width="160" height="35"></a>
<div class="card card-body">
  <form action="enviar_correo.php" method="POST">
      <div class="form-group">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre completo">
        </div><br>
      <div class="form-group">
        <input type="email" name="correo" class="form-control" placeholder="Correo electrónico">
      </div><br>
      <div class="form-group">
        <input type="text" name="asunto" class="form-control" placeholder="Asunto o sugerencia">
      </div><br>
      <div class="form-group">
        <textarea name="mensaje" id="" cols="30" rows="5"  class="form-control" placeholder="Mensaje"></textarea>
      </div><br>
      <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" name="save" value="Enviar" class="btn btn-outline-light" type="button" style="background-color: #989cf3"></button>
      </div>
    </form>
</div>
</div><br><br>

<?php include("include/footer.php");?>