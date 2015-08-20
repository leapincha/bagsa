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
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Nombre de usuario</th>
                        <th>Imagen</th>                            
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                          foreach($usuarios as $data){ ?>
                            <tr>
                                <td><?php echo $data->id_user; ?></td>
                                <td><?php echo $data->nombre; ?></td>
                                <td><?php echo $data->username; ?></td>
                                <td><img src="/assets/images/users/<?php echo $data->foto; ?>" class="user-image" alt="User Image"></td>
                            </tr>

                       <?php   } ?>
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->