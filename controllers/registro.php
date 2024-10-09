<?php
class Registro extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $this->view->render('registro/index');
    }

    //Funcion para registrar nuevo paciente
    function registroPaciente()
    {
        //capturar datos ingresados por formulario
        $nombre             = $_POST['ingreso_nom'];
        $apellido           = $_POST['ingreso_apell'];
        $dpi                = $_POST['ingreso_identif'];
        $nacimiento         = $_POST['ingreso_nac'];
        $direccion          = $_POST['ingreso_direc'];
        $telefono           = $_POST['ingreso_tel'];

        //llamando la funcion insertar
        if($this->model->insert(['ingreso_nom' => $nombre, 'ingreso_apell' => $apellido, 'ingreso_identif' => $dpi, 'ingreso_nac' => $nacimiento, 'ingreso_direc' => $direccion, 'ingreso_tel' => $telefono]))
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("Paciente registrado");</script>';
        }
        else
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("El paciente ya esta registrado");</script>';
        }

        //variable a la vista para mensaje
        /*$this->view->mensaje = $mensaje;*/
        $this->render();
    }
}
?>