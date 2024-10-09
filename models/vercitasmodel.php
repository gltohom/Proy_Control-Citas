<?php

//referencia 
include_once 'models/citas.php';

class VercitasModel extends Model
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
            $query = $this->db->connect()->query("SELECT p.nombre, p.apellido, c.descripcion, c.hora, m.nombre, m.apellido, e.especialidad
            FROM cita as c
            INNER JOIN medico as m ON c._idmedico = m.idmedico
            INNER JOIN especialidad as e ON m._idEspecialidad = e.idEspecialidad
            INNER JOIN paciente as p ON c._idPaciente = p.idPaciente;");

            while($row = $query->fetch())
            {
                //creacion de objetos
                $item = new Cita();
                $item->nomPaciente             =$row['nombre'];
                $item->apePaciente             =$row['apellido'];
                $item->descripcion             =$row['descripcion'];
                $item->hora                    =$row['hora'];
                $item->nomDoc                  =$row['nombre'];
                $item->apeDoc                  =$row['apellido'];
                $item->especial                =$row['especialidad'];

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
        $item = new Cita();

        $query = $this->db->connect()->prepare("SELECT * FROM cita WHERE descripcion = :descripcion");
        try
        {
            $query->execute(['descripcion' => $id]);

            while($row = $query->fetch())
            {
                $item->descripcion             =$row['descripcion'];
                $item->hora                    =$row['hora'];
                $item->claveMedico             =$row['_idPaciente'];
                $item->clavePaciente           =$row['_idmedico'];
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
        $query = $this->db->connect()->prepare("UPDATE cita SET hora = :hora, clavePaciente = :clavePaciente, claveMedico = :claveMedico WHERE descripcion = :descripcion");

        try
        {
            $query->execute
            ([
                'descripcion' => $item['ingreso_descrip'],
                'hora' => $item['ingreso_hora'],
                'clavePaciente' => $item['ingreso_clavePaci'],
                'claveMedico' => $item['ingreso_claveMed'],
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
        $query = $this->db->connect()->prepare(" DELETE FROM cita WHERE descripcion = :id");

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