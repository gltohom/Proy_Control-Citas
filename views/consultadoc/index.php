<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información de médicos</title>
</head>
<body>
  <!-- llamando el menu-->
  <?php require 'views/header.php'; ?>

  <div id="menu">
    <h2 class="center">Información de médicos</h2>
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
      <th scope="col">Clave</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Télefono</th>
      <th scope="col">Colegiado</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once 'models/doctor.php';
      foreach($this->doctores as $row)
      {
        $doctor = new Doctor();
        $doctor = $row;
    ?>
    <tr>
      <td><?php echo $doctor->idClave; ?></td>
      <td><?php echo $doctor->nombre; ?></td>
      <td><?php echo $doctor->apellido; ?></td>
      <td><?php echo $doctor->telefono; ?></td>
      <td><?php echo $doctor->colegiado; ?></td>
      <td><?php echo $doctor->especialidad; ?></td>
      
      <td><a href="<?php echo constant ('URL') . 'consultadoc/verDoctor/' . $doctor->nombre; ?>"><button class="btn btn-warning">Editar</button></a></td>
      <td><a href="<?php echo constant ('URL') . 'consultadoc/eliminarDoctor/' . $doctor->nombre; ?>"><button class="btn btn-danger">Eliminar</button></a></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

  <!-- llamando el pie de página-->
  <?php require 'views/footer.php'; ?>
</body>
</html>