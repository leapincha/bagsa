<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes_Planta extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("imagenes");

        //$this->output->enable_profiler(TRUE);
       

		
	}

	public function index()
	{


	}

    public function ver($id_localidad = '')
    {
        $this->load->model('imagenes');
        
              
        $img= $this->imagenes->get_imagenes($id_localidad);


        $html = '';

        $i = 1;
        
        foreach ($img as $im) {


        $html .= "
                          <div class='form-group col-sm-12'>                            
                            <label class='col-sm-2 control-label' for='cant_tanques' style='padding-right:0px;'>Imagen ".$i."</label> 
                            <div class='col-sm-8'>
                              <a><img src='/assets/images/fotos_planta/".$im->url_img."' class='img-thumbnail'></a>
                            </div>
                            <div class='col-sm-2'>
                              <a href='' class='btn btn-flat btn-danger btn-xs elim-imagen' data-id='".$im->id."' data-keyboard='false' data-backdrop='static'>Borrar</a>
                            </div>
                            
                          </div>
                          
                         ";   
            
            $i++;
        }
     
        echo $html;
    }

    function eliminar_imagen($id_im)
    {
      $this->load->helper("file");
      $img= $this->imagenes->get_imagen($id_im);
      //echo $img->url_img;
      foreach($img as $im) { 
          $path_to_file = 'assets/images/fotos_planta/'.$im->url_img;
        
          unlink($path_to_file);
          $result = $img= $this->imagenes->del_imagen($id_im);
      }
          echo json_encode($result);  
    }


    function agregar($id_localidad)
    {

    $data['active'] = "localidades";
    $data['sub_active'] = "";
    $config['upload_path'] = './assets/images/fotos_planta/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '4000';


    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
    {
      $data['error'] = array('error' => $this->upload->display_errors());
      $data['locali'] = $id_localidad;
      $this->display('agregar_imagenes', $data);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $data['locali'] = $id_localidad;
      $data['active'] = "localidades";
      $data['sub_active'] = "";

      $this->display('agregar_imagenes', $data);
    }

    }


    function multiples($id_localidad)
    {


      try
        {
            if($this->input->post("archivo")){        
                $this->load->library("app/uploader");
                $this->uploader->do_upload();
            }
            return $this->view();
        }
        catch(Exception $err)
        {
            log_message("error",$err->getMessage());
            return show_error($err->getMessage());
        }
      $config['upload_path'] = 'assets/images/fotos_planta/';
      $config['allowed_types'] = 'jpg|png';
      $archi = $this->input->post("archivo");

      $this->load->library('upload', $config);

      if(!$this->upload->do_multi_upload($archi)){

      }
      else{
        
        //$datos['success'] = $this->upload->get_multi_upload_data();

      }

    }


}