<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Paciente</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Formulario de registro para paciente</h1>
  </div>
  
      <!-- Formulario -->
      <div class="container">
      <form action="<?php echo constant('URL'); ?>registro/registroPaciente" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoNombres">Nombres</label>
      <input type="text" class="form-control" name="ingreso_nom" required>
    </div>
    <div class="form-group col-md-6">
      <label for="ingresoApellidos">Apellidos</label>
      <input type="text" class="form-control" name="ingreso_apell" required>
    </div>
  </div>
  <div class="form-group">
    <label for="ingresoIdentif">Número de Identificacion</label>
    <input type="text" class="form-control" name="ingreso_identif" required>
  </div>
  <div class="form-group">
    <label for="ingresoNacimiento">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="ingreso_nac" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoDirec">Dirección</label>
      <input type="text" class="form-control" name="ingreso_direc" required>
    </div>
    <div class="form-group col-md-2">
      <label for="ingresoTelefono">Número de teléfono</label>
      <input type="text" class="form-control" name="ingreso_tel" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
      </div>
  

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>