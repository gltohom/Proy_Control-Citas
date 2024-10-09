<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de citas</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div id="menu">
    <h2 class="center">Información de citas</h2>
  </div>

  <!-- para realizar la busqueda 
  <form action="<?php //echo constant('URL'); ?>buscar/buscarParticipante" method="POST">
  <label for="buscarDato">Ingresa el número de identificación</label>
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="num" class="form-control" name="buscar_part" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
  </form>
  <br>
-->

  <!--tabla para mostrar datos-->
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre del paciente</th>
      <th scope="col">Apellido del paciente</th>
      <th scope="col">Descripción de la consulta</th>
      <th scope="col">Fecha y Hora</th>
      <th scope="col">Nombre del médico</th>
      <th scope="col">Apellido del médico</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once 'models/citas.php';
      foreach($this->citas as $row)
      {
        $cita = new Cita();
        $cita = $row;
    ?>
    <tr>
      <td><?php echo $cita->nomPaciente; ?></td>
      <td><?php echo $cita->apePaciente; ?></td>
      <td><?php echo $cita->descripcion; ?></td>
      <td><?php echo $cita->hora; ?></td>
      <td><?php echo $cita->nomDoc; ?></td>
      <td><?php echo $cita->apeDoc; ?></td>
      <td><?php echo $cita->especial; ?></td>

      <td><a href="<?php echo constant ('URL') . 'vercitas/verCita/' . $cita->descripcion; ?>"><button class="btn btn-warning">Editar</button></a></td>
      <td><a href="<?php echo constant ('URL') . 'vercitas/eliminarCita/' . $cita->descripcion; ?>"><button class="btn btn-danger">Eliminar</button></a></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>