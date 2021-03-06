<?php
Class Generales extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="datos_generales";
           }


    function get_datos($id_locali)
    {

        $query = "SELECT datos_generales.*
                  FROM $this->table
                  WHERE datos_generales.id_localidad = $id_locali";
        
		    $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }

    function editar_generales($id_localidad,$data)
    {

        $this->db->where('id_localidad', $id_localidad);
        return $this->db->update('datos_generales', $data);

    }




}