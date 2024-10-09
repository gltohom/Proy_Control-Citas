<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de médicos</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Editar información de médicos</h1>
  </div>
  
      <!-- Formulario -->
  <form action="<?php echo constant('URL'); ?>consultadoc/actualizarDoctor" method="POST" class="container">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoNombres">Nombres</label>
      <input type="text" class="form-control" name="ingreso_nom" value="<?php echo $this->doctor->nombre; ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="ingresoApellidos">Apellidos</label>
      <input type="text" class="form-control" name="ingreso_apell" value="<?php echo $this->doctor->apellido; ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="ingresoIdentif">Número de Teléfono</label>
    <input type="text" class="form-control" name="ingreso_tel" value="<?php echo $this->doctor->telefono; ?>" required>
  </div>
  <div class="form-group">
    <label for="ingresoNacimiento">Número de colegiado</label>
    <input type="text" class="form-control" name="ingreso_coleg" value="<?php echo $this->doctor->colegiado; ?>" required disabled>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoDirec">Especialidad</label>
      <input type="number" class="form-control" name="ingreso_especi" value="<?php echo $this->doctor->especialidad; ?>" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>