<form class="form-horizontal" id="datos-empresa"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre_empresa">Nombre de la Empresa</label>
    <input type="text" class="form-control" name="nombre" id="nombre_empresa" placeholder="Nombre" value="{{$empresa->nombre}}">
  </div>

<div class="row">
	<div class="col-md-6">
	  <div class="form-group">
	    <label for="email">Email de la empresa</label>
	    <input type="text" class="form-control" id="apellido" name="apellido" value="{{$empresa->email}}">
	  </div>		
	</div>

	<div class="col-md-6">
	  <div class="form-group">
	    <label for="web">Sitio Web de la empresa</label>
	    <input type="url" class="form-control" id="web" name="web" placeholder="URL" value="{{$empresa->web}}">
	  </div>			
	</div>
</div>


<div class="row">
	<div class="col-md-6">
	  <div class="form-group">
	     <label for="telefono">Teléfono</label>
		<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{$empresa->telefono}}">
      </div>		
	</div>

	<div class="col-md-6">
	  <div class="form-group">
	    <label for="dir">Dirección</label>
	    <input type="text" class="form-control" id="dir" name="direccion" placeholder="Dirección de operación" value="{{$empresa->direccion}}">
	  </div>			
	</div>
</div>


<div class="row">
	<div class="col-md-6">
	  <div class="form-group">
	     <label for="pais">Ubicación del Negocio</label>
	      <select name="pais" id="pais" class="form-control">
	      <option value="">Seleccione...</option>
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
	    <label for="ciudad">Ciudad</label>
	    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad" value="{{$empresa->ciudad}}">
	  </div>			
	</div>
	<div class="col-md-6">
	  <div class="form-group">
	    <label for="personacontacto">Persona Contacto</label>
	    <input type="text" class="form-control" name="personacontacto" id="personacontacto" placeholder="Persona Contacto" value="{{$empresa->personacontacto}}">
	  </div>			
	</div>
	<div class="col-md-6">
	  <div class="form-group">
	    <label for="postal">Zip/Código Postal</label>
	    <input type="text" class="form-control" name="postal" id="postal" placeholder="Código Postal" value="{{$empresa->postal}}">
	  </div>			
	</div>

</div>

<div class="row">
	<div class="col-md-12">
	  <div class="form-group">
	    <label for="descripcion">Descripción de la empresa</label>
	    <textarea name="descripcion" class="form-control" id="descripcion" rows="5" placeholder="Descripción">{{$empresa->descripcion}}</textarea>
	  </div>
	</div>
</div>


<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail">
  @if($empresa->imagen)
  <?php
  	$path = public_path().'/uploads/'.$empresa->imagen.'';
	$imagen = JitImage::source($path)->resize(200, 0);
	$texto = 'Cambiar imagen';
  ?>
    <!--<img src="{{asset(''.$imagen.' ')}}">-->
    <img id="imagen" height="80" width="80" alt="Image" src="/uploads/{{$empresa->imagen}}"/>
  @else
  	<img src="{{asset('images/perfil/foto_up.jpg')}}">
  	<?php
  	$texto = 'Seleccione una imagen';
  	?>
  @endif 
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-primary btn-file">
    <span class="fileinput-new">{{$texto}}</span>
    <span class="fileinput-exists">Change</span>
    <input type="file" id="file_image" name="imagen" accept="image/gif, image/jpeg, image/png"></span>
    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div><hr>

<h3>Intereses como transportador</h3>

<button class="btn btn-success pull-left" data-toggle="modal" data-target="#addInteres">

 	<i class="fa fa-cube"></i> Agregar Interés

 </button>

 <br><br>



<!-- Mensaje de exito -->

<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_import" style="display:none">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

  <strong><i class="fa fa-check"></i></strong> El interés se guardado correctamente

</div>



 <h4>Intereses Agregados ({{count($intersesTransportador)}})</h4>

<!-- tabla con los Intereses registrados -->	

<table class="table table-bordered table-striped table-hover" id="tabla_productos">

	<thead>

		<th>No</th>

		<th>Categoría</th>

		<th>Ver Detalles</th>

	</thead>

	<tbody>

	@foreach($intersesTransportador as $interes)

		<tr>

			<td>1</td>

			<td>{{Categorias::find($interes->categoria_id)->nombre}}</td>			

			

			<td>

				<a data-toggle="modal" class="link" href="transportador/interes/{{$interes->id}}" data-target="#myModalE">

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



<!-- Modal agregar productos de interes transportador -->

<div class="modal fade" id="addInteres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Agregar Interés (Transportador)</h4>

      </div>

      <div class="modal-body">

        @include('perfil/completar/transportador/intereses.add')

      </div>

    </div>

  </div>

</div>

	<!-- Loader -->
	<div align="center">
		<img src="{{asset('images/load.gif')}}" id="load_basico" style="display:none">	
	</div>

    <!-- Mensaje de errores -->
    <div class="alert alert-danger danger" id="alerta_basico" style="display:none">
      <ul></ul>
    </div> 

 	<!-- Mensaje de exito -->
    <div class="alert alert-success alert-dismissible fade in" role="alert" id="alerta_ok" style="display:none">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong><i class="fa fa-check"></i></strong> Los datos se guardaron correctamente
    </div>

<div align="right">
	<input type="submit" id="btn_basico" class="btn-borde btn-borde-n-i" value="GUARDAR">
</div>
</form>



@section('scripts')

@parent

  {{HTML::script('js/transportador.js')}}

@stop