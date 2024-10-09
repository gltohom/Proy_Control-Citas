<?php
class Consultadoc extends Controller
{
    function __construct()
    {
        parent::__construct();
        //definiendo variable
        $this->view->doctores = [];
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $doctores = $this->model->get();
        $this->view->doctores = $doctores;
        $this->view->render('consultadoc/index');
    }

    function verDoctor($param = null)
    {
        $idDoctor = $param[0];
        $doctor = $this->model->getById($idDoctor);

        //sesiones para seguridad
        session_start();
        $_SESSION['id_verDoctor'] = $doctor->colegiado;

        $this->view->doctor = $doctor;
        $this->view->render('consultadoc/detalle');
    }

    function actualizarDoctor()
    {
        session_start();
        $colegiado = $_SESSION['id_verDoctor'];
        $nombre             = $_POST['ingreso_nom'];
        $apellido           = $_POST['ingreso_apell'];
        $telefono           = $_POST['ingreso_tel'];

        $especialidad       = $_POST['ingreso_especi'];

        unset($_SESSION['id_verDoctor']);

        if($this->model->update(['ingreso_nom' => $nombre, 'ingreso_apell' => $apellido, 'ingreso_tel' => $telefono, 'ingreso_coleg' => $colegiado, 'ingreso_especi' => $especialidad]))
        {
            //actualizar
            $doctor = new Doctor();
            $doctor->nombre = $nombre;
            $doctor->apellido = $apellido;
            $doctor->telefono = $telefono;
            $doctor->colegiado = $colegiado;
            $doctor->especialidad = $especialidad;

            $this->view->doctor = $doctor;

            echo '<script language="javascript">alert("Médico actualizado");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("El médico no fue actualizado");</script>';
        }
        $this->render();
    }

    function eliminarDoctor($param = null)
    {
        $nombre = $param[0];

        if($this->model->delete($nombre))
        {
            echo '<script language="javascript">alert("Médico eliminado");</script>';

        }
        else
        {
            //error
            echo '<script language="javascript">alert("El médico no fue eliminado");</script>';
        }
        $this->render();
    }
}
?>