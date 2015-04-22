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
          url:"<?php echo URL::to('login/nuevo_password/')?>",
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
              $("#ok_cambio").slideDown('slow');
            }
          }, // fin success
          error:function(){}

        }); // fin ajax

    })
  });
</script>
<div class="container">
          <div class="alert alert-success" style="display:none" id="ok_cambio">
            <h2 align="center">Tu contraseña ha sido cambiada correctamente.</h2>
            <p  align="center"><a href="{{URL::to('login')}}"> <i class="fa fa-user"></i> ENTRAR</a></p>
          </div>       
          <form  action="" method="POST" autocomplete="on" class="form-horizontal" role="form" id="form_pw"> 
             <h1>Ingrese su nuevo Password</h1> 

            <div class="row">
              <div class="form-group">
                <input type="password" class="form-control input-lg pw" placeholder="Password" required name="password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-lg pw" placeholder="Confirme Password" required name="password_confirmation">
              </div>                
            </div>
            <!-- Mensaje de errores -->
            <div class="error" id="alerta_pw" style="display:none">
              <ul></ul>
            </div>  
                <p> 
                    <input type="submit" value="Cambiar" id="rpw" /> 
                </p>
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="code" value="{{$code}}">
          </form>
      </div>

@section('estilos')
@parent
{{ HTML::style('css/login.css')}}
@stop

@stop