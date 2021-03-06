<div class="lista-noticias-vertical"> 

	<p class="noti">
		<i class="fa fa-newspaper-o"></i> NOTICIAS
	</p>
	
	<div class="indicadores_img">
		<img src="{{asset('images/noticias/indicadores.png')}}">
	</div>


	<div class="noticias-vertical">
		<div class="noticias-titulo">
			<p class="fecha_noti">10 de Abril</p>
			<h1>Japón a la cabeza del café colombiano.</h1>
		</div>
		<p>Japón es el segundo destino de exportación del café colombiano después de Estados Unidos, con 1,1 millones de sacos de 60 kilos al cierre de 2014.</p>
		<div class="clearfix"></div>
	</div>

	<div class="noticias-vertical">
		<div class="noticias-titulo">
			<p class="fecha_noti">4 de Abril</p>
			<h1>Restricción para transportadores.</h1>
		</div>
		<p>Mintransporte informó que del 5 de diciembre hasta el 12 de enero se limitará en tránsito a nivel nacional de los vehículos de carga con capacidad igual o superior a 3.4 toneladas. Se suspenderán las obras en la red vial durante este tiempo.</p>
		<div class="clearfix"></div>
	</div>

	<div class="noticias-vertical">
		<div class="noticias-titulo">
			<p class="fecha_noti">31 de Marzo</p>
			<h1>Conflictos en puertos americanos generan problemas de transporte.</h1>
		</div>
		<p>Un conflicto laboral en los puertos de la costa oeste de Estados Unidos está interrumpiendo la cadena de abastecimiento en las rutas del Pacífico, obligando a algunos proveedores asiáticos a usar el más costoso transporte aéreo y encareciendo el costo del flete mientras crece la fila de cargueros que espera atracar.</p>
		<div class="clearfix"></div>
	</div>

</div>

@section('estilos')
@parent
{{HTML::style('css/publicaciones.css')}}
@stop

