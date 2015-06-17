@extends('layouts/default')
@section('content')

@section('title')
@parent
 {{ ucfirst($empresa->nombre) }}
@stop

@if (Sentry::check())
	@include('includes.header')
@else
	@include('includes.header_public')
@endif
<div class="row home-red">
  <div class="col-xs-7 home-perfil"> 
    @include('perfil/perfil_home')
  </div>  
    <div class="col-xs-5">  
  <div class="row">
    <div class="col-xs-6">
      @include('noticias/index')
    </div>    
    <div class="col-xs-6">
      @include('pautas/index')
    </div> 
  </div>
  </div>
 
</div>

@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
@stop

@stop