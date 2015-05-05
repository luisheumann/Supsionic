
<button class="btn btn-success pull-right" data-toggle="modal" data-target="#addProducto">

 	<i class="fa fa-cube"></i> Agregar Producto

 </button>

 <br><br>



<!-- Mensaje de exito -->

<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_export" style="display:none">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

  <strong><i class="fa fa-check"></i></strong> El producto se guardado correctamente

</div>



 <h4>Productos Agregados ({{count($productos)}})</h4>

<!-- tabla con los productos registrados -->	

<table class="table table-bordered table-striped table-hover" id="tabla_productos">

	<thead>

		<th>No</th>

		<th>Imagen</th>

		<th>Codigo</th>

		<th>Nombre</th>

		<th>Ver Detalles</th>

	</thead>

	<tbody>

	@foreach($productos as $producto)

	<?php

		$imagen = Recursos::imagenProducto($producto->id);

	?>

		<tr>

			<td>1</td>

			<td>

				<img src="{{asset('uploads/productos/thumbnail/'.$imagen)}}" alt="">

			</td>

			<td>{{$producto->codigo}}</td>

			<td>{{$producto->nombre}}</td>

			<td>

				<a data-toggle="modal" class="link" href="producto/{{$producto->id}}" data-target="#myModalE">

				<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a><br>

				<!--a class="link" href="productos/{{$producto->slug}}/{{$producto->id}}" target="_blank">

				Ver en nueva ventana</a-->				

			</td>

		</tr>

	@endforeach

	</tbody>

</table>
<div align="right">
<!--<a href="#detalles-comercio" aria-controls="detalles-comercio" role="tab" data-toggle="tab">
	  	DETALLES DE COMERCIO</a>-->


<a href="#detalles-comercio">
	<input type="submit"  id="btn_basico" class="btn-borde btn-borde-n-i" value="SIGUIENTE">
	</a>

</div>


 

<!-- Modal -->

<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        </div> 

    </div>

</div> 



<!-- Modal -->

<div class="modal fade" id="addProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>

      </div>

      <div class="modal-body">

        @include('perfil/completar/exportador/productos.add')

      </div>

    </div>

  </div>

</div>


</script>




@section('scripts')

@parent

  {{HTML::script('js/productos.js')}}

@stop