
<!-- FORMULARIOS -->
<div class="formularios-registro">

<h1>Configuración del Perfil</h1>
<div class="tab-form">
	<ul class="nav nav-tabs nav-tabs-form nav-justified" role="tablist" id="myTab">
	  <li class="active">
	  	<a href="#datos-basicos" aria-controls="datos-basicos" role="tab" data-toggle="tab">
	  	DATOS BÁSICOS</a>
	  </li>
	  <li>
	  	<a href="#datos-empresa" aria-controls="datos-empresa" role="tab" data-toggle="tab">
	  	DATOS EMPRESA</a>
	  </li>
	  <li><a href="#detalles-comercio" aria-controls="detalles-comercio" role="tab" data-toggle="tab">
	  	DETALLES DE COMERCIO</a></li>
	</ul>
</div>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="datos-basicos">
	    <!-- Incluimos el formulario de datos basicos -->
		@include('perfil/completar/datos_basicos')
	</div>

	<div role="tabpanel" class="tab-pane" id="datos-empresa">
	    <!-- Cargamos la vista de acuerdo al perfil de la empresa -->
		 <?php
			 switch ($perfil->id) {
			 	case 1:
				 	?> 
					 	@include('perfil/completar/datos_empresa')
				 	<?php
			 		break;
			 	case 2:
				 	?> 
					 	@include('perfil/completar/importador/index')
				 	<?php
			 		break;
			 	case 3:
				 	?> 
				 		@include('perfil/completar/transportador/index')
				 	<?php
			 		break;		 		
			 	default:
			 	case 4:
				 	?>
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
	<!-- Cargamos la vista de detalles de comercio deacuerdo al perfil de la empresa -->
		 <?php
			 switch ($perfil->id) {
			 	case 1:
				 	?>
					 	@include('perfil/completar/exportador/detalles-comercio/index')
				 	<?php
			 		break;
			 	case 2:
				 	?> 				 	    
					 	@include('perfil/completar/importador/detalles-comercio/index')
				 	<?php
			 		break;
			 	case 3:
				 	?> 
				 		@include('perfil/completar/transportador/detalles-comercio/index')
				 	<?php
			 		break;		 		
			 	default:
			 	case 4:
				 	?>
					 	@include('perfil/completar/sias/detalles-comercio/index')
				 	<?php
			 		break;		 		
			 	default:		 	
			 		# code...
			 		break;
			 }
		 ?>
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
