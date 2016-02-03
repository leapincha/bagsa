<?php
Class Excavadores extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="excavadores";
           }


    function get_excavador($id_locali)
    {

        $query = "SELECT excavadores.*
                  FROM $this->table
                  WHERE excavadores.id_localidad = $id_locali";
        
		    $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }

    function insertar_excavador($id_locali)
    {


    }

    function eliminar_excavador($id)
    {
      $this->db->where('id',$id);
      return $this->db->delete('excavadores');
    }

     function editar_excavador($id, $nombre, $telefono) {

      $data = array(
            'nombre' => $nombre,
            'telefono' => $telefono
        );
        
        $this->db->where('id', $id);
        return $this->db->update('excavadores', $data);
    }




}