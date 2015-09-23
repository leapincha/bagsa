<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Regionales
    </h1>
    <ol class="breadcrumb">
      <li><a href="/usuario"><i class="fa fa-list-alt"></i> Regionales</a></li>
      <li class="active">Editar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Editar</h3>
          </div><!-- /.box-header -->
          <br />
          <!-- form start -->
          <form class="form-horizontal" method="post" action="/regional/editar/<?= $id_regional ?>" enctype="multipart/form-data">
            <div class="box-body">
              <? if(validation_errors()) { ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                Por favor, verifique los campos requeridos o con error e intente nuevamente.
              </div>
              <? } ?>

              <div class="form-group <?= form_error('nombre') ? 'has-error' : ''?>">
                <label for="nombre" class="col-sm-2 control-label">Nombre Regional</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre Regional" value="<?= set_value('nombre',$nombre) ?>">
                </div>
                 <div class="col-md-10 col-md-offset-2">
                  <?php echo form_error('nombre'); ?>
                </div>
              </div>
              <div class="form-group <?= form_error('responsable') ? 'has-error' : ''?>">
                <label for="responsable" class="col-sm-2 control-label">Responsable</label>

                <div class="col-sm-10">
                  <input type="text" name="responsable" class="form-control" placeholder="Responsable" value="<?= set_value('responsable',$responsable) ?>">
                </div>

               
                
              </div>




            </div><!-- /.box-body -->
            <div class="box-footer">
              
              <a href="/usuario" class="btn btn-warning">Cancelar</a>
              <button type="submit" class="btn btn-primary">Actualizar</button>
              
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->

        
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->