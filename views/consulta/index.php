<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de pacientes</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div id="menu">
    <h2 class="center">Información de pacientes</h2>
  </div>

  <!--tabla para mostrar datos-->
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Clave</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Número de identificación</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Dirección</th>
      <th scope="col">Número de teléfono</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once 'models/paciente.php';
      foreach($this->pacientes as $row)
      {
        $paciente = new Paciente();
        $paciente = $row;
    ?>
    <tr>
      <td><?php echo $paciente->idClave; ?></td>
      <td><?php echo $paciente->nombre; ?></td>
      <td><?php echo $paciente->apellido; ?></td>
      <td><?php echo $paciente->dpi; ?></td>
      <td><?php echo $paciente->nacimiento; ?></td>
      <td><?php echo $paciente->direccion; ?></td>
      <td><?php echo $paciente->telefono; ?></td>
      <td><a href="<?php echo constant ('URL') . 'consulta/verPaciente/' . $paciente->nombre; ?>"><button class="btn btn-warning">Editar</button></a></td>
      <td><a href="<?php echo constant ('URL') . 'consulta/eliminarPaciente/' . $paciente->nombre; ?>"><button class="btn btn-danger">Eliminar</button></a></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>