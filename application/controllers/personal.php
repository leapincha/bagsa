<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("tipo_personal");
		$this->load->model("personal_loc");
        

        //$this->output->enable_profiler(TRUE);
       

		
	}



	function index()
	{

	}

	function agregar($id_localidad = '')
	{


		$post = array("id_localidad" => $id_localidad, "id_tipo" => $this->input->post("id_tipo"), "nombre_apellido" => $this->input->post("nom"), "telefono" => $this->input->post("tel"));

		print_r($post);


		$res = $this->personal_loc->create($post);

		echo json_encode($res);
	}

	function ver($id_localidad = '')
	{


              
        $personal= $this->personal_loc->get_personal($id_localidad);
        $tipo_pers= $this->tipo_personal->read("id, tipo", "id", "ASC");


        $html = "";

        $i=0;
        
        foreach ($personal as $pers) {
            $html .= "<div class='box box-default collapsed-box'>
                            <div class='box-header with-border'>
                              <h3 class='box-title'>".$pers->nombre_apellido."</h3>
                              	<div class='box-tools pull-right'>
                                	<button href='' class='btn btn-flat btn-danger btn-xs eliminarPersonal' data-toggle='modal' data-target='#eliminar-personal' data-nom='".$pers->nombre_apellido."' data-id='".$pers->id."'>Eliminar</a>
                                	<button type='button' class='btn btn-flat btn-success btn-xs' data-id='".$pers->id."' data-toggle='collapse' data-target='#abrir-".$i."'>Editar</button>
                            </div>
                              
                            </div>
                            <div id='abrir-".$i."' class='collapse'>
                            		<div class='modal-body'>
                            		  <form method='POST' name='".$pers->id."'>
                                        <input type='hidden' id='id_pers' value='".$pers->id."' />
                            				<div class='form-group'>
                            					<label for='nom'>Nombre y Apellido</label><br>
                            					<input name='nom_pers' id='nom_pers".$pers->id."' class='form-control' type='text' value='".$pers->nombre_apellido."' required>
                            				</div>
                            				<div class='form-group'>
                            					<label for='nom'>Tipo de Personal</label><br>
                            					<select id='id_tipo".$pers->id."' name='id_tipo' class='form-control'>
                            						<option value=''>Seleccionar Tipo</option>";

          	foreach ($tipo_pers as $p) {
          		                        $html .= "<option value='".$p->id."'". set_select('id_tipo', $p->id, ($pers->id_tipo == $p->id)) .">".  $p->tipo."</option>";
          	}

          	$html .= "</select>
                            				</div>
                            				<div class='form-group'>
                            					<label for='tel'>Teléfono</label><br>
                            					<input name='tel_pers' id='tel_pers".$pers->id."' class='form-control' type='text' value='".$pers->telefono."' required>
                            				</div>
                            				<button type='submit' class='btn btn-primary editar' id='".$pers->id."'>Editar</button>
                            		  </form>
                            		</div>
                            </div>
                       </div>";

            $i++;
        }
     
        echo $html;

	}

	function eliminar($id_personal)
	{
		$result = $this->personal_loc->eliminar_personal($id_personal); 

		
		echo json_encode($result);   

        
	}

	function editar($id_personal)
	{

		$nombre = $this->input->post("nom_pers");
		$telefono = $this->input->post("tel_pers");
        $tipo = $this->input->post("id_tipo");
		

		
		$result = $this->personal_loc->editar_personal($id_personal,$nombre, $telefono, $tipo); 

		
		echo json_encode($result);   

        
	}



}