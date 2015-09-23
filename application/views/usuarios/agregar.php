
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a href="/usuario"><i class="fa fa-list-alt"></i> Usuarios</a></li>
      <li class="active">Agregar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Agregar</h3>
          </div><!-- /.box-header -->
          <br />
          <!-- form start -->
          <form class="form-horizontal" method="post" action="/usuario/agregar" enctype="multipart/form-data">
            <div class="box-body">
              <? if(validation_errors()) { ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                Por favor, verifique los campos requeridos o con error e intente nuevamente.
              </div>
              <? } ?>

              <div class="form-group <?= form_error('nombre') ? 'has-error' : ''?>">
                <label for="nombre" class="col-sm-2 control-label">Nombre y Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre y Apellido" value="<?= set_value('nombre') ?>">
                </div>
              </div>
              <div class="form-group <?= form_error('username') ? 'has-error' : ''?>">
                <label for="username" class="col-sm-2 control-label">Usuario</label>

                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" placeholder="Usuario" value="<?= set_value('username') ?>">
                </div>

                <div class="col-md-10 col-md-offset-2">
                  <?php echo form_error('username'); ?>
                </div>
                
              </div>

              <div class="form-group <?= form_error('password') ? 'has-error' : ''?>">
                <label for="`password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
                </div>
              </div>

              <div class="form-group <?= form_error('id_rol') ? 'has-error' : ''?>">
                <label for="id_rol" class="col-sm-2 control-label">Rol</label>
                <div class="col-sm-10">
                  <select id="id_rol" name="id_rol" class="form-control">
                    <option value="" <?= set_select('id_rol', ''); ?>>Seleccionar Rol</option>
                    <? foreach($roles as $r) { ?>
                    <option value="<?= $r->id_rol ?>" <?= set_select('id_rol', $r->id_rol); ?>><?= $r->rol ?></option>
                    <? } ?>
                  </select>
                </div>
              </div>
              <div class="form-group <?= form_error('email') ? 'has-error' : ''?>">
                <label for="email" class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-10">
                  <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail" value="<?= set_value('email') ?>">
                </div>
              </div>

              <div class="form-group <?= form_error('imagen') ? 'has-error' : ''?>">
                <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">
                  <input type="file" id="imagen" name="imagen"/>
                </div>
              </div>


            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->

        
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->