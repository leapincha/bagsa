
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Imagenes
    </h1>
    <ol class="breadcrumb">
      <li><a href="/usuario"><i class="fa fa-list-alt"></i> Localidades</a></li>
      <li><a href="/usuario"><i class="fa fa-list-alt"></i> Imagenes</a></li>
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
          <?php echo form_open_multipart('imagenes_planta/agregar/'. $locali);?>
            <div class="box-body">
				<?php if (isset($error)) {
    					echo $error;
				} ?> 

              <div class="form-group <?= form_error('nombre') ? 'has-error' : ''?>">
                <label for="nombre" class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">
                  <input type="file" name="userfile" size="20" />
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