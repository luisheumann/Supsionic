
<?php 

	$data['datanoticias'] = Noticias::orderBy('updated_at', 'DESC')->paginate(15);
?>
@extends('layouts.adminmaster')
@section('administracion')
<aside class="right-side">                
	<section class="content-header">
	<!---->
		<h1>
			Noticias
			<small>Panel de control</small>
		</h1>
		<ol class="breadcrumb">
				<li><a href="{{URL::to('/admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li>Noticias</li>
			<li class="active">Lista</li>
		</ol>
	</section>
	<section class="content">
		<div class="">
				@include('includes.errores')
			<div style="padding: 4px">
				<a href="{{URL::to('/noticias/editar')}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span></a>
			</div>
			<table class="table table-bordered table-responsive">
				<tr class="panel panel-warning">
					<td width="70%">
					<b>Titulo</b>
					</td>
					<td width="15%">
						<b>Sumario</b>
					</td>
					<td>
						<b>Contenido</b>
					</td>
				</tr>
				@if($datanoticias->count())
					@foreach($datanoticias as $datanoticia)
					<tr class="active">
						<td>
							{{$datanoticia->titulo}}
						</td>
						<td>
							{{strtoupper($datanoticia->crearFecha($datanoticia->created_at)->format('d-F-Y'))}}
							
						</td>
						<td>
							<div class="col-md-12"></div>
							<a href="{{URL::to('/noticias/editar/'.$datanoticia->id)}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="@if($datanoticia->status==1) {{URL::to('/noticias/status/'.$datanoticia->id)}} @else {{URL::to('/noticias/status/'.$datanoticia->id)}} @endif" class="btn @if($datanoticia->status==1)btn-info @else btn-default @endif btn-xs"><span class="glyphicon @if($datanoticia->status==1) glyphicon-eye-open @else glyphicon-eye-close @endif"></span></a>
							<a href="{{URL::to('/noticias/eliminar/'.$datanoticia->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>	
						</td>
					</tr>
					@endforeach
				@else
				<tr>
					<td colspan="3">Aún no has agregado noticias <a href="{{URL::to('/noticias/edicion')}}">¡¡Agrega el primero!!</a></td>
				</tr>
				@endif
			</table>
			<div class="text-center">
				{{$datanoticias->links()}}
			</div>
		</div>
	</section>
</aside>
@stop
