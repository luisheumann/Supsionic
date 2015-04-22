

<button class="btn btn-success pull-right" data-toggle="modal" data-target="#addInteres">

 	<i class="fa fa-cube"></i> Agregar Interés

 </button>

 <br><br>



<!-- Mensaje de exito -->

<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_import" style="display:none">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

  <strong><i class="fa fa-check"></i></strong> El producto se guardado correctamente

</div>



 <h4>Intereses Agregados ({{count($intersesImportador)}})</h4>

<!-- tabla con los Intereses registrados -->	

<table class="table table-bordered table-striped table-hover" id="tabla_productos">

	<thead>

		<th>No</th>

		<th>Categoría</th>

		<th>Productos</th>

		<th>Ver Detalles</th>

	</thead>

	<tbody>

	@foreach($intersesImportador as $interes)

		<tr>

			<td>1</td>

			<td>{{Categorias::find($interes->categoria_id)->nombre}}</td>			

			<td>{{$interes->productos}}</td>

			<td>

				<a data-toggle="modal" class="link" href="importador/interes/{{$interes->id}}" data-target="#myModalE">

				<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a><br>

			</td>

		</tr>

	@endforeach

	</tbody>

</table>



 

<!-- Modal ver detalles del interes -->

<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        </div> 

    </div>

</div> 



<!-- Modal agregar productos de interes importador -->

<div class="modal fade" id="addInteres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Agregar Interés</h4>

      </div>

      <div class="modal-body">

        @include('perfil/completar/importador/intereses.add')

      </div>

    </div>

  </div>

</div>



@section('scripts')

@parent

  {{HTML::script('js/importador.js')}}

@stop