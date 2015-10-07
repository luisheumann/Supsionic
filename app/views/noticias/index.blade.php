
<div class="lista-noticias-vertical"> 

	<p class="noti">
		<i class="fa fa-newspaper-o"></i> NOTICIAS
	</p>
	
	<div class="indicadores_img">
		<img src="{{asset('images/noticias/indicadores.png')}}">
	</div>



@if($datanoticias->count())
					@foreach($datanoticias as $datanoticia)
				

				<div class="noticias-vertical">
		<div class="noticias-titulo">
			<p class="fecha_noti">{{strtoupper($datanoticia->crearFecha($datanoticia->created_at)->format('d-F-Y'))}}</p>
			<div class="imagen-edit-blog">  <img src="/images/noticias/thumblista-{{$datanoticia->imagen}}"/></div><h1>{{$datanoticia->titulo}}</h1>

			@if(@$datanoticia->contenido) {{Str::words(@$datanoticia->contenido,35,$separator = '...')}} @endif
							<!-- <a href="{{URL::to('/blog/articulo/'.$datanoticia->url)}}">--><a><i class="fa fa-plus fa-lg"></i> Leer más... </a>
		</div>
		
		<div class="clearfix"></div>
	</div>		
					@endforeach
				@else
				<tr>
					<td colspan="3">Aún no has agregado noticias <a href="{{URL::to('/noticias/edicion')}}">¡¡Agrega el primero!!</a></td>
				</tr>
				@endif


	


	

</div>

@section('estilos')
@parent
{{HTML::style('css/publicaciones.css')}}
@stop

