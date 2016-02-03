<?php
Class Personal_loc extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="personal_localidad";
           }

  function get_personal($id_locali)
  {

      $query = "SELECT personal_localidad.*, tipo_personal.tipo as tipo
                FROM $this->table
                INNER jOIN tipo_personal on tipo_personal.id= personal_localidad.id_tipo
                WHERE personal_localidad.id_localidad = $id_locali";
        
		$query = $this->db->query($query);

        $result = $query->result();
        $query->free_result();

        return $result;

  }

  function editar_personal($id, $nombre, $telefono, $tipo) {

      $data = array(
            'nombre_apellido' => $nombre,
            'telefono' => $telefono,
            'id_tipo' => $tipo
        );
        
        $this->db->where('id', $id);
        return $this->db->update('personal_localidad', $data);
  }


  function eliminar_personal($id)
    {
      $this->db->where('id',$id);
      return $this->db->delete('personal_localidad');
    }





}