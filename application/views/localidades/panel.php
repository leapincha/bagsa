 <style>
    .map {
        min-width: 220px;
        min-height: 200px;
        max-height: 200px;
        width: 100%;
        height: 100%;
    }    

    
    </style>
<script src="<?php echo base_url() .'assets/js/angular.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url() .'assets/js/panel.js'?>" type="text/javascript"></script>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <p><?php echo $locali->nombre; ?></p>
            <small>Unidad Operativa: <?php echo $locali->nombre_unidad; ?> /</small>
            <small>Regional: <?php echo $locali->nombre_regional; ?> /</small>
            <small>Responsable Regional: <?php echo $locali->responsable_regional; ?></small>            
          </h1>
          <p></p>
          <button type="button" class="btn btn-warning" ><i class="fa fa-book"></i>  Gestor de Documentos</button>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url(); ?>localidad">Localidades</a></li>
            <li class="active"><?php echo $locali->nombre; ?></li>
          </ol>
        </section>


        <!-- Main content -->
        <section class="content">
          <!-- COLOR PALETTE -->
          
          <!-- START CUSTOM TABS -->
         
          <center><div id="result"></div></center>
          <div class="row">
            <div class="col-md-6">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos Generales</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Personal</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Datos Técnicos</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Planta</a></li>

                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <dl class="dl-horizontal">
                      <dt>Oficina</dt><dd>Tel: <?php echo $locali->tel_oficina; ?></dd><dd>Dirección: <?php echo $locali->direc_oficina; ?></dd>
                      <dt>Cooperativa</dt><dd>Tel: <?php echo $locali->tel_cooperativa; ?></dd><dd>Dirección: <?php echo $locali->direc_cooperativa; ?></dd>
                      <dt>Bombero</dt><dd><?php echo $locali->bombero; ?></dd>
                      <dt>Policía</dt><dd><?php echo $locali->policia; ?></dd>
                      <dt>Defensa Civil</dt><dd><?php echo $locali->defensa_civil; ?></dd>
                    </dl>
                    <div class="box-footer clearfix">
                      <a class="btn btn-sm btn-default btn-flat pull-left edit-gen" data-toggle="modal" data-target="#edit-generales">Editar Datos Generales</a>
                    </div>            
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">

                   <?php  foreach($personas as $pers) { ?>
                          <dl class="dl-horizontal">

                            <dt><i class="fa fa-user"></i> <?php echo $pers->tipo; ?></dt>
                            <dd><?php echo $pers->nombre_apellido; ?></dd>
                            <dd>Tel: <?php echo $pers->telefono; ?></dd>

                          </dl>


                  <?php } ?>
                    <div class="box-footer clearfix">
                      <a class="btn btn-sm btn-primary btn-flat pull-left" data-toggle="modal" data-target="#personal">Agregar Nuevo Personal</a>
                      <a class="btn btn-sm btn-default btn-flat pull-right edit-pers" data-toggle="modal" data-target="#edit-personal">Editar Personal</a>

                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <dl class="dl-horizontal">
                      <dt>Usuarios Potenciales</dt><dd><?php echo $locali->potenciales; ?></dd>
                      <dt>Cantidad de Usuarios</dt><dd><?php echo $locali->usuarios; ?></dd>
                      <dt>Red</dt><dd><?php echo $locali->nombre_red; ?> </dd>
                      <dt>Longitud de red (m)</dt><dd><?php echo $locali->long_red; ?> </dd>
                      <dt>Cantidad de radios</dt><dd><?php echo $locali->cant_radios; ?> </dd>
                      <dt>Cantidad de válvulas</dt><dd><?php echo $locali->cant_valvulas; ?> </dd>
                    </dl>
                    <div class="box-footer clearfix">
                      <a class="btn btn-sm btn-default btn-flat pull-left edit-tec" data-toggle="modal" data-target="#edit-tecnicos">Editar Datos Técnicos</a>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    <dl class="dl-horizontal">
                      <dt>Tanques</dt>
                      <dd><?php echo $locali->cant_tanques; ?> </dd>
                      <dt>Vaporizadores</dt>
                      <dd><?php echo $locali->cant_vapo; ?> </dd>
                      <dt>Distribución</dt>
                      <dd><?php echo $locali->capac_dist; ?> </dd>
                      <dt>Almacenaje</dt>
                      <dd><?php echo $locali->capac_almacenaje; ?> </dd>
                    </dl>
                    <div class="box-footer clearfix">
                      <a class="btn btn-sm btn-default btn-flat pull-left edit-pla" data-toggle="modal" data-target="#edit-planta">Editar Datos Planta</a>
                    </div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->

              <!-- /.Modal-editar Datos Generales-->
                <div class="modal fade" id="edit-generales" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Datos Generales - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      <form id="edit-generales" method="POST" class="form-horizontal">
                        <div class="box-body">
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                                      
                          <div id="id_general">


                          </div>
    
                   

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <!-- /.Modal-editar Datos Tecnicos-->
                <div class="modal fade" id="edit-tecnicos" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Datos Técnicos - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      <form id="editar-tecnicos" method="POST" class="form-horizontal">
                        <div class="box-body">
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                                      
                          <div id="id_tecnicos">


                          </div>
    
                   

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


                <!-- /.Modal-editar Datos Planta-->
                <div class="modal fade" id="edit-planta" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Datos Planta - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      <form id="editar-planta" method="POST" class="form-horizontal">
                        <div class="box-body">
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                                      
                          <div id="id_planta">


                          </div>
    
                   

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
               

              <!-- /.Modal-Agregar personal-->
                <div class="modal fade" id="personal" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Agregar Personal - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      <form id="agregar-personal" method="POST">
                        <div class="modal-body">
                        
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                          <div class="form-group">
                            <label for="nom">Nombre y Apellido</label><br>
                            <input name="nom" id="nom_pers" class="form-control" type="text" required>
                          </div>
                          <div class="form-group">
                            <label for="nom">Tipo</label><br>
                            <select id="id_tipo" name="id_tipo" class="form-control" required>
                              <option value="">Seleccionar Tipo</option>
                                <? foreach($tipo_pers as $tip) { ?>
                                <option value="<?= $tip->id ?>" <?= set_select('id', $tip->id); ?>><?= $tip->tipo ?></option>
                                <? } ?>
                            </select>
                            
                          </div>                          
                          <div class="form-group">
                            <label for="tel">Teléfono</label><br>
                            <input name="tel" id="tel_pers" class="form-control" type="text" required>
                          </div>        
                   

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <!-- Termina agregar personal-->

              <!-- /.Modal-Editarpersonal-->
                <div class="modal fade" id="edit-personal" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Personal - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      

                          <div id="id_personal">
                            
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                      
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                 <!-- Termina editar personal-->
                 <!-- Eliminar personal-->
                <div class="modal fade" id="eliminar-personal" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Eliminar Personal</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                        <input type="hidden" id="id_personal" value="" />
                        <p>Está seguro que desea eliminar el personal <span id="persona"></span>?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="eliminar_personal();">Aceptar</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Excavadores</h3>
                </div>
                <div class="box-body no-padding">
                 <div id="excavador-cargar excavador-limpiar">
                </div>
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>                        
                      </tr>
                    
                  
                    <?php 
                        $i= 1;
                          foreach ($excavador as $exca) { ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $exca->nombre; ?></td>
                              <td><?php echo $exca->telefono; ?></td>
                              <td>
                                    <button href="" class="btn btn-flat btn-success btn-xs editarExcavador" data-toggle="modal" data-target="#editar-excavador" data-nomexc="<?= $exca->nombre; ?>" data-telexc="<?= $exca->telefono; ?>" data-id="<?= $exca->id; ?>">Editar</a>
                                    <button href="" class="btn btn-flat btn-danger btn-xs eliminarExcavador" data-id="<?= $exca->id ?>" data-toggle="modal" data-target="#eliminar-excavador" data-exca="<?= $exca->nombre ?>">Borrar</a>
                              </td>

                            </tr>
                    <?php } ?>

                    
                    </tbody>
                  </table>

                    <div class="box-footer clearfix">
                      <a class="btn btn-sm btn-warning btn-flat pull-left" data-toggle="modal" data-target="#excavador">Agregar Nuevo Excavador</a>
                      <!-- <a class="btn btn-sm btn-default btn-flat pull-right" href="">Listado de Excavadores</a> -->
                    </div>
                  
                </div>
              </div>
                <!-- /.Modal-Agregar Excavador -->
                <div class="modal fade" id="excavador" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-warning">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Agregar Excavador - <?php echo $locali->nombre; ?> </h4>
                      </div>
                      <form id="excavadores" method="POST">
                        <div class="modal-body">
                        
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                          <div class="form-group">
                            <label for="nom">Nombre y Apellido</label><br>
                            <input name="nom" id="nom_exc" class="form-control" type="text" required>
                          </div>
                          <div class="form-group">
                            <label for="tel">Teléfono</label><br>
                            <input name="tel" id="tel_exc" class="form-control" type="text" required>
                          </div>        
                   

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning">Agregar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


                <!-- /.Modal-Editar Excavador -->
                <div class="modal fade" id="editar-excavador" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-warning">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Excavador - <?php echo $locali->nombre; ?> - <span id="exca_ant"></span> </h4>
                      </div>
                      <form id="excavadores-edit" method="POST">
                        <div class="modal-body">
                        
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                          <input type="hidden" id="id_excavador" value="" />
                          <div class="form-group">
                            <label for="nom">Nombre y Apellido</label><br>
                            <input name="nom" id="nombre" class="form-control" type="text" required>
                          </div>
                          <div class="form-group">
                            <label for="tel">Teléfono</label><br>
                            <input name="tel" id="tel" class="form-control" type="text" required>
                          </div>        
                   

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning">Editar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <!-- /.Modal-eliminar Excavador -->
                <div class="modal fade" id="eliminar-excavador" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Eliminar Excavador</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                        <input type="hidden" id="id_excavador" value="" />
                        <p>Está seguro que desea eliminar excavador <span id="excava"></span>?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="eliminar_excavador();">Aceptar</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


            </div><!-- /.col -->



             <div class="col-md-6">
                            <!-- /.Editar Ubicación -->
              <div class="modal fade" id="editar-ubicacion" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-danger">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Ubicación- <?php echo $locali->nombre; ?><span id="exca_ant"></span> </h4>
                      </div>
                      <form id="ubicacion-edit" method="POST">
                        <div class="modal-body">
                        
                          <input type="hidden" id="id_localidad" value="<?php echo $id_locali; ?>" />
                          <input type="hidden" id="id_ubicacion" value="" />
                          <div class="form-group">
                            <label for="nom">Latitud</label><br>
                            <input name="latitud" id="latitud" class="form-control" type="text" required>
                          </div>
                          <div class="form-group">
                            <label for="tel">Longitud</label><br>
                            <input name="longitud" id="longitud" class="form-control" type="text" required>
                          </div>        
                   

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger">Editar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <!-- /. Fin Editar Ubicación -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">Ubicación de la Planta</h3>
                <?php foreach ($ubic as $ub) { ?>
                  <div class="box-tools">
                      <button class="btn btn-box-tool editarUbicacion" data-toggle="modal" data-target="#editar-ubicacion" type="button" data-latitud="<?= $ub->latitud ?>" data-longitud="<?= $ub->longitud ?>" data-id="<?= $ub->id_ubicacion ?>">
                        <i class="fa fa-cog"></i>
                      </button>
                  </div>                         
                </div><!-- /.box-header -->

                
                  <div id="map1" class="map" data-latitud="<?= $ub->latitud ?>" data-longitud="<?= $ub->longitud ?>"></div>

                <?php } ?>

              </div>




                

              <div class="box box-success">
                <div class="box-header with-border">
                  <i class="fa fa-photo"></i>
                  <h3 class="box-title">Fotos de la Localidad</h3>
                  <div class="box-tools">
                      <button class="btn btn-box-tool edit-im" data-toggle="modal" data-target="#editar-imagenes" type="button" data-idloca="<?= $id_locali; ?>">
                        <i class="fa fa-cog"></i>
                      </button>
                      <button class="btn btn-box-tool agreg-im" data-toggle="modal" data-target="#agregar-imagenes" type="button" data-idloca="<?= $id_locali; ?>">
                        <i class="fa fa-plus"></i>
                      </button>
                  </div>  

                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                  <?php
                  for ($k = 0; $k < count($image); ++$k) { ?>                   
                                          
                      <li data-target="#carousel-example-generic" data-slide-to="<? echo $k-1; ?>" class="<? if($k == 1) { echo "active"; } else {echo "";} ?>"></li>

                    
                  <?php 
                      
                      } ?>
                      </ol>
                    <div class="carousel-inner">

                      <?php 
                      $j= 0;
                      foreach ($image as $im) { ?>
                        <div class="item <? if($j == 0) echo "active"; ?>">
                          <img src="/assets/images/fotos_planta/<?php echo $im->url_img; ?>">
                          <div class="carousel-caption">
                              <?php echo $im->descripcion; ?>
                          </div>
                        </div>
                      <?php 
                      $j++;
                      } ?>


                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                </div><!-- /.box-body -->

               <!-- /.Editar Imagenes-->
              <div class="modal fade" id="editar-imagenes" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-success">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Imágenes - <?php echo $locali->nombre; ?><span id="exca_ant"></span> </h4>
                      </div>
                      <form id="imagenes-edit" method="POST">
                        <div class="modal-body">
                        

                            <div id="id_imagen">

                            </div>


                       </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


              <!-- /.Agregar Imagenes-->
              <div class="modal fade" id="agregar-imagenes" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-success">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Agregar Imágenes - <?php echo $locali->nombre; ?></h4>
                      </div>
                      <form id="imagenes-agregar" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                          <div class="form-group">
                            <label for="archivo">Imagenes</label><br>
                            <input name="archivo[]" type="file" multiple="multiple">
                          </div>       


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>



                





              </div><!-- /.box -->
            </div><!-- /.col -->

            
          </div> <!-- /.row -->
          <!-- END CUSTOM TABS -->




        </section><!-- /.content -->