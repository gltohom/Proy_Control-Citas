<?php
class Registrodoc extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $this->view->render('registrodoc/index');
    }

    //Funcion para registrar nuevo paciente
    function registroDoctor()
    {
        //capturar datos ingresados por formulario
        $nombre             = $_POST['ingreso_nom'];
        $apellido           = $_POST['ingreso_apell'];
        $telefono           = $_POST['ingreso_tel'];
        $colegiado          = $_POST['ingreso_coleg'];
        $especialidad       = $_POST['ingreso_especi'];

        //llamando la funcion insertar
        if($this->model->insert(['ingreso_nom' => $nombre, 'ingreso_apell' => $apellido, 'ingreso_tel' => $telefono, 'ingreso_coleg' => $colegiado, 'ingreso_especi' => $especialidad]))
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("Médico registrado");</script>';
        }
        else
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("El médico ya esta registrado");</script>';
        }

        //variable a la vista para mensaje
        /*$this->view->mensaje = $mensaje;*/
        $this->render();
    }
}
?>