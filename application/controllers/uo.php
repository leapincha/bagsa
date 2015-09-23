<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uo extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("unidad");
        $this->load->model("regionales");


        $this->output->enable_profiler(TRUE);
       

		
	}

	public function index()
	{

		$data['active'] = "uo";
        $data['sub_active'] = "";

        $data['unidades'] = $this->unidad->get_uo("id", "ASC");
        

        
        
        
		$this->display("uo/listado-uo",$data);

	}

	public function agregar()
	{

		$data['active'] = "uo";
        $data['sub_active'] = "";

        $data['regional'] = $this->regionales->read('id, nombre', 'id', 'ASC');

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre UO', 'required');
        $this->form_validation->set_rules('id_regional', 'Regional', 'required');
       
        



        if ($this->form_validation->run()) {

        	$post = array("nombre" => $this->input->post('nombre'),"id_regional" => $this->input->post('id_regional'));

            
               
            $res = $this->unidad->create($post);

            
            if($res){
                redirect("uo");
            }
                
            
            
        }

		$this->display("uo/agregar",$data);
	}

	public function editar($id_uo = '')
	{

		$uo = $this->regionales->get_unidad($id_uo);

		$data = object2array($uo);
        $data['id_uo'] = $id_uo;
        $data['active'] = "uo";
        $data['sub_active'] = "";


        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre Regional', 'required|trim');


        if ($this->form_validation->run()) {
			$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'));

            $result = $this->unidad->update($id_uo, $post);

            if ($result) {
                redirect("uo");
            }
        }

        $this->display("uo/editar", $data);

	}

	public function borrar()
	{

	}






}