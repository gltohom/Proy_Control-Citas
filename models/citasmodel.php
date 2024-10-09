<?php

class CitasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //insertar datos en bd
    public function insert($datos)
    {
        try
        {
             //prepara los datos a ingresar para evitar inyecciones sql
            $query = $this->db->connect()->prepare('INSERT INTO cita (descripcion, hora, _idPaciente, _idmedico) VALUE(:ingreso_descrip, :ingreso_hora, :ingreso_clavePaci, :ingreso_claveMed)');
            //validar datos
            $query->execute(['ingreso_descrip' => $datos['ingreso_descrip'], 'ingreso_hora' => $datos['ingreso_hora'], 'ingreso_clavePaci' => $datos['ingreso_clavePaci'], 'ingreso_claveMed' => $datos['ingreso_claveMed']]);
            return true;
            /*echo "insertar datos";
            echo "error de inserción";*/
            
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
            return false;
        }
    }
}
?>