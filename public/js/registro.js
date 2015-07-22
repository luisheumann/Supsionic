 $(document).ready(function(){











// para que quede en el mismo tab cuando haya un reload del browser
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });

  
    $("#datos-basico2").submit(function(e){

      preparaEnvio();

      $.ajax({
          url:'registro_basico',
          method:'post',
          datatype: 'json',
          enctype: 'multipart/form-data',
          data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,

          success:function(data_basico){
            console.dir(data_basico);

            $alerta.hide().find('ul').empty();
           
            if(!data_basico.success){
          toastr.error('No Modificados', 'Datos Empresa');
                    $('#myModal2').modal('hide')
               $.each(data_basico.errors, function(index, error){
                  /*$alerta.find('ul').append('<li>'+error+'</li>');*/
                 
                });
               $alerta.slideDown('slow');
               $btn.show();
               $load.hide();
            }
            else{


 toastr.success('Modificados Correctamente', 'Datos Empresa');
             $('#myModal2').modal('hide')


               resetForm()
            }
            
          } // fin success

        }); // fin ajax

  // funciones
   function preparaEnvio(){
      $ok     = $('#alerta_ok');
      $btn    = $('#btn_basico');
      $load   = $('#load_basico');
      $alerta = $('#alerta_basico');

      $ok.hide();
      $alerta.hide();
      $btn.hide();
      $load.show();

      e.preventDefault()
    }

    function resetForm(){
        $btn.show();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
    }

  });  // fin submit




   $("#datos-basico").submit(function(e){

      preparaEnvio();

      $.ajax({
          url:'datos_basicos',
          method:'post',
          datatype: 'json',
          enctype: 'multipart/form-data',
          data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,

          success:function(data_basico){
            console.dir(data_basico);

            $alerta.hide().find('ul').empty();
            
            if(!data_basico.success){
          
            toastr.error('No Modificados', 'Datos Basico');
          $('#myModal').modal('hide')

               $.each(data_basico.errors, function(index, error){
              
                  
                });
               $alerta.slideDown('slow');
               $btn.show();
               $load.hide();
            }
            else{

 toastr.success('Modificados Correctamente', 'Datos Basicos');
             $('#myModal').modal('hide')

               resetForm()
            }
            
          } // fin success

        }); // fin ajax

  // funciones
   function preparaEnvio(){
      $ok     = $('#alerta_ok');
      $btn    = $('#btn_basico');
      $load   = $('#load_basico');
      $alerta = $('#alerta_basico');

      $ok.hide();
      $alerta.hide();
      $btn.hide();
      $load.show();

      e.preventDefault()
    }

    function resetForm(){
        $btn.show();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
    }

  });  // fin submit



$("#datos-basico3").submit(function(e){

      preparaEnvio();

      $.ajax({
          url:'datos_basicos3',
          method:'post',
          datatype: 'json',
          enctype: 'multipart/form-data',
          data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,

          success:function(data_basico){
            console.dir(data_basico);

            $alerta.hide().find('ul').empty();
            
            if(!data_basico.success){
          
            toastr.error('No Modfffffificados', 'Datos Basico');
          $('#myModal').modal('hide')

               $.each(data_basico.errors, function(index, error){
              
                  
                });
               $alerta.slideDown('slow');
               $btn.show();
               $load.hide();
            }
            else{

 toastr.success('Modificados Correctamfffente', 'Datos Basicos');
             $('#myModal').modal('hide')

               resetForm()
            }
            
          } // fin success

        }); // fin ajax

  // funciones
   function preparaEnvio(){
      $ok     = $('#alerta_ok');
      $btn    = $('#btn_basico');
      $load   = $('#load_basico');
      $alerta = $('#alerta_basico');

      $ok.hide();
      $alerta.hide();
      $btn.hide();
      $load.show();

      e.preventDefault()
    }

    function resetForm(){
        $btn.show();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
    }

  });  // fin submit




 $("#datos-basico-detalle").submit(function(e){

      preparaEnvio();

      $.ajax({
          url:'datos_basicos_detalle',
          method:'post',
          datatype: 'json',
          enctype: 'multipart/form-data',
          data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,

          success:function(data_basico_detalle){
            console.dir(data_basico_detalle);

            $alerta.hide().find('ul').empty();
            
            if(!data_basico_detalle.success){

                 toastr.error('No Modificado', 'Detalle del Comercio');
             $('#myModal3').modal('hide')
               

               $.each(data_basico_detalle.errors, function(index, error){
                  $alerta.find('ul').append('<li>'+error+'</li>');
                });
               $alerta.slideDown('slow');
               $btn.show();
               $load.hide();
            }
            else{

               toastr.success('Modificados Correctamente', 'Detalle del Comercio');
             $('#myModal3').modal('hide')


               resetForm()
            }
            
          } // fin success

        }); // fin ajax

  // funciones
   function preparaEnvio(){
      $ok     = $('#alerta_ok');
      $btn    = $('#btn_basico');
      $load   = $('#load_basico');
      $alerta = $('#alerta_basico');

      $ok.hide();
      $alerta.hide();
      $btn.hide();
      $load.show();

      e.preventDefault()
    }

    function resetForm(){
        $btn.show();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
    }

  });  // fin submit




// cambio de perfil
  $("#form_cambio_perfil").submit(function(e){

      preparaEnvio();
      var formData = $(this).serializeArray();
      $.ajax({
          url:'cambio_perfil',
          method:'post',
          datatype: 'json',
          data: formData, 
          success:function(data_cambio){
            console.dir(data_cambio);

            $alerta.hide().find('ul').empty();
            if(!data_cambio.success){

               $.each(data_cambio.errors, function(index, error){
                  $alerta.find('ul').append('<li>'+error+'</li>');
                });
               $alerta.slideDown('slow');
               $btn.show();
               $load.hide();
            }
            else{
               resetForm()
            }
          } // fin success

        }); // fin ajax

  // funciones
   function preparaEnvio(){
      $btn    = $('#btn_salvar_perfil');
      $load   = $('#load_cp');
      $alerta = $('#alerta_cp');
      $ok     = $('#ok_cp');

      $alerta.hide();
      $btn.hide();
      $load.show();

      e.preventDefault()

    }

    function resetForm(){
        $btn.hide();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
        window.setTimeout(
        function(){
            location.reload(true)
          },
          1500
        );
    }

  });  // fin submit



});  // fin load    

