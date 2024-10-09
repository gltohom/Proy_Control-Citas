<?php
class Consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
        //definiendo variable
        $this->view->pacientes = [];
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $pacientes = $this->model->get();
        $this->view->pacientes = $pacientes;
        $this->view->render('consulta/index');
    }

    function verPaciente($param = null)
    {
        $idPaciente = $param[0];
        $paciente = $this->model->getById($idPaciente);

        //sesiones para seguridad
        session_start();
        $_SESSION['id_verPaciente'] = $paciente->dpi;

        $this->view->paciente = $paciente;
        $this->view->render('consulta/detalle');
    }

    function actualizarPaciente()
    {
        session_start();
        $dpi = $_SESSION['id_verPaciente'];
        $nombre             = $_POST['ingreso_nom'];
        $apellido           = $_POST['ingreso_apell'];
        
        $nacimiento         = $_POST['ingreso_nac'];
        $direccion          = $_POST['ingreso_direc'];
        $telefono           = $_POST['ingreso_tel'];

        unset($_SESSION['id_verPaciente']);

        if($this->model->update(['ingreso_nom' => $nombre, 'ingreso_apell' => $apellido, 'ingreso_identif' => $dpi, 'ingreso_nac' => $nacimiento, 'ingreso_direc' => $direccion, 'ingreso_tel' => $telefono]))
        {
            //actualizar
            $paciente = new Paciente();
            $paciente->nombre = $nombre;
            $paciente->apellido = $apellido;
            $paciente->dpi = $dpi;
            $paciente->nacimiento = $nacimiento;
            $paciente->direccion = $direccion;
            $paciente->telefono = $telefono;

            $this->view->paciente = $paciente;

            echo '<script language="javascript">alert("Participante actualizado");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("El participante no fue actualizado");</script>';
        }
        $this->render();
    }

    function eliminarPaciente($param = null)
    {
        $nombre = $param[0];

        if($this->model->delete($nombre))
        {
            echo '<script language="javascript">alert("Paciente eliminado");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("El paciente no fue eliminado");</script>';
        }
        $this->render();
    }
}
?>