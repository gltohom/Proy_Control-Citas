<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Citas</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Formulario de registro de Citas</h1>
  </div>
  
      <!-- Formulario -->
<div class="container">
    <form action="<?php echo constant('URL'); ?>citas/registroCitas" method="POST">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="ingresoNombres">Descripcion</label>
                <input type="text" class="form-control" name="ingreso_descrip" required>
            </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" name="ingreso_hora" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Clave del Paciente</label>
            <input type="text" class="form-control" name="ingreso_clavePaci" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Clave del Médico</label>
            <input type="text" class="form-control" name="ingreso_claveMed" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<br>
  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>