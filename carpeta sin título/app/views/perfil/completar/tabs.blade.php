
<!-- FORMULARIOS -->
<div class="formularios-registro">

<h1>Configuración del Perfil</h1>
<div class="tab-form">
	<ul class="nav nav-tabs nav-tabs-form nav-justified" role="tablist" id="myTab">
	  <li class="active">
	  	<a href="#datos-basic" aria-controls="datos-basic" role="tab" data-toggle="tab">
	  	DATOS BÁSICOS DE LA EMPRESA</a>
	  </li>
	  <li>
	  	<a href="#info_comercial" aria-controls="info_comercial" role="tab" data-toggle="tab">
	  	INFORMACIÓN COMERCIAL</a>
	  </li>
	  <li><a href="#detalles-comercio" aria-controls="detalles-comercio" role="tab" data-toggle="tab">
	  	DETALLES DE COMERCIO</a></li>
	</ul>
</div>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="datos-basic">
	    <!-- Incluimos el formulario de datos basicos -->
		@include('perfil/completar/datos_basicos')
	</div>

	<div role="tabpanel" class="tab-pane" id="info_comercial">
	    <!-- Cargamos la vista de acuerdo al perfil de la empresa -->
		 <?php
			 switch ($perfil->id) {
			 	case 1:
				 	?> 
					 	<h1>Perfil: Exportador</h1>
					 	@include('perfil/completar/exportador/index')
				 	<?php
			 		break;
			 	case 2:
				 	?> 
				 	    <h1>Importador</h1>
					 	@include('perfil/completar/importador/index')
				 	<?php
			 		break;
			 	case 3:
				 	?>  <h1>Transportador</h1>
				 		@include('perfil/completar/transportador/index')
				 	<?php
			 		break;		 		
			 	default:
			 	case 4:
				 	?>
					 	 <h1>SIAS</h1>
					 	 @include('perfil/completar/sias/index')
				 	<?php
			 		break;		 		
			 	default:		 	
			 		# code...
			 		break;
			 }
		 ?>

	</div> <!-- /tab intro empresa -->

	<div role="tabpanel" class="tab-pane" id="detalles-comercio">
		<h1>Detalles del comercio</h1>
	</div>
</div>
	
</div> <!-- formularios-registro!-->


@section('scripts')
@parent
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  {{HTML::script('js/registro.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}
@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
@stop
