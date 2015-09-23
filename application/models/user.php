<?php
Class User extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="users";
  }
 function login($username, $password)
 {
   $this -> db -> select('username, password, nombre, foto');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function get_user($id_usuario)
    {
        $query = "SELECT users.* FROM $this->table
                  WHERE users.id_usuario = $id_usuario";
        
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

 function get_list($sort = '', $order = 'ASC')
 {


  $query = "SELECT users.*, rol.rol as rol 
                  FROM $this->table
                  INNER JOIN rol ON users.id_rol = rol.id_rol";

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
}
