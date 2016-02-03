  function eliminar_excavador() {
      $.ajax({
          url: '/excavador/eliminar/' + $('#id_excavador').val(),
          type: "POST",
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();}
          });
      
  }

    function eliminar_personal() {
      $.ajax({
          url: '/personal/eliminar/' + $('#id_pers').val(),
          type: "POST",
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();}
          });
      
  }



$(document).ready(function() {
  function init_map1() {
            var lat=$("#map1").data("latitud");
            var longi=$("#map1").data("longitud");
            //alert("Latitud="+lat+" Longitud= "+longi);
            var myLocation = new google.maps.LatLng(lat, longi);
            var mapOptions = {
                center: myLocation,
                zoom: 10
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }

  init_map1();

  $("#agregar-personal").submit(function(event){
      $.ajax({
          url: '/personal/agregar/' + $('#id_localidad').val(),
          type: "POST",
          data: $("#agregar-personal").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });




    $("#excavadores").submit(function(event){
      //$('#excavador').hide();
      $.ajax({
          url: '/excavador/agregar/' + $('#id_localidad').val(),
          type: "POST",
          data: $("#excavadores").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success:function(data){
            //window.location.reload(true);
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();

            //window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
            
          }
      });


     event.preventDefault();
     return false;

    });


    $("#excavadores-edit").submit(function(event){
      $.ajax({
          url: '/excavador/editar/' + $('#id_excavador').val(),
          type: "POST",
          data: $("#excavadores-edit").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });

     $("#edit-generales").submit(function(event){
      $.ajax({
          url: '/datos/generales_edit/' + $('#id_localidad').val(),
          type: "POST",
          data: $("form#edit-generales").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });



    $("#ubicacion-edit").submit(function(event){
      $.ajax({
          url: '/ubicaciones/editar/' + $('#id_ubicacion').val(),
          type: "POST",
          data: $("#ubicacion-edit").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });

    $("#editar-tecnicos").submit(function(event){
      $.ajax({
          url: '/datos/tecnicos_edit/' + $('#id_localidad').val(),
          type: "POST",
          data: $("#editar-tecnicos").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });

    $("#editar-planta").submit(function(event){
      $.ajax({
          url: '/datos/planta_edit/' + $('#id_localidad').val(),
          type: "POST",
          data: $("#editar-planta").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });


  $("#imagenes-agregar").submit(function(event){
      $.ajax({
          url: '/imagenes_planta/agregar/' + $('#id_localidad').val(),
          type: "POST",
          data: $("#imagenes-agregar").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     event.preventDefault();
     return false;

    });



  $(document).on("click", ".eliminarExcavador", function () {
      $('#id_excavador').val($(this).data('id'));
      $('#excava').html($(this).data('exca'));
  });

  $(document).on("click", ".eliminarPersonal", function () {
      $('#id_pers').val($(this).data('id'));
      $('#persona').html($(this).data('nom'));
  });

  $(document).on("click", ".edit-gen", function () {
                $.ajax({
                   type: "POST",
                   url: '/datos/generales/'+ $('#id_localidad').val(),
                   success: function(html){
                       $("#id_general").html(html);
                   }
               });

  });

  $(document).on("click", ".edit-tec", function () {
                $.ajax({
                   type: "POST",
                   url: '/datos/tecnicos/'+ $('#id_localidad').val(),
                   success: function(html){
                       $("#id_tecnicos").html(html);
                   }
               });

  });

  $(document).on("click", ".edit-pla", function () {
                $.ajax({
                   type: "POST",
                   url: '/datos/planta/'+ $('#id_localidad').val(),
                   success: function(html){
                       $("#id_planta").html(html);
                   }
               });

  });



  $(document).on("click", ".edit-pers", function () {
        $.ajax({
                   type: "POST",
                   url: '/personal/ver/'+ $('#id_localidad').val(),
                   success: function(html){
                       $("#id_personal").html(html);
                   }
               });



  });

    $(document).on("click", ".edit-im", function () {
        $.ajax({
                   type: "POST",
                   url: '/imagenes_planta/ver/'+ $('#id_localidad').val(),
                   success: function(html){
                       $("#id_imagen").html(html);
                   }
               });



  });

$(document).on("click", ".editarExcavador", function () {
      $('#id_excavador').val($(this).data('id'));
      $('#nombre').val($(this).data('nomexc'));
      $('#tel').val($(this).data('telexc'));
      $('#exca_ant').html($(this).data('nomexc'));

  });

$(document).on("click", ".elim-imagen", function () {
      var id_im = $(this).data("id");
      //alert("Id Imagen:"+id_im);
      $.ajax({
        url:'/imagenes_planta/eliminar_imagen/'+id_im,
        success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
        
      });

  });





$(document).on("click", ".editar", function () {
        //alert("PEPEEEEEEEE");
        var element = $(this);
        var Id = element.attr("id");
        var nom = $("#nom_pers"+Id).val();
        var tel = $("#tel_pers"+Id).val();
        var tip = $("#id_tipo"+Id).val();
        var dataString = 'nom_pers='+ nom + '&tel_pers=' + tel + '&id_tipo=' + tip;
        $.ajax({
          url: '/personal/editar/' + Id,
          type: "POST",
          data: dataString,
          error: function(){
          alert("Error envio de datos");
          },
          success: function(data){
            window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
          }
      });


     
     return false;

    });

  });



$(document).on("click", ".editarUbicacion", function () {
      $('#id_ubicacion').val($(this).data('id'));
      $('#latitud').val($(this).data('latitud'));
      $('#longitud').val($(this).data('longitud'));
      

  });