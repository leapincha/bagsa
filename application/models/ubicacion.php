<?php
Class Ubicacion extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="ubicacion_planta";
           }


    function get_ubicacion($id_locali)
    {

        $query = "SELECT ubicacion_planta.*
                  FROM $this->table
                  WHERE ubicacion_planta.id_localidad = $id_locali";
        
		    $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }

    function editar_ubicacion($id, $latitud, $longitud) {

      $data = array(
            'latitud' => $latitud,
            'longitud' => $longitud
        );
        
        $this->db->where('id_ubicacion', $id);
        return $this->db->update('ubicacion_planta', $data);
    }






}