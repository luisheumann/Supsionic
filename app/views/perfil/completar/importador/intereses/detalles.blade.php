
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
		    	<a href="#rutas" aria-controls="rutas" role="tab" data-toggle="tab">Rutas</a>
		    </li> 

		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">

				<ul class="list-group">
				   <li class="list-group-item"><strong>Categorias: </strong> 
				  		
						<div>{{$categorianame->path}}<div>

			    	
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
				  <li class="list-group-item"><strong>Frecuencia de Compra: </strong> 
			

<?php


switch ($interes->frecuencia) {
    case "1":
        echo "Semanal";
        break;
    case "2":
        echo "Mensual";
        break;
    case "3":
        echo "Trimestral";
        break;
          case "4":
        echo "Semestral";
        break;
         case "5":
        echo "Anual";
        break;
    default:
        echo "Anual";
}
?>


 

				  </li>


				</ul>

		    </div>

		    <div role="tabpanel" class="tab-pane" id="rutas">
		    	<div class="origen_detalle"><h4>
		    		<strong>Origen: </strong>
		    		{{Paises::find($rutas->first()->pais_destino)->nombre}}
		    	</h4></div>

		    	  <hr>
		    	  
		    	<div class="destino_detalle"><h4><strong>Paises de Destino</strong></h4></div>
		  
<div class="ruta_destino">
		    	<ul>
			    	@foreach($rutas as $ruta)
						<li>{{Paises::find($ruta->pais_origen)->nombre}}</li>
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


    <button type="button" class="btn btn-success pull-right" data-dismiss="modal">Cerrar</button>
</div>
