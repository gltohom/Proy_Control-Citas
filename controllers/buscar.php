<?php
class Buscar extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $this->view->render('consulta/index');
    }

    //Funcion para registrar nuevo participante
    function buscarParticipante()
    {
        //capturar datos ingresados por formulario
        $buscar_identif             = $_POST['buscar_part'];

        //llamando la funcion insertar
        if($this->model->get(['buscar_part' => $buscar_identif]))
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("Participante registrado");</script>';
        }
        else
        {
            //mensaje para mostrar alerta
            echo '<script language="javascript">alert("El participante ya esta registrado");</script>';
        }

        //variable a la vista para mensaje
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
?>