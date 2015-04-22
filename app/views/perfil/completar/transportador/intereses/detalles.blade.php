<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title">Detalles</h4>
</div>			<!-- /modal-header -->
<div class="modal-body">

<div class="row">
	<div class="col-md-12">
		<div role="tabpanel">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active">
		    	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalles</a>
		    </li>
		    <li role="presentation">
		    	<a href="#rutas" aria-controls="rutas" role="tab" data-toggle="tab">Rutas</a>
		    </li> 

		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">

				<ul class="list-group">
				  <li class="list-group-item"><strong>Categoría:</strong> 
					{{Categorias::find($interes->categoria_id)->nombre}}
				  </li>
				</ul>

		    </div>
		    <div role="tabpanel" class="tab-pane" id="rutas">
		    	<h4>
		    		<strong>Origen: </strong>
		    		{{Paises::find($rutas->first()->pais_origen)->nombre}}
		    	</h4>
		    	<h4>Destinos</h4>
		    	<ul>
			    	@foreach($rutas as $ruta)
						<li>{{Paises::find($ruta->pais_destino)->nombre}}</li>
			    	@endforeach
		    	</ul>
		    </div>

		  </div> <!-- / tab tabpanel-->
		</div> <!-- / tab content-->
	</div> <!-- / com-md -->
</div> <!-- / row -->

</div><!-- /modal-body -->

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
