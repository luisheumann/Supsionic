@extends('layouts/default')
@section('content')

@section('title')
@parent
.:: Recuperar Password ::.
@stop
<script>
  $(document).ready(function(){
    $('#form_pw').submit(function(e){
      
      e.preventDefault()
      var alerta  = $('#alerta_pw');
      var formData = $(this).serializeArray();

      $.ajax({
          url:'recuperar_password',
          method:'post',
          datatype: 'json',
          data: formData,

          success:function(data){

            alerta.hide().find('ul').empty();
            if(!data.success){

               $.each(data.errors, function(index, error){
                  alerta.find('ul').append('<li>'+error+'</li>');
                });

               alerta.slideDown('slow');
            }
            else{
              $('#form_pw').slideUp('slow');
              $("#ok_email").slideDown('slow');
              $("#activar").html('<a href="nuevo_password/'+data.resetCode+'/'+data.email+'">Activar</a>');
            }            
          }, // fin success
          error:function(){}

        }); // fin ajax

    })
  });
</script>
<div class="container">
      <div id="login" class="animate form">
          <div align="center" class="alert alert-success" style="display:none" id="ok_email">
            <h2><i class="fa fa-unlock"></i> Activar Registro</h2>
            <p>Las instrucciones para restablecer tu contraseña se enviaron por email.</p>
            <p id="activar"></p>
          </div> 

          <form action="" method="POST" autocomplete="on" class="form-horizontal" role="form" id="form_pw"> 
           <h1>Recuperar Password</h1> 
            <p>Escriba su correo electrónico registrado, y le enviaremos un enlace para recuperar su contraseña.</p>
          <div class="row">
            <input type="email" class="form-control" id="email" placeholder="E-MAIL" required name="email">
            <!-- Mensaje de errores -->
            <div  id="alerta_pw" style="display:none">
              <ul></ul>
            </div>                 
          </div>
                 <p><input type="submit" value="RECUPERAR" id="rpw" /> </p> 
          </form>
      </div>
</div>


@section('estilos')
@parent
{{ HTML::style('css/login.css')}}
@stop


@stop