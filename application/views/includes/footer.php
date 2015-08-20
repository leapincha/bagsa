      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>



    <script src="<?php echo base_url() .'assets/plugins/jQuery/jQuery-2.1.4.min.js'?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() .'assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() .'assets//js/app.min.js'?>" type="text/javascript"></script>

        <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url() .'assets/plugins/datatables/jquery.dataTables.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() .'assets/plugins/datatables/dataTables.bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() .'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../plugins/fastclick/fastclick.min.js'></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
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


              $(document).ready(function() {
  var oTable = $('#big_table').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": '<?php echo base_url(); ?>usuario/datatable',
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayStart ":20,
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

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>