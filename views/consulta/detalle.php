<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de pacientes</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Editar información de pacientes</h1>
  </div>
  
      <!-- Formulario -->
  <form action="<?php echo constant('URL'); ?>consulta/actualizarPaciente" method="POST" class="container">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoNombres">Nombres</label>
      <input type="text" class="form-control" name="ingreso_nom" value="<?php echo $this->paciente->nombre; ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="ingresoApellidos">Apellidos</label>
      <input type="text" class="form-control" name="ingreso_apell" value="<?php echo $this->paciente->apellido; ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="ingresoIdentif">Número de Identificacion</label>
    <input type="text" class="form-control" name="ingreso_identif" value="<?php echo $this->paciente->dpi; ?>" required disabled>
  </div>
  <div class="form-group">
    <label for="ingresoNacimiento">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="ingreso_nac" value="<?php echo $this->paciente->nacimiento; ?>" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ingresoDirec">Dirección</label>
      <input type="text" class="form-control" name="ingreso_direc" value="<?php echo $this->paciente->direccion; ?>" required>
    </div>
    <div class="form-group col-md-2">
      <label for="ingresoTelefono">Número de teléfono</label>
      <input type="text" class="form-control" name="ingreso_tel" value="<?php echo $this->paciente->telefono; ?>" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>