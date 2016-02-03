<?php
Class Imagenes extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="imagenes_planta";
           }



    function get_imagenes($id_locali)
    {

        $query = "SELECT imagenes_planta.*
                  FROM $this->table
                  WHERE imagenes_planta.id_localidad = $id_locali";
        
		    $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }

    function get_imagen($id_im)
    {

        $query = "SELECT imagenes_planta.*
                  FROM $this->table
                  WHERE imagenes_planta.id = $id_im";
        
        $query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

    }


    function del_imagen($id_imagen)
    {
      $this->db->where('id',$id_imagen);
      return $this->db->delete('imagenes_planta');
    } 


}