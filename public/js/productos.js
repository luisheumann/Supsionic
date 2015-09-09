 $(document).ready(function(){


// guardar producto exportador
 $("#form_exportador").submit(function(e){

    preparaEnvio() // prepara el envio

    e.preventDefault();
    var formData = $(this).serializeArray();

    $.ajax({
        url:'producto_exportador',
        method:'post',
        datatype: 'json',
        enctype: 'multipart/form-data',
        data: new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,
        success:function(data){
          toastr.options.timeOut = 80;
      
          toastr.options.timeOut = 80;

          

          console.dir(data);
          
            // window.location.href = 'lista';
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
                toastr.success('Producto', 'Agregado Correctamente');
            resetForm()
          window.location.href = 'lista';
             
          }
        } // fin success
      }); // fin ajax

  // funciones
   function preparaEnvio(){
      $btn    = $('#btn_export');
      $load   = $('#load_export');
      $alerta = $('#alerta_export');
      $ok     = $('#ok_export');   
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
        $("#form_exportador")[0].reset();
        $('#selec_paises').multiselect('refresh');
        $("#addProducto").modal("hide");
        location.reload(true);
    }

  });  // fin submit form exportador



// cierrar el modal de imagenes
$(".close_addimg").click(function(event) {
  $("#AddImgModal").modal("hide");
});

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

// Cambio de unidad
$('#unidad_medida').on('change', function() {
  var optionSelected = $("option:selected", this);
  $('.unidad').attr('value', optionSelected.text());
});


/* Logica para agregar multiples upload-file*/

var abc = 0; //Declaring and defining global increement variable

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
  $('#add_more').click(function() {
      $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
         $("<input/>", {name: 'file[]', type: 'file', id: 'file'})   
       ));
  });

//following function will executes on change event of file input to select different file 
$('body').on('change', '#file', function(){
    if (this.files && this.files[0]) {
        abc += 1; 
        var z = abc - 1;
        var x = $(this).parent().find('#previewimg' + z).remove();
        $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
               
        $(this).hide();
        $("#abcd"+ abc).append($("<i class='fa fa-times fa-lg' id='img'></i>").click(function() {
                $(this).parent().parent().remove();
            }));
         }
    });

  //To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };


});  // fin load    