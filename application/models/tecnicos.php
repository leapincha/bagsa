<?php
Class Tecnicos extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="datos_tecnicos";
           }


    function get_datos($id_locali)
    {

        $query = "SELECT datos_tecnicos.*
                  FROM $this->table
                  WHERE datos_tecnicos.id_localidad = $id_locali";
        
		    $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }

    function editar_tecnicos($id_localidad,$data)
    {

        $this->db->where('id_localidad', $id_localidad);
        return $this->db->update('datos_tecnicos', $data);

    }




}