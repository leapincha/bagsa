<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->model("gerencia");
        $this->load->model("rol");
        $this->output->enable_profiler(TRUE);
       

		
	}

	public function index()
	{
		$data['active'] = "administrador";
        $data['sub_active'] = "usuario";

        $data['usuarios'] = $this->user->get_list("id_usuario", "ASC");
        

        //$data['usuarios']= $this->user->read("id_user, nombre, username,foto, mail",'id_user','ASC');
        
        
		$this->display("usuarios/listado-usuarios",$data);
	}

	
    public function agregar()
    {



    	$data['roles'] = $this->rol->read('id_rol, rol', 'rol', 'ASC');

		$data['active'] = "administrador";
        $data['sub_active'] = "usuario";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('username', 'Usuario', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_message('is_unique', 'El usuario ya existe');
        $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_rol', 'Rol', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');


   		if(empty($_FILES['imagen']['tmp_name'])){
   			$this->form_validation->set_rules('imagen', 'Imagen', 'required');
   		} else{
            $imagen=$_FILES['imagen']['name'];
            echo $imagen;
        }

        if ($this->form_validation->run()) {

        	$config['upload_path'] = './assets/images/users/';
           	$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
        	$this->load->library('upload', $config);
        	
            
            
        	if (!$this->upload->do_upload('imagen')){
        		
        		$error = array('error' => $this->upload->display_errors());
        		
        	} else {

                $datos_imagen = array('upload_data' => $this->upload->data());
                $nombre_archivo = $datos_imagen['upload_data']['file_name'];
                echo $nombre_archivo;
                
        		
        	}

            $post = array("username" => $this->input->post('username'),"foto" => $nombre_archivo,
                          "nombre" => $this->input->post('nombre'), "password" => $this->input->post('password'), 
                          "id_rol" => $this->input->post('id_rol'),  
                          "mail" => $this->input->post('email'));

            print_r($post);

               
            $res = $this->user->create($post);

            
            if($res){
                redirect("usuario");
            }
                
            
            
        }

        $this->display("usuarios/agregar", $data);


    }

	public function editar($id_usuario = '')
	{
		$usuario = $this->user->get_user($id_usuario);
    
        $data = object2array($usuario);
        $data['id_usuario'] = $id_usuario;
        $data['active'] = "administrador";
        $data['sub_active'] = "usuario";

        $data['roles'] = $this->rol->read('id_rol, rol', 'rol', 'ASC');


        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('username', 'Usuario', 'required|trim');
        $this->form_validation->set_message('is_unique', 'El usuario ya existe');
        $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_rol', 'Rol', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');


        if ($this->form_validation->run()) {
                        $post = array("username" => $this->input->post('username'),"foto" => $nombre_archivo,
                                "nombre" => $this->input->post('nombre'), "password" => $this->input->post('password'), 
                                "id_rol" => $this->input->post('id_rol'),  
                                "mail" => $this->input->post('email'));

            $result = $this->user->update($id_usuario, $post);

            if ($result) {
                redirect("usuario");
            }
        }

        $this->display("usuarios/editar", $data);

	}

	public function eliminar($id_usuario)
	{
		$result = $this->user->delete("id_usuario",$id_usuario);        

        echo json_encode($result);
	}


}