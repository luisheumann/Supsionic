
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;
       $usuarios = User::find($user_id)->first();

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

 

?>

   {{HTML::script('js/jquery-1.11.0.min.js')}}  

   {{HTML::script('js/bootstrap.min.js')}}
   {{HTML::script('js/modernizr-2.6.2-respond-1.1.0.min.js')}}
   {{HTML::script('js/main.js')}} 
     {{HTML::script('js/jquery.validationEngine.js')}}   
       {{HTML::script('js/jquery.validationEngine-es.js')}}   
       {{HTML::style('css/normalize.css')}}
     {{HTML::style('css/bootstrap.min.css')}}
   {{--HTML::style('css/non-responsive.css')--}}
   {{--HTML::style('css/flat-ui.css')--}}
   {{HTML::style('css/font-awesome.min.css')}}
   {{HTML::style('css/main.css')}}
     {{HTML::style('css/validationEngine.jquery.css')}}
       {{HTML::style('css/customMessages.css')}}
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


@extends('layouts/backend')

@section('content-header')


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
          url:"<?php echo URL::to($empresa->slug.'/login/nuevo_password2/')?>",
          method:'post',
          datatype: 'json',
          data: formData,

          success:function(data){
       window.location.href = '../admin/perfil/empresa#datos-basicos';
            alerta.hide().find('ul').empty();
            if(!data.success){
             toastr.success('Error', 'Contraseña');
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
                <input type="hidden" name="email" value="{{$usuarios->email}}">
                <input type="hidden" name="id" value="{{$usuarios->id}}">
          </form>
      </div>

@section('estilos')
@parent
{{ HTML::style('css/login.css')}}
@stop
@stop

