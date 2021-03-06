<script type="text/javascript">
  $(document).on("click", ".eliminarModal", function () {
      $('#id_usuario').val($(this).data('id'));
      $('#username').html($(this).data('usuario'));
  });

  function eliminar() {
      $.ajax({
          url: '/usuario/eliminar/' + $('#id_usuario').val(),
          type: "POST",
          error: function(){
          alert("Error envio de datos");
            },
          success: function(data){
            window.top.location = '/usuario';
            }
          });
  }
  

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
            Usuarios
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>Administrador</li>
            <li class="active">Usuarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-2">
            <a href="<?= base_url(); ?>usuario/agregar" class="btn btn-block btn-primary btn-flat btn-md">Agregar Usuario</a><br />
            </div>
          </div>
           <!-- Main content -->
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Usuarios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nombre y Apellido</th>
                        <th>Usuario</th>
                        <th>Mail</th>
                        <th>Rol</th>
                        <th>Imagen</th>
                        <th>Acciones</th>                            
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                          foreach($usuarios as $data){ ?>
                            <tr>
                                <td><?php echo $data->nombre; ?></td>
                                <td><?php echo $data->username; ?></td>
                                <td><?php echo $data->mail; ?></td>
                                <td><?php echo $data->rol; ?></td>
                                <td><img src="<?= base_url(); ?>assets/images/users/<?php echo $data->foto; ?>" class="user-image" alt="User Image"></td>
                                <td>
                                    <a href="<?= base_url(); ?>usuario/editar/<?= $data->id_usuario ?>" class="btn btn-flat btn-success btn-xs">Editar</a>
                                    <button class="btn btn-flat btn-danger btn-xs eliminarModal" data-toggle="modal" data-id="<?= $data->id_usuario ?>" data-usuario="<?= $data->username ?>" data-target="#eliminar">Borrar</a>
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
              <h4 class="modal-title">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_usuario" value="" />
              <p>Está seguro que desea eliminar usuario <span id="username"></span>?</p>
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