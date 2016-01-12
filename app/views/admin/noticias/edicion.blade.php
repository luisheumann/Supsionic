
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

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


</style>

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






    @if ( ! $errors->isEmpty() )
    <div class="row">
        @foreach ( $errors->all() as $error )
        <div class="col-md-6 col-md-offset-2 alert alert-danger">{{ $error }}</div>
        @endforeach
    </div>
    @elseif ( Session::has( 'message' ) )
    <div class="row">
        <div class="col-md-6 col-md-offset-2 alert alert-success">{{ Session::get( 'message' ) }}</div>
    </div>
    @else
        <p>&nbsp;</p>
    @endif

    

		{{Form::open(array('url'=>'admin/noticias/editar','method'=>'POST','files' => true))}}
		{{Form::hidden('id', @$datanoticia->id)}}
		{{Form::hidden('status', 1)}}
		{{Form::hidden('categoria', 1)}}
		{{Form::hidden('order', 1)}}
		
	{{Form::hidden('usuario', Sentry::getUser()->id)}}
		<div class="well">
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{Form::label('titulo', 'Titulo')}}
					{{Form::text('titulo', @$datanoticia->titulo, array('class'=>'form-control', 'id' => 'titulo','placeholder' => 'Ingrese el Titulo','maxlength' => 140))}}

					 

				</div>
			</div>
		</div>
	
		<div class="well">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{Form::label('contenido', 'Contenido')}}
					{{Form::textarea('contenido', @$datanoticia->contenido, array('class'=>'form-control','class'=>'ckeditor','id'=>'editor4'))}}
				</div>
			</div>
		</div>
<div class="well">
			

		</div>
			<div class="well">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{Form::file('imagen')}}





@if ((@$datanoticia->imagen) != (null))

     <div class="imagen-edit-blog">  <img src="/images/noticias/thumb-{{$datanoticia->imagen}}"/></div>
@endif







</div>
				</div>
			</div>
		</div>


		<div class="well">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				 
					{{Form::submit('Enviar', array('class'=>'btn btn-lg btn-info'))}}
					{{Form::reset('Limpiar', array('class'=>'btn btn-lg btn-default'))}}

				</div>
			</div>
		</div>
 {{HTML::script('js/ckeditor/ckeditor.js')}}
		{{Form::close()}}


@stop

@stop