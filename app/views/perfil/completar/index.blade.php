@extends('layouts/default')
@section('content')

@section('title')
@parent
 ¡ Completar Registro !
@stop
@include('includes.header')

<div class="contenedor-perfil">
	<div class="row home-perfil">
	  <div class="col-md-4 barra-lateral"> 
	    @include('perfil/completar/cambio_estado')
	    
	    <img src="{{asset('images/perfil/proceso.jpg')}}">
	    <img src="{{asset('images/perfil/indicadores.jpg')}}">
	    
	  </div>  
	  <div class="col-md-7 form-registro">
	    @include('perfil/completar/tabs')
	  </div>  
	</div>	
</div>

@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/perfil-formulario.css')}}
@stop

@stop