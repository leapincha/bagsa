<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		
        

        //$this->output->enable_profiler(TRUE);
       

		
	}



	function index()
	{

	}


	function generales($id_localidad = '')
	{

		    $this->load->model('generales');
              
        $gen= $this->generales->get_datos($id_localidad);
       

        $html = '';

 
        
        foreach ($gen as $g) {


        $html .= "<h4>Oficina</h4><br>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='tel_oficina'>Telefono</label> 
                            <div class='col-sm-10'>
                              <input name='tel_oficina' id='tel_oficina' class='form-control input-sm' type='text' value='".$g->tel_oficina."'>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='direc_oficina'>Dirección</label> 
                            <div class='col-sm-10'>
                              <input name='direc_oficina' id='direc_oficina' class='form-control input-sm' type='text' value='".$g->direc_oficina."'>
                            </div>
                          </div>
                          <hr>                    
                          <h4>Cooperativa</h4><br>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='tel_cooperativa'>Telefono</label> 
                            <div class='col-sm-10'>
                              <input name='tel_cooperativa' id='tel_cooperativa' class='form-control input-sm' type='text' value='".$g->tel_cooperativa."'>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='direc_cooperativa'>Dirección</label> 
                            <div class='col-sm-10'>
                              <input name='direc_cooperativa' id='direc_cooperativa' class='form-control input-sm' type='text' value='".$g->direc_cooperativa."'>
                            </div>
                          </div>
                          <hr>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='bombero'>Bomberos</label> 
                            <div class='col-sm-10'>
                              <input name='bombero' id='bombero' class='form-control input-sm' type='text' value='".$g->bombero."'>
                            </div>
                          </div>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='policia'>Policia</label> 
                            <div class='col-sm-10'>
                              <input name='policia' id='policia' class='form-control input-sm' type='text' value='".$g->policia."'>
                            </div>
                          </div>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='defensa_civil' style='padding-right:0px;'>Defensa Civil</label> 
                            <div class='col-sm-10'>
                              <input name='defensa_civil' id='defensa_civil' class='form-control input-sm' type='text' value='".$g->defensa_civil."'>
                            </div>
                          </div> ";   
            
            
        }
     
        echo $html;

	}


	function generales_edit($id_localidad)
	{

    $this->load->model('generales');

    if(!empty($_POST)) 
    {
    // get all post data in one nice array
      foreach ($_POST as $key => $value) 
      {
        if(empty($value))
        {
          $data1[$key] = null;
        }
        else
        {
          $data1[$key] = $value;
        }
        
      }
    }

    $result = $this->generales->editar_generales($id_localidad,$data1); 

    
    echo json_encode($result);

	}

  function tecnicos($id_localidad = '')
  {

        $this->load->model('tecnicos');
        $this->load->model('tipo_red');
              
        $tec= $this->tecnicos->get_datos($id_localidad);
        $red= $this->tipo_red->read("idred, nombre_red", "idred", "ASC");

        $html = '';

 
        
        foreach ($tec as $t) {


        $html .= "<h4>Usuarios</h4><br>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='usuarios_potenciales' style='padding-right:0px;'>Potenciales</label> 
                            <div class='col-sm-10'>
                              <input name='usuarios_potenciales' id='usuarios_potenciales' class='form-control' type='text' value='".$t->usuarios_potenciales."'>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='usuarios'>Usuarios</label> 
                            <div class='col-sm-10'>
                              <input name='usuarios' id='usuarios' class='form-control' type='text' value='".$t->usuarios."'>
                            </div>
                          </div>
                          <hr>                    
                        
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='nom'>Red</label> 
                            <div class='col-sm-10'>
                            <select id='red' name='red' class='form-control'>
                              <option value=''>Seleccionar Tipo de red</option>";
    foreach ($red as $r) {
                            $html .="<option value='".$r->idred."'". set_select('red', $r->idred, ($t->red == $r->idred)) .">".  $r->nombre_red."</option>";
    }

     $html .="               </select>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='long_red'>Long. Red</label> 
                            <div class='col-sm-10'>
                              <input name='long_red' id='long_red' class='form-control' type='text' value='".$t->long_red."'>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='cant_radios'>Radios</label> 
                            <div class='col-sm-10'>
                              <input name='cant_radios' id='cant_radios' class='form-control' type='text' value='".$t->cant_radios."'>
                            </div>
                          </div>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='cant_valvulas'>Vávulas</label> 
                            <div class='col-sm-10'>
                              <input name='cant_valvulas' id='cant_valvulas' class='form-control' type='text' value='".$t->cant_valvulas."'>
                            </div>
                          </div>";   
            
            
        }
     
        echo $html;

  }


  function tecnicos_edit($id_localidad)
  {

    $this->load->model('tecnicos');

    if(!empty($_POST)) 
    {
    // get all post data in one nice array
      foreach ($_POST as $key => $value) 
      {
        if(empty($value))
        {
          $data1[$key] = null;
        }
        else
        {
          $data1[$key] = $value;
        }
        
      }
    }

    



    $result = $this->tecnicos->editar_tecnicos($id_localidad,$data1); 

    
    echo json_encode($result);

  }

  function planta($id_localidad = '')
  {

        $this->load->model('planta');
        
              
        $plan= $this->planta->get_datos($id_localidad);


        $html = '';

 
        
        foreach ($plan as $p) {


        $html .= "
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='cant_tanques' style='padding-right:0px;'>Potenciales</label> 
                            <div class='col-sm-10'>
                              <input name='cant_tanques' id='cant_tanques' class='form-control' type='text' value='".$p->cant_tanques."'>
                            </div>
                          </div>
                         
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='cant_vapo'>Usuarios</label> 
                            <div class='col-sm-10'>
                              <input name='cant_vapo' id='cant_vapo' class='form-control' type='text' value='".$p->cant_vapo."'>
                            </div>
                          </div>
                                                                    
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='capac_dist'>Radios</label> 
                            <div class='col-sm-10'>
                              <input name='capac_dist' id='capac_dist' class='form-control' type='text' value='".$p->capac_dist."'>
                            </div>
                          </div>
                          <div class='form-group'>                            
                            <label class='col-sm-2 control-label' for='capac_almacenaje'>Vávulas</label> 
                            <div class='col-sm-10'>
                              <input name='capac_almacenaje' id='capac_almacenaje' class='form-control' type='text' value='".$p->capac_almacenaje."'>
                            </div>
                          </div>";   
            
            
        }
     
        echo $html;

  }

  function planta_edit($id_localidad)
  {

    $this->load->model('planta');

    if(!empty($_POST)) 
    {
    // get all post data in one nice array
      foreach ($_POST as $key => $value) 
      {
        if(empty($value))
        {
          $data1[$key] = null;
        }
        else
        {
          $data1[$key] = $value;
        }
        
      }
    }

    



    $result = $this->planta->editar_planta($id_localidad,$data1); 

    
    echo json_encode($result);

  }


}