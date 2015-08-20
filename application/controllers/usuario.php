<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->helper('datatables');

		
	}

	public function index()
	{
		$data['active'] = "usuario";
        $data['sub_active'] = "";
        

        $data['usuarios']= $this->user->read("id_user, nombre, username,foto",'id_user','ASC');
        
        
		$this->display("listado-usuarios",$data);
	}

	public function tabla()
	{
		$data['active'] = "usuario";
        $data['sub_active'] = "";
		$tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="table table-bordered table-hover">' );
        $this->table->set_template($tmpl); 
        //Head de la tabla
        $this->table->set_heading('Nombre','Nombre de Usuario','Email','Foto','Acciones');

        $this->display('usuarios_prueba',$data);
	}

	function datatable()
    {
    	//Campos Base de datos
        $this->datatables->select('id_user,nombre,username,mail,foto')
        ->unset_column('id_user')
        ->unset_column('foto')
        ->add_column('foto', '<img src="/assets/images/users/$1"/>','foto')
        ->add_column('Acciones', get_buttons('$1'),'id_user')
        ->from('users');
        
        echo $this->datatables->generate();
    }

	public function editar($id)
	{
		echo "Entra editar";
	}

	public function eliminar($id)
	{
		echo "Entra eliminar";
	}

}