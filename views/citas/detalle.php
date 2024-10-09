<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de Citas</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div>
    <h1 id="formulario" >Editar información de médicos</h1>
  </div>
  
      <!-- Formulario -->
  <form action="<?php echo constant('URL'); ?>vercitas/actualizarCita" method="POST" class="container">
  <div class="form-row">
            <div class="form-group col-md-12">
                <label for="ingresoNombres">Descripcion</label>
                <input type="text" class="form-control" name="ingreso_descrip" value="<?php echo $this->cita->descripcion; ?>" required>
            </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" name="ingreso_hora" value="<?php echo $this->cita->hora; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Clave del Paciente</label>
            <input type="text" class="form-control" name="ingreso_clavePaci" value="<?php echo $this->cita->clavePaciente; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ingresoApellidos">Clave del Médico</label>
            <input type="text" class="form-control" name="ingreso_claveMed" value="<?php echo $this->cita->claveMedico; ?>" required>
        </div>
  <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>