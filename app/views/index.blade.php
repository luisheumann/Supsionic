@extends('layouts/default')
@section('content')

@section('title')
@parent
 ¡ Bienvenido a SupplyME !
@stop




<div class="row home-red center-block" style="float:none">
  <div class="col-xs-6">
    <div class="row contenedor-home">
      @include('busqueda')
    </div>
  </div>
  <div class="col-xs-3">
      @include('noticias/index')
  </div>    
  <div class="col-xs-3">
      @include('pautas/index')
  </div>  

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-registro">
    <div class="modal-content-registro">
      <div class="modal-body" align="center">
        <h1>¡BIENVENIDO!</h1>
        <img src="{{asset('images/flecha.png')}}" >
        <h2>DESEA CONTINUAR COMPLETANDO SU PERFIL</h2>
        <a href="{{URL::to($slug.'/registro')}}" class="btn-borde btn-borde-n">CONTINUAR</a><br>
        <a href="#" class="btn-borde btn-borde-a" data-dismiss="modal">OMITIR</a>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		//$('#myModal').modal('show');
	});
</script>
@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/home_social.css')}}

@stop

<!-- Finaliza el render de la pagina -->
@stop