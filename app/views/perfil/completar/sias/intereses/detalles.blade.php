
<style type="text/css">
	
	.origen_detalle {
  padding: 20px;
}


.destino_detalle {
  padding: 20px;
}

.ruta_destino {
  margin-left: 20px;
}


</style>
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
		    	<a href="#rutas" aria-controls="rutas" role="tab" data-toggle="tab">Pais de Operaciones</a>
		    </li> 

		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">

				<ul class="list-group">

			

			    	  <li class="list-group-item"><strong>Categorias: </strong> 
				  		@foreach($categorias_select as $categoria)
						<div>{{Categorias::find($categoria->categoria_id)->nombre}}<div>

			    	@endforeach
				  </li>
				  
				  <li class="list-group-item"><strong>Interes: </strong> 
				  	{{$interes->productos}}
				  </li>

				   <li class="list-group-item"><strong>Cantidad Minima: </strong> 
				  	@if ($interes->min == 0)
      Ilimitado
      @else
  {{$interes->min}} {{$medidamax->nombre}}
      @endif


				 

				  </li>

				    <li class="list-group-item"><strong>Cantidad Maxima: </strong> 
				  	
	@if ($interes->max == 0)
      Ilimitado
      @else
  	{{$interes->max}} {{$medidamin->nombre}}
      @endif


				
				  </li>
				
				  <li class="list-group-item"><strong>Partida arancelaria: </strong> 
				  	{{$interes->partida}} 
				  </li>
	


				</ul>

		    </div>

		    <div role="tabpanel" class="tab-pane" id="rutas">
				    	<div class="destino_detalle"><h4><strong>Paises</strong></h4></div>
		  
<div class="ruta_destino">
		    	<ul>
			    	@foreach($paises_operacion as $ruta)
						<li>{{Paises::find($ruta->pais_id)->nombre}}</li>
			    	@endforeach
		    	</ul>
		    	</div>
		    </div>

		  </div> <!-- / tab tabpanel-->
		</div> <!-- / tab content-->
	</div> <!-- / com-md -->
</div> <!-- / row -->

</div><!-- /modal-body -->

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
