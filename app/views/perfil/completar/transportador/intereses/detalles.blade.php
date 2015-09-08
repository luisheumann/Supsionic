
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

label.col-md-6.control-label {
    /* font-size: 19px; */
    margin-bottom: 15px;
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
            {{$interes2->productos}}
          </li>

           <li class="list-group-item"><strong>Cantidad Minima: </strong> 
            @if ($interes2->min == 0)
      Ilimitado
      @else
  {{$interes2->min}} {{$medidamax2->nombre}}
      @endif


         

          </li>

            <li class="list-group-item"><strong>Cantidad Maxima: </strong> 
            
  @if ($interes2->max == 0)
      Ilimitado
      @else
    {{$interes2->max}} {{$medidamin2->nombre}}
      @endif


        
          </li>
				
				  <li class="list-group-item"><strong>Partida arancelaria: </strong> 
				  	{{$interes2->partida}} 
				  </li>
				 


 

<!--
<li class="list-group-item">
				  	  <div class="row">

        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipos de Transporte</strong></label>
        <br>
        <div class="col-md-12">
          <input type="checkbox"   name="SAE" "@if($interes2->SAE==1) checked @else @endif"  onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SAE">Aéreo</label>
            <br>
          <input type="checkbox"   name="STE"  "@if($interes2->STE==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="STE">Terrestre</label>
            <br>
          <input type="checkbox"  name="SMA"  "@if($interes2->SMA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMA">Marítimo</label> 
            <br>   
         <input type="checkbox"  name="SFL" "@if($interes2->SFL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SFL"> Fluvial</label>   
           <br>
          <input type="checkbox"  name="SMU"  "@if($interes2->SMU==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMU"> Multimodal</label> 
           
        </div>
      </div><hr>
</div>
</li>
<li class="list-group-item">

 <div class="row">
        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Servicios Adicionales</strong></label>
        <br>
        <div class="col-md-12">
     
          <input type="checkbox"   name="SOL"  "@if($interes2->SOL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SOL">Operadores Logísticos</label>
            <br>
          <input type="checkbox"   name="SA"  "@if($interes2->SA==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="SA">Almacenamiento</label>
            <br>
          <input type="checkbox"  name="SSIA"  "@if($interes2->SSIA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSIA">Servicios de Intermediación Aduanera</label> 
            <br>   
         <input type="checkbox"  name="SACCE"  "@if($interes2->SACCE==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SACCE"> Asesoría y consulta Comercio Exterior</label>   
           <br>

        </div>
      </div>
      </div>

    </li>
      
<li class="list-group-item">
       <div class="row">

            <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Especialidades</strong></label>
        <br>
        <div class="col-md-12">
          <input type="checkbox"  name="SAMP"  "@if($interes2->SAMP==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SAMP">Aislamiento de mercancías peligrosas</label>
            <br>
          <input type="checkbox"   name="STAC"  "@if($interes2->STAC==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="STAC">Transporte Aéreo de cargo</label>
            <br>
          <input type="checkbox"  name="STTC"  "@if($interes2->STTC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STTC">Transporte Terreste de Carga</label>    <br>
            
         <input type="checkbox"  name="STMC"  "@if($interes2->STMC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STMC"> Transporte Marítimo Consolidado</label>   <br>  
         <input type="checkbox"  name="STAI"  "@if($interes2->STAI==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STAI"> Servicio de Transporte Aéreo Internacional</label>   <br>  
         <input type="checkbox"  name="SSTAN"  "@if($interes2->SSTAN==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSTAN"> Servicio de Transporte Aéreo Nacional</label>    <br> 


        </div>
      </div>

			</div>
</li>

				</ul>-->

		    </div>

		    <div role="tabpanel" class="tab-pane" id="rutas">
		    	<div class="origen_detalle"><h4>
		    		<strong>Origen: </strong>
		    		{{Paises::find($rutas2->first()->pais_destino)->nombre}}
		    	</h4></div>

		    	  <hr>
		    	  
		    	<div class="destino_detalle"><h4><strong>Paises de Destino</strong></h4></div>
		  
<div class="ruta_destino">
		    	<ul>
			    	@foreach($rutas2 as $ruta)
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