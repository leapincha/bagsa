<?php
Class Unidad extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="unidad_operativa";
           }


      function get_uo($sort = '', $order = 'ASC')
    {
          $query = "SELECT unidad_operativa.*, regional.nombre as regional 
                  FROM $this->table
                  INNER JOIN regional ON unidad_operativa.id_regional = regional.id";

        if (!empty($sort)) {
            $query .= " ORDER BY $sort $order";
        }

        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->result();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
    }

    function get_unidad($id_uo)
  {
  		$query = "SELECT unidad_operativa.* FROM $this->table
                  WHERE unidad_operativa.id = $id_uo";
        
        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->row();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
  }


}