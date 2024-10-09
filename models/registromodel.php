<?php

class RegistroModel extends Model
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
            $query = $this->db->connect()->prepare('INSERT INTO paciente (nombre, apellido, dpi, nacimiento, direccion, telefono) VALUE(:ingreso_nom, :ingreso_apell, :ingreso_identif, :ingreso_nac, :ingreso_direc, :ingreso_tel)');
            //validar datos
            $query->execute(['ingreso_nom' => $datos['ingreso_nom'], 'ingreso_apell' => $datos['ingreso_apell'], 'ingreso_identif' => $datos['ingreso_identif'], 'ingreso_nac' => $datos['ingreso_nac'], 'ingreso_direc' =>$datos['ingreso_direc'], 'ingreso_tel' => $datos['ingreso_tel']]);
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