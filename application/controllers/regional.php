<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regional extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("regionales");

        $this->output->enable_profiler(TRUE);
       

		
	}

	public function index()
	{

		$data['active'] = "regional";
        $data['sub_active'] = "";

        $data['regionales'] = $this->regionales->read("id,nombre, responsable","id", "ASC");
        

        //$data['usuarios']= $this->user->read("id_user, nombre, username,foto, mail",'id_user','ASC');
        
        
		$this->display("regionales/listado-regionales",$data);

	}

	public function agregar()
	{

		$data['active'] = "regional";
        $data['sub_active'] = "";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre Regional', 'required|trim');
       
        



        if ($this->form_validation->run()) {

        	$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'));

            
               
            $res = $this->regionales->create($post);

            
            if($res){
                redirect("regional");
            }
                
            
            
        }

		$this->display("regionales/agregar",$data);
	}

	public function editar($id_regional = '')
	{

		$regional = $this->regionales->get_regional($id_regional);

		$data = object2array($regional);
        $data['id_regional'] = $id_regional;
        $data['active'] = "regional";
        $data['sub_active'] = "";


        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre Regional', 'required|trim');


        if ($this->form_validation->run()) {
			$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'));

            $result = $this->regionales->update($id_regional, $post);

            if ($result) {
                redirect("regional");
            }
        }

        $this->display("regionales/editar", $data);

	}

	public function borrar()
	{

	}






}