<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excavador extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("excavadores");
        

        //$this->output->enable_profiler(TRUE);
       

		
	}



	function index()
	{

	}

	function agregar($id_localidad = '')
	{


		$post = array("id_localidad" => $id_localidad, "nombre" => $this->input->post("nom"), "telefono" => $this->input->post("tel"));

		print_r($post);


		$res = $this->excavadores->create($post);

		echo json_encode($res);
	}

	function eliminar($id_excavador)
	{
		$result = $this->excavadores->eliminar_excavador($id_excavador); 

		
		echo json_encode($result);   

        
	}

	function editar($id_excavador)
	{

		$nombre = $this->input->post("nom");
		$telefono = $this->input->post("tel");
		

		
		$result = $this->excavadores->editar_excavador($id_excavador,$nombre, $telefono); 

		
		echo json_encode($result);   

        
	}

	function cargar($id_localidad = '')
	{
		$this->load->model('excavadores');
        
              
        $exca = $this->excavadores->get_excavador($id_localidad);


        $cargo = "<table class='table table-striped'>
        				<tbody>
                      		<tr>
                        		<th>#</th>
                        		<th>Nombre</th>
                        		<th>Teléfono</th>
                        		<th>Acciones</th>                        
                      		</tr>";

 		$i= 0;
        
        foreach ($exca as $ex) {


        $cargo .= "
							<tr>
                              <td>".$i++."</td>
                              <td>".$ex->nombre."</td>
                              <td>".$ex->telefono."</td>
                              <td>
                                    <button href='' class='btn btn-flat btn-success btn-xs editarExcavador' data-toggle='modal' data-target='#editar-excavador' data-nomexc='".$ex->nombre."' data-telexc='".$ex->telefono."' data-id='".$ex->id."'>Editar</a>
                                    <button href='' class='btn btn-flat btn-danger btn-xs eliminarExcavador' data-id='".$ex->id."' data-toggle='modal' data-target='#eliminar-excavador' data-exca='".$ex->nombre."'>Borrar</a>
                              </td>

                            </tr>";   
            
            
        }

        $cargo .= "        </tbody>
                    </table>

                   <div class='box-footer clearfix'>
                      <a class='btn btn-sm btn-warning btn-flat pull-left' data-toggle='modal' data-target='#excavador'>Agregar Nuevo Excavador</a>
                      <!-- <a class='btn btn-sm btn-default btn-flat pull-right' href=''>Listado de Excavadores</a> -->

                  </div>";
     
        echo $cargo;
	}



}