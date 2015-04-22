<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

     <h4 class="modal-title">Producto: {{$producto->nombre}}</h4>

</div>			<!-- /modal-header -->

<div class="modal-body">



<div class="row">

	<div class="col-md-5">

	    <img class="lib-img-show" src="http://lorempixel.com/240/240/abstract">

	</div>

	<div class="col-md-7">

		<div role="tabpanel">



		  <!-- Nav tabs -->

		  <ul class="nav nav-tabs" role="tablist">

		    <li role="presentation" class="active">

		    	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detalles</a>

		    </li>

		    <li role="presentation">

		    	<a href="#des" aria-controls="des" role="tab" data-toggle="tab">Descripción</a>

		    </li>     

		    <li role="presentation">

		    	<a href="#rutas" aria-controls="rutas" role="tab" data-toggle="tab">Rutas</a>

		    </li> 



		  </ul>



		  <!-- Tab panes -->

		  <div class="tab-content">

		    <div role="tabpanel" class="tab-pane active" id="home">



				<ul class="list-group">

				  <li class="list-group-item"><strong>Producto: </strong> {{$producto->nombre}}</li>

				  <li class="list-group-item"><strong>Código:   </strong> {{$producto->codigo}}</li>

				  <li class="list-group-item"><strong>Unidad:   </strong> {{$producto->unidad->nombre}}</li>

				  <li class="list-group-item">

				  	<strong>Capacidad de producción al mes: </strong> 

				  	<em>{{$producto->produccion_mes}} {{$producto->unidad->nombre}}</em>

				  </li>

				  <li class="list-group-item">

				  	<strong>Cantidad mínima de venta: </strong>

				  	<em>{{$producto->venta_minima}} {{$producto->unidad->nombre}}</em>

		   	      </li>

				  <li class="list-group-item">

				    <strong>Cantidad disponible: </strong>

				  	<em>{{$producto->stock}} {{$producto->unidad->nombre}}</em>

				  </li>

				</ul>



		    </div>

		    <div role="tabpanel" class="tab-pane" id="des">

		    	<p>{{$producto->descripcion}}</p>

		    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem tempora a maxime omnis quis totam dolor fugiat facere delectus libero atque porro sit et laborum vero sapiente ex.</p>

		    </div>

		    <div role="tabpanel" class="tab-pane" id="rutas">

		    	<h4>

		    		<strong>Origen: </strong>

		    		{{Paises::find($rutas->first()->pais_origen)->nombre}}

		    	</h4>

		    	<h4>Destinos</h4>

		    	<ul>

			    	@foreach($rutas as $ruta)

			    	<!-- $empresa = User::find($this->user_id)->empresas->first(); -->

						<li>{{Paises::find($ruta->pais_destino)->nombre}}</li>

			    	@endforeach

		    	</ul>

		    </div>



		  </div> <!-- / tab tabpanel-->

		</div> <!-- / tab content-->

	</div> <!-- / com-md-7 -->

</div> <!-- / row -->



</div><!-- /modal-body -->



<div class="modal-footer">

    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

</div>

