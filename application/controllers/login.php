<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('user');
      
    }

	function index()
  {

		$this->load->library('form_validation');
 
   		$this->form_validation->set_rules('username', 'Usuario', 'trim|required');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
   		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

   		if($this->form_validation->run() == FALSE){
   			$this->load->view("login");
   		}
   		else
   		{
   			redirect("inicio");

   		}
    	
  }

   function check_database($password)
   {
   //Field validation succeeded.  Validate against database
   		$username = $this->input->post('username');
 
   //query the database
   		$result = $this->user->login($username, $password);
 
   		if($result)
   		{
     		$sess_array = array();
     		foreach($result as $row)
     		{
       		$sess_array = array(
         						'id_user' => $row->id_user,
         						'username' => $row->username,
                    'nombre' => $row->nombre,
                    'foto'=> $row->foto
       							);
       		$this->session->set_userdata($sess_array);
     		}
     		return TRUE;
   		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Usuario y/o Password incorrectos');
     		return false;
   		}
    }
    


	 function logout()
 	 {
   		$this->session->unset_userdata();
   		session_destroy();
   		redirect('login');
 	 }
}
