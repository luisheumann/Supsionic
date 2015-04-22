@extends('layouts/default')
@section('content')

@section('title')
@parent
 {{$producto->nombre}}
@stop

@if (Sentry::check())
	@include('includes.header')
@else
	@include('includes.header_public')
@endif
<div class="row home-red">
  <div class="col-xs-9 home-perfil"> 
    <h1>Detalles del producto: {{$producto->nombre}} </h1>
    <p>{{var_dump($producto)}}</p>
    <p><hr></p>
    <p>{{var_dump($imagenes)}}</p>
  </div>  
  <div class="col-xs-3">
    @include('includes/menu-lateral')
  </div>  
</div>

@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
@stop

@stop