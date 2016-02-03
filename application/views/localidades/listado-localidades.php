<script type="text/javascript">

$(function () { $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
          "language": {
         "url": "/assets/json/Spanish.json"
        }
        }); 
});

</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Localidades
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>Localidades</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-2">
            <a href="<?= base_url(); ?>localidad/agregar" class="btn btn-block btn-primary btn-flat btn-md">Agregar Localidad</a><br />
            </div>
          </div>
           <!-- Main content -->
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Localidades</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Localidad</th>
                        <th>UO</th>
                        <th>Regional</th>
                        <th>Acciones</th>                           
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                          foreach($localidades as $data){ ?>
                            <tr>
                                <td><?php echo $data->nombre; ?></td>
                                <td><?php echo $data->unidad_operativa; ?></td>
                                <td><?php echo $data->regional; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>localidad/editar/<?= $data->id ?>" class="btn btn-flat btn-success btn-xs">Editar</a>
                                    <a href="<?= base_url(); ?>localidad/panel/<?= $data->id ?>" class="btn btn-flat btn-info btn-md"><i class='fa fa-search'></i><span> Panel de Control</span></a>
                                </td>
                            </tr>

                       <?php   } ?>
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      <div class="modal fade" id="eliminar" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Eliminar Localidad</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_usuario" value="" />
              <p>Está seguro que desea eliminar localidad <span id="username"></span>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" onclick="eliminar();">Aceptar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->