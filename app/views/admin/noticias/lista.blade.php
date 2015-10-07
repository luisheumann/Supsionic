
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Noticias::Get();



    $perfil2  = Empresa::find($empresa->id)->perfil->first();

        $PerfilEmpresa  = PerfilEmpresa::find($perfil2->pivot->id);


  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>


@extends('layouts/backend')



@section('content-header')

<style type="text/css">
  button.btn.btn-success.pull-right a {
    color: #FFF !important;
  
}

.anchocelda{
  width: 100px;
}


</style>
 <h1>
            Noticias
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Lista</li>
          </ol>
@stop



@section('content')


<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa  fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Noticias </span>
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

    @if($PerfilEmpresa->perfil_id == 1)


<button class="btn btn-success pull-right" >

  <i class="fa fa-cube"></i><a href="/admin/noticias/editar"> Agregar Noticia</a>

 </button>
<div class="row">

<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Noticias Agregadas</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>  
                    <th class="anchocelda"></th>
                      <th>Titulo</th>
                     
                    
                     
                    </tr>
                    @foreach($productos as $producto)
                   <tr >  <td><div class="imagen-edit-blog">  <img src="/images/noticias/thumblista-{{$producto->imagen}}"/></div>
                      </td>
                      <td>{{$producto->titulo}}</td>
                    
                      <td>{{$producto->color}}</td>
                      <td>{{$producto->produccion_mes}}</td>
               
                      <td><a href="{{URL::to('admin/noticias/'.$producto->id.'/delete')}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> <a href="{{URL::to('admin/noticias/editar/'.$producto->id)}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a href="{{URL::to($empresa->slug.'/noticias/'.$producto->id)}}" class="btn btn-default btn-xs"><span class="glyphicon  glyphicon-eye-open"></span></a></td>


                        
                    </tr>
                   @endforeach
                    
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>

            @else
PAGINA PRINCIPAL INTERESES

            @endif
@stop





<!-- Finaliza el render de la pagina -->

@stop
