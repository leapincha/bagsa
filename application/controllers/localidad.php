<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localidad extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("localidades");
        $this->load->model("tipo_personal");

        

        $this->output->enable_profiler(TRUE);
       

		
	}

	public function index()
	{

		$data['active'] = "localidades";
        $data['sub_active'] = "";

        $data['localidades'] = $this->localidades->get_localidades("id", "ASC");
        

        
        
        
		$this->display("localidades/listado-localidades",$data);

	}

	public function agregar()
	{

		$data['active'] = "localidades";
        $data['sub_active'] = "";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre Regional', 'required|trim');
       
        



        if ($this->form_validation->run()) {

        	$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'));

            
               
            $res = $this->regionales->create($post);

            
            if($res){
                redirect("localidad");
            }
                
            
            
        }

		$this->display("localidades/agregar",$data);
	}

	public function editar($id_localidad = '')
	{

		$localidad = $this->localidades->get_localidades($id_localidad);

		$data = object2array($localidad);
        $data['id_localidad'] = $id_localidad;
        $data['active'] = "localidades";
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


    public function panel($id_localidad = '')
    {

        $this->load->model("personal_loc");
        $this->load->model("excavadores");
        $this->load->model("ubicacion");
        $this->load->model("imagenes");
        $data['active'] = "localidades";
        $data['sub_active'] = "";
        $data['id_locali'] = $id_localidad;

        $data['locali'] = $this->localidades->get_localidad($id_localidad);
        $data['personas'] = $this->personal_loc->get_personal($id_localidad);
        $data['excavador'] = $this->excavadores->get_excavador($id_localidad);
        $data['ubic']= $this->ubicacion->get_ubicacion($id_localidad);
        $data['tipo_pers']= $this->tipo_personal->read("id,tipo","id","ASC");
        $data['image'] = $this->imagenes->get_imagenes($id_localidad);

        

        //print_r($data);


        $this->display("localidades/panel",$data);
    }


}



