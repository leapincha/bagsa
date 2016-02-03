<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicaciones extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("ubicacion");
        

        $this->output->enable_profiler(TRUE);
       

		
	}



	function index()
	{

	}



	function editar($id_ubicacion)
	{

		$latitud = $this->input->post("latitud");
		$longitud = $this->input->post("longitud");
		

		
		$result = $this->ubicacion->editar_ubicacion($id_ubicacion,$latitud, $longitud); 

		
		echo json_encode($result);   

        
	}



}