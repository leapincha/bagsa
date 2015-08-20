<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data['active'] = "inicio";
        $data['sub_active'] = "";
        

        

		$this->display("inicio",$data);
	}

}