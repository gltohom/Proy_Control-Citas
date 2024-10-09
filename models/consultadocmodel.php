<?php

//referencia 
include_once 'models/doctor.php';

class ConsultadocModel extends Model
{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function get()
    {
        //mostrar los elementos guardados en la base de datos
        $items = [];
        try
        {
            $query = $this->db->connect()->query(" SELECT m.idMedico, m.nombre, m.apellido, m. telefono, m.colegiado, e.especialidad
            FROM especialidad AS e
            INNER JOIN medico AS m ON m._idEspecialidad = e.idEspecialidad;");

            while($row = $query->fetch())
            {
                //creacion de objetos
                $item = new Doctor();
                $item->idClave              =$row['idMedico'];
                $item->nombre               =$row['nombre'];
                $item->apellido             =$row['apellido'];
                $item->telefono             =$row['telefono'];
                $item->colegiado            =$row['colegiado'];
                $item->especialidad         =$row['especialidad'];

                array_push($items, $item);
            }
            return $items;
        }
        catch(PDOExeption $e)
        {
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Doctor();

        $query = $this->db->connect()->prepare("SELECT * FROM medico WHERE nombre = :nombre");
        try
        {
            $query->execute(['nombre' => $id]);

            while($row = $query->fetch())
            {
                $item->nombre               =$row['nombre'];
                $item->apellido             =$row['apellido'];
                $item->telefono             =$row['telefono'];
                $item->colegiado            =$row['colegiado'];
                $item->especialidad         =$row['_idEspecialidad'];
                
            }
            return $item;
        }
        catch(PDOException $e)
        {
            return null;
        }
    }

    //funcion para actualizar
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE medico SET nombre = :nombre, apellido = :apellido, telefono = :telefono, especialidad_idEspecialidad = :especialidad WHERE colegiado = :colegiado");

        try
        {
            $query->execute
            ([
                'nombre' => $item['ingreso_nom'],
                'apellido' => $item['ingreso_apell'],
                'telefono' => $item['ingreso_tel'],
                'colegiado' => $item['ingreso_coleg'],
                'especialidad' => $item['ingreso_especi']
                
            ]);
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    //funcion para borrar
    public function delete($id)
    {
        $query = $this->db->connect()->prepare(" DELETE FROM medico WHERE nombre = :id");

        try
        {
            $query->execute
            ([
                'id' => $id,
            ]);
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
}
?>