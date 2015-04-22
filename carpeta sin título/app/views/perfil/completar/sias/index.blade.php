
<!-- Mensaje de exito -->
<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_import" style="display:none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <strong><i class="fa fa-check"></i></strong> El producto se guardaro correctamente
</div>


<h1>Formulario SIAS</h1>

<form class="form-horizontal" id="form_sias">
  <div class="row">
  	<div class="col-md-12">
  	  <div class="form-group">
      	<label for="categoria_producto">Categorías de Interés</label><br>
      	<select name="categoria[]" multiple="multiple" id="categoria_producto" class="form-control">
  	    	@foreach($categorias as $categoria)
  	    		<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
  	    	@endforeach
      	</select>
       </div>
     </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="selec_paises">Paises de operación</label><br>
           <select id="selec_paises" name="operacion[]" multiple="multiple">
            @foreach($paises as $pais)
            <?php
            	$pais_ok = DB::table('sias_paises_operacion')->wherePais_id($pais->id)->get();
            ?>
	            @if($pais_ok)
	         	 	<option selected value="{{$pais->id}}">{{$pais->nombre}}</option>
	         	@else
	          		<option value="{{$pais->id}}">{{$pais->nombre}}</option>
	             @endif
            @endforeach 
          </select>
       </div>
      </div>
   </div>
  <hr>

  <!-- Loader -->
  <div align="center">
    <img src="{{asset('images/load.gif')}}" id="load_sias" style="display:none">  
  </div>

  <!-- Mensaje de errores -->
  <div class="alert alert-danger danger" id="alerta_sias" style="display:none">
    <ul></ul>
  </div> 

  <div align="center">
    <button class="btn btn-success" id="btn_sias"><i class="fa fa-check"></i> GUARDAR</button>
  </div>

  </form>
<!-- Initialize the plugin: -->



 
@section('scripts')
@parent
  {{HTML::script('js/sias.js')}}
@stop