<form class="form-horizontal" id="form_transportador">

  <div class="row">

  	<div class="col-md-12">

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

  </div>

  <hr>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="selec_paises">Paises de Origen</label><br>
           <select id="paisesOrigenSlct" required name="origenes[]" multiple="multiple">
            @foreach($paises as $pais)
              <option value="{{$pais->id}}">{{$pais->nombre}}</option>
            @endforeach 
          </select>
       </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="paisesDestinoSlct">Paises de Destino</label><br>
           <select id="paisesDestinoSlct" required name="destinos[]" multiple="multiple">
            @foreach($paises as $pais)
              <option value="{{$pais->id}}">{{$pais->nombre}}</option>
            @endforeach 
          </select>
       </div>
    </div>
   </div>

  <hr>



  <!-- Loader -->

  <div align="center">

    <img src="{{asset('images/load.gif')}}" id="load_transporte" style="display:none">  

  </div>



  <!-- Mensaje de errores -->

  <div class="alert alert-danger danger" id="alerta_transporte" style="display:none">

    <ul></ul>

  </div> 



  <div align="center">

    <button class="btn btn-success" id="btn_transporte"><i class="fa fa-check"></i> GUARDAR</button>

  </div>



  </form>

<!-- Initialize the plugin: -->

