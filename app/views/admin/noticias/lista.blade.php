
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


    @if($PerfilEmpresa->perfil_id == 5)


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
               
                      <td><a data-toggle="modal" data-target="#myModal" href="#"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> <a href="{{URL::to('admin/noticias/editar/'.$producto->id)}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a href="{{URL::to($empresa->slug.'/noticias/'.$producto->id)}}" class="btn btn-default btn-xs"><span class="glyphicon  glyphicon-eye-open"></span></a></td>


               

                        
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pregunta Seguridad</h4>
      </div>
      <div class="modal-body">
        <p>Seguro que requiere eliminar el siguiente registro?</p>
        
      </div>
      <div class="modal-footer">

                   
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            

             <a href="{{URL::to('admin/noticias/'.$producto->id.'/delete')}}" >  <input type="submit"  class="btn btn-info btn-md" value="Aceptar"></a>

      </div>
    </div>

  </div>
</div>
                    </tr>
                   @endforeach
                    
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>

            @else
PAGINA PRINCIPAL

            @endif
@stop





<!-- Finaliza el render de la pagina -->

@stop
