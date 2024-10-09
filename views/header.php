<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>
<body>

    <div id="menu">
        <h1 class="center titulo">Hospital "San Rafael"</h1>
    </div>

    <!-- Menu -->
    <div class="topnav" id="myTopnav">
        <a href="<?php echo constant('URL'); ?>menu" class="active">Inicio</a>
        <a href="<?php echo constant('URL'); ?>registro">Registrar Paciente</a>
        <a href="<?php echo constant('URL'); ?>registrodoc">Registrar Doctor</a>
        <a href="<?php echo constant('URL'); ?>consulta">Información Paciente</a>
        <a href="<?php echo constant('URL'); ?>consultadoc">Información Médico</a>
        <a href="<?php echo constant('URL'); ?>citas">Citas</a>
        <a href="<?php echo constant('URL'); ?>vercitas">Ver citas registradas</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i> </a>
    </div>

<script>
    function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>