<?php
Class User extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="users";
           }
 function login($username, $password)
 {
   $this -> db -> select('id_user, username, password, nombre, foto');
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
}
?>