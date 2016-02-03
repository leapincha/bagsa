<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">




          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview <?= ($active == "administrador") ? "active" : "" ?>">
              <a href="#"><i class='fa fa-cog'></i> <span>Administrador</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="<?= ($sub_active == "usuario") ? "active" : "" ?>"><a href="<?= base_url(); ?>usuario"><i class='fa fa-users'></i>Usuarios</a></li>                
              </ul>
            </li>
            
            <li class="<?= ($active == "regional") ? "treeview active" : "" ?>"><a href="<?= base_url(); ?>regional"><i class='fa fa-globe'></i> <span>Regionales</span></a></li>
            <li class="<?= ($active == "uo") ? "treeview active" : "" ?>"><a href="<?= base_url(); ?>uo"><i class='fa fa-th'></i> <span>UO</span></a></li>
            <li class="<?= ($active == "localidades") ? "treeview active" : "" ?>"><a href="<?= base_url(); ?>localidad"><i class='fa fa-sitemap'></i> <span>Localidades</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
