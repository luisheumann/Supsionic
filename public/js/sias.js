 $(document).ready(function(){

  // Renderiza el multiselect de paises
  $('#selec_paises').multiselect({
     maxHeight: 200,
     buttonClass: 'btn btn-default btn-lg s_paises',
     enableFiltering: true,
     includeSelectAllOption: true,
     enableCaseInsensitiveFiltering: true,
     filterPlaceholder: 'Buscar Pais...',
     nonSelectedText: 'Seleccione...'
  });


  // Renderiza el multiselect de categorias
  $('#categoria_producto').multiselect({
     maxHeight: 200,
     buttonClass: 'btn btn-default btn-lg s_paises',
     enableFiltering: true,
     includeSelectAllOption: true,
     enableCaseInsensitiveFiltering: true,
     filterPlaceholder: 'Buscar categoria...',
     nonSelectedText: 'Seleccione...'
  });



//guardar producto importador
 $("#form_sias").submit(function(e){

    preparaEnvio() // prepara el envio
    e.preventDefault();
    var formData = $(this).serializeArray();

    $.ajax({
        url:'info_sias',
        method:'post',
        datatype: 'json',
        data: formData, 
        success:function(data){
          console.dir(data);
          $alerta.hide().find('ul').empty();

          if(!data.success){
             $.each(data.errors, function(index, error){
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
      $btn    = $('#btn_sias');
      $load   = $('#load_sias');
      $alerta = $('#alerta_sias');
      $ok     = $('#ok_sias');   
      $(this).find(':submit').attr('disabled','disabled'); 

      $btn.hide();
      $load.show();
      $alerta.hide();
      $ok.hide();
    }

    function resetForm(){
        $btn.show();
        $load.hide();
        $alerta.hide();
        $ok.slideDown();
        $("#form_sias")[0].reset();
        $('#selec_paises').multiselect('refresh');
        $("#addInteres").modal("hide");
        location.reload(true);
    }

  });  // fin submit form importador


});  // fin load    