<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Buenos Aires Gas S.A.</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() .'assets/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->
    <link href="<?php echo base_url() .'assets/plugins/datatables/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() .'assets/css/AdminLTE.min.css'?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo base_url() .'assets/css/skins/skin-yellow.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() .'assets/css/style.css'?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
    <script src="<?php echo base_url() .'assets/plugins/jQuery/jQuery-2.1.4.min.js'?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() .'assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() .'assets/plugins/fastclick/fastclick.min.js'?>"></script>
    <script src="<?php echo base_url() .'assets//js/app.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() .'assets/js/demo.js'?>" type="text/javascript"></script>

        <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url() .'assets/plugins/datatables/jquery.dataTables.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() .'assets/plugins/datatables/dataTables.bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() .'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
    <!-- FastClick -->
    
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
       
      });


              $(document).ready(function() {
  var oTable = $('#big_table').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": '<?php echo base_url(); ?>usuario/datatable',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 20,
                "oLanguage": {
            "sProcessing": "<img src='<?php echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
        },  
        "fnInitComplete": function() {
                //oTable.fnAdjustColumnSizing();
         },
                'fnServerData': function(sSource, aoData, fnCallback)
            {
              $.ajax
              ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
              });
            }
  } );
} );
    </script>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-yellow sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">  <img src="/assets/images/logo_bagsa_chico.jpg" class="img-responsive logo-bagsa"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="/assets/images/logo_bagsa_1.jpg" class="img-responsive logo-bagsa"></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
         


              <!-- Tasks Menu -->
 
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="/assets/images/users/<?php echo $this->session->userdata('foto'); ?>" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('nombre'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="/assets/images/users/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('nombre'); ?>
                      <small>Sector/Area</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="<?= base_url(); ?>login/logout"><i class="fa fa-sign-out"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>