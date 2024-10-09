<?php

class RegistrodocModel extends Model
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
            $query = $this->db->connect()->prepare('INSERT INTO medico(nombre, apellido, telefono, colegiado, _idEspecialidad) VALUE(:ingreso_nom, :ingreso_apell, :ingreso_tel, :ingreso_coleg, :ingreso_especi)');
            //validar datos
            $query->execute(['ingreso_nom' => $datos['ingreso_nom'], 'ingreso_apell' => $datos['ingreso_apell'], 'ingreso_tel' => $datos['ingreso_tel'], 'ingreso_coleg' => $datos['ingreso_coleg'], 'ingreso_especi' =>$datos['ingreso_especi']]);
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