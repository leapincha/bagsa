<?php
Class Regionales extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="regional";
           }


  function get_regional($id_regional)
  {
  		$query = "SELECT regional.* FROM $this->table
                  WHERE regional.id = $id_regional";
        
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