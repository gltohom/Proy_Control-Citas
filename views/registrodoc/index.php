<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Médico</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Formulario de registro para medico</h1>
  </div>
  
      <!-- Formulario -->
      <div class="container">
      <form action="<?php echo constant('URL'); ?>registroDoc/registroDoctor" method="POST">
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
    <label for="ingresoIdentif">Número de Teléfono</label>
    <input type="text" class="form-control" name="ingreso_tel" required>
  </div>
  <div class="form-group">
    <label for="ingresoNacimiento">Número de colegiado</label>
    <input type="text" class="form-control" name="ingreso_coleg" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoDirec">Especialidad</label>
      <input type="number" class="form-control" name="ingreso_especi" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
      </div>
  

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>