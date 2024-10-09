<?php
class Vercitas extends Controller
{
    function __construct()
    {
        parent::__construct();
        //definiendo variable
        $this->view->citas = [];
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $citas = $this->model->get();
        $this->view->citas = $citas;
        $this->view->render('vercitas/index');
    }

    function verCita($param = null)
    {
        $idVercita = $param[0];
        $cita = $this->model->getById($idVercita);

        //sesiones para seguridad
        session_start();
        $_SESSION['id_verCita'] = $cita->descripcion;

        $this->view->cita = $cita;
        $this->view->render('citas/detalle');
    }

    function actualizarCita()
    {
        session_start();
        $descripcion = $_SESSION['id_verCita'];
        //$descipcion         = $_POST['ingreso_descrip'];
        $hora               = $_POST['ingreso_hora'];
        $clavePaciente      = $_POST['ingreso_clavePaci'];
        $claveMedico        = $_POST['ingreso_claveMed'];

        unset($_SESSION['id_verCita']);

        if($this->model->update(['ingreso_descrip' => $descipcion, 'ingreso_hora' => $hora, 'ingreso_clavePaci' => $clavePaciente, 'ingreso_claveMed' => $claveMedico]))
        {
            //actualizar
            $cita = new Cita();
            $cita->descripcion = $descipcion;
            $cita->hora = $hora;
            $cita->clavePaciente = $clavePaciente;
            $cita->claveMedico = $claveMedico;

            $this->view->cita = $cita;

            echo '<script language="javascript">alert("Cita actualizada");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("La cita no fue actualizada");</script>';
        }
        $this->render();
    }

    function eliminarCita($param = null)
    {
        $descripcion = $param[0];

        if($this->model->delete($descripcion))
        {
            echo '<script language="javascript">alert("Cita eliminado");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("La cita no fue eliminada");</script>';
        }
        $this->render();
    }
}
?>