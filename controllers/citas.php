<?php
class Citas extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $this->view->render('citas/index');
    }

    //Funcion para registrar nuevo paciente
    function registroCitas()
    {
        //capturar datos ingresados por formulario
        $descripcion             = $_POST['ingreso_descrip'];
        $hora                    = $_POST['ingreso_hora'];
        $clavePaciente           = $_POST['ingreso_clavePaci'];
        $claveMedico             = $_POST['ingreso_claveMed'];

        //llamando la funcion insertar
        if($this->model->insert(['ingreso_descrip' => $descripcion, 'ingreso_hora' => $hora, 'ingreso_clavePaci' => $clavePaciente, 'ingreso_claveMed' => $claveMedico]))
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