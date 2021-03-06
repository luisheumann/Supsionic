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


@extends('layouts/backend')

@section('content-header')
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
 <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Productos</li>
          </ol>
@stop



@section('content')


<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cambio de Password</h3>
                  <div class="box-tools">
                 
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
               
<div class="container">
          <div class="alert alert-success" style="display:none" id="ok_cambio">
            <h2 align="center">Tu contraseña ha sido cambiada correctamente.</h2>
            <p  align="center"><a href="{{URL::to('login')}}"> <i class="fa fa-user"></i> ENTRAR</a></p>
          </div>       
          <form  action="../../login/nuevo_password2/" method="POST" autocomplete="on" class="form-horizontal" role="form" id="form_pw"> 
             

         
             <center>
                <input type="password" style="width:200px;"  class="form-control" placeholder="Password" required name="password">
                <br>
           
             
                <input type="password" style="width:200px;"  class="form-control" placeholder="Confirme Password" required name="password_confirmation">
                        
          </center>
            <!-- Mensaje de errores -->
            <div class="error" id="alerta_pw" style="display:none">
              <ul></ul>
            </div>  
            
                <div align="right" style="margin: 20px; padding: 20px;" id="cambiopass">


<input type="submit" class="btn btn-info btn-md" value="Cambiar" id="rpw" />
</div>

                <input type="hidden" name="email" value="$usuarios->email">
                <input type="hidden" name="id" value="$usuarios->id">
          </form>
      </div>


                </div><!-- /.box-body -->
              </div>


@stop





<!-- Finaliza el render de la pagina -->

@stop
