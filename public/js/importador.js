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

//Cambio categoria 
$('#categoria_producto').on('change', function() {
  var optionSelected = $("option:selected", this);
  $('#view_cate').text(optionSelected.text());
});

//guardar producto importador
 $("#form_importador").submit(function(e){

    preparaEnvio() // prepara el envio
    e.preventDefault();
    var formData = $(this).serializeArray();

    $.ajax({
        url:'interes_importador',
        method:'post',
        datatype: 'json',
        data: formData, 
        success:function(data){
          console.dir(data);


 toastr.success('Producto', 'Agregado Correctamente');
          

            location.reload(true);
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
               location.reload(true);
          }
        } // fin success
      }); // fin ajax

  // funciones
   function preparaEnvio(){
      $btn    = $('#btn_import');
      $load   = $('#load_import');
      $alerta = $('#alerta_import');
      $ok     = $('#ok_import');   
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
        $("#form_importador")[0].reset();
        $('#selec_paises').multiselect('refresh');
        $("#addInteres").modal("hide");
        location.reload(true);
    }

  });  // fin submit form exportador

});  // fin load    