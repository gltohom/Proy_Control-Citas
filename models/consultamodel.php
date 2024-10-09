<?php

//referencia 
include_once 'models/paciente.php';

class ConsultaModel extends Model
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
            $query = $this->db->connect()->query("SELECT*FROM paciente");

            while($row = $query->fetch())
            {
                //creacion de objetos
                $item = new Paciente();
                $item->idClave              =$row['idPaciente'];
                $item->nombre               =$row['nombre'];
                $item->apellido             =$row['apellido'];
                $item->dpi                  =$row['dpi'];
                $item->nacimiento           =$row['nacimiento'];
                $item->direccion            =$row['direccion'];
                $item->telefono             =$row['telefono'];

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
        $item = new Paciente();

        $query = $this->db->connect()->prepare("SELECT * FROM paciente WHERE nombre = :nombre");
        try
        {
            $query->execute(['nombre' => $id]);

            while($row = $query->fetch())
            {
                $item->nombre               =$row['nombre'];
                $item->apellido             =$row['apellido'];
                $item->dpi                  =$row['dpi'];
                $item->nacimiento           =$row['nacimiento'];
                $item->direccion            =$row['direccion'];
                $item->telefono             =$row['telefono'];
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
        $query = $this->db->connect()->prepare("UPDATE paciente SET nombre = :nombre, apellido = :apellido, nacimiento = :nacimiento, direccion = :direccion, telefono = :telefono WHERE dpi = :dpi");

        try
        {
            $query->execute
            ([
                'nombre' => $item['ingreso_nom'],
                'apellido' => $item['ingreso_apell'],
                'dpi' => $item['ingreso_identif'],
                'nacimiento' => $item['ingreso_nac'],
                'direccion' => $item['ingreso_direc'],
                'telefono' => $item['ingreso_tel']
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
        $query = $this->db->connect()->prepare(" DELETE FROM paciente WHERE nombre = :id");

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