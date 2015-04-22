
<form class="form-horizontal" id="form_exportador"  enctype="multipart/form-data">
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="categoria_producto">Categoría</label>
    	<select name="categoria_producto" id="categoria_producto" class="form-control" required>
	    	<option value="">Seleccione...</option>	
	    	@foreach($categorias as $categoria)
	    		<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
	    	@endforeach
    	</select>
     </div>
    </div>
	 <div class="col-md-6">
	  <div class="form-group">
    	<label for="nombre_producto">Nombre del producto</label>
    	<input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="Nombre del producto" required>
     </div>
   </div>    
  </div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="codigo">Código del producto</label>
      <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código del producto" required>
     </div>
  </div>    

  <div class="col-md-6">
    <div class="form-group">
      <label for="unidad_medida">Unidad de medida del producto</label>
      <select name="unidad_medida" id="unidad_medida" class="form-control" required>
        <option value="">Seleccione...</option> 
        @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
        @endforeach
      </select>
     </div>   
  </div>  
  </div>

  <div class="row">
	<div class="col-md-12">
	  <div class="form-group">
	    <label for="detalles_producto">Detalles del producto</label>
	    <textarea name="detalles_producto" class="form-control" id="detalles_producto" rows="4" placeholder="Descripción" required></textarea>
	  </div>
	</div>	
   </div>

   <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <a class="btn btn-default btn-block" data-toggle="modal" data-target="#AddImgModal">
        <i class="fa fa-picture-o"></i> Agregar imagenes
        </a>
      </div>    
    </div>
		<div class="col-md-6">
		  <div class="form-group">
		 	  <button class="btn btn-default btn-block" id="add_doc">
        <i class="fa fa-file-text"></i> Agregar documentos</button>
		  </div>		
	  </div>
   </div>
   <hr>

  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="pais_origen">País de Origen</label>
    	<select name="pais_origen" id="pais_origen" class="form-control">
	      <option value="" required>Seleccione...</option>
	      @foreach($paises as $pais)
	         @if($empresa->pais_id == $pais->id)
				<option selected value="{{$pais->id}}">{{$pais->nombre}}</option>
			 @else
			 	<option value="{{$pais->id}}">{{$pais->nombre}}</option>
	         @endif
	      @endforeach	
    	</select>
     </div>
    </div>

	<div class="col-md-6">
	  <div class="form-group">
    	<label for="selec_paises">Paises de destino</label><br>
         <select id="selec_paises" required name="destinos[]" multiple="multiple">
          @foreach($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
          @endforeach 
        </select>
     </div>
    </div>
   </div>
  <hr>

<!-- Capacidad de producción al mes -->
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="cantidad_pm">Capacidad de producción al mes</label>
    	<input type="number" class="form-control" name="capacidad_produccion" id="cantidad_pm" placeholder="Solo número (Ej: 900)">
     </div>   
	</div>
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="unidad">Unidad</label>
    	 <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
    </div>
	</div>	
  </div>
  <hr>

<!-- Cantidad minima de venta -->
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="cantidad_min">Cantidad mínima de venta</label>
    	<input type="number" id="cantidad_min" name="cantidad_minima" class="form-control" placeholder="Solo número (Ej: 100)">
     </div>   
	</div>
	<div class="col-md-6">
    <div class="form-group">
      <label for="unidad">Unidad</label>
       <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
    </div>
	</div>	
  </div>
<hr>

<!-- Cantidad disponible -->
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
    	<label for="cantidad_disp">Cantidad disponible</label>
    	<input type="number" class="form-control" name="cantidad_disponible" id="cantidad_disp" placeholder="Solo número (Ej: 500)">
     </div>   
	</div>
	<div class="col-md-6">
    <div class="form-group">
      <label for="unidad">Unidad</label>
      <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
    </div>  
	</div>	
  </div>
<hr>

  <!-- Loader -->
  <div align="center">
    <img src="{{asset('images/load.gif')}}" id="load_export" style="display:none">  
  </div>

  <!-- Mensaje de errores -->
  <div class="alert alert-danger danger" id="alerta_export" style="display:none">
    <ul></ul>
  </div> 

<div align="center">
  <button class="btn btn-success" id="btn_export"><i class="fa fa-check"></i> GUARDAR</button>
</div>


<!-- Modal Agregar imagenes -->
<div class="modal fade" id="AddImgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop-limit="1" >
  <div class="modal-dialog-addimg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_addimg" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Imagenes</h4>
      </div>
      <div class="modal-body">
        <div id="filediv">
          <input name="file[]" type="file" id="file"/>
        </div>
        <button type="button" id="add_more" class="btn btn-default">
          <i class="fa fa-picture-o"></i> Agregar otra imagen
        </button>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-success close_addimg">Listo</button>
      </div>      
    </div>
  </div>
</div>


<input type="hidden" name="perfil_empresa" value="{{$perfil->pivot->id}}">
</form>
<!-- Initialize the plugin: -->
