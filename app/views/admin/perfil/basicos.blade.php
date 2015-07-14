<?php

  if (Sentry::check()){
    $user_id = Sentry::getuser()->id;
    $empresas = User::find($user_id)->empresas->first();
    $usuarios = User::find($user_id)->first();
    $productos = Empresa::find($empresas->id)->productos;
  }
  else{
    $avatar = Recursos::ImgAvatar($perfil);
      }

      
?>
@extends('layouts/backend')

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

@section('content-header')
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

<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa  fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Productos</span>
                  <span class="info-box-number"> <small>Cantidad: </small>{{$productos->count()}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xxx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xxx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-cog"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>


<div class="row">

<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Perfil</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                     <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>-->
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th>Accion</th>
                    </tr>
               
                    <tr>
                      <td>{{$usuarios->first_name}}</td>
                      <td>{{$usuarios->last_name}}</td>
                      <td>{{$usuarios->email}}</td>
                      <td>{{$usuarios->cargo}}</td>
                      <td><a href="{{URL::to('/articulo/edicion/'.$usuarios->id)}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
             </td>
                    </tr>
             
                    
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>
@stop





<!-- Finaliza el render de la pagina -->

@stop


