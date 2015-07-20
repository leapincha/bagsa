<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
      
    }

	function index(){

		 $this->load->library('form_validation');
 
   		$this->form_validation->set_rules('username', 'Username', 'trim|required');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   		if($this->form_validation->run() == FALSE){
   			$this->load->view("login");
   		}
   		else
   		{
   			echo "Entró";

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
         						'id' => $row->id,
         						'username' => $row->username
       							);
       		$this->session->set_userdata('logged_in', $sess_array);
     		}
     		return TRUE;
   		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Usuario o Password incorrectos');
     		return false;
   		}
    }
    


	 function logout()
 	 {
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('home', 'refresh');
 	 }
}
