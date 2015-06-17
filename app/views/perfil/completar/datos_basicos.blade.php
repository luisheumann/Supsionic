<form class="form-horizontal" id="datos-basicos"  enctype="multipart/form-data">

<div class="row">
	<div class="col-md-6">
	  <div class="form-group">
	    <label for="nombre">Datos Usuario</label>
	    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuario->first_name}}">
	  </div>		
	</div>

	<div class="col-md-6">
	  <div class="form-group">
	    <label for="apellido">Apellido</label>
	    <input type="text" class="form-control" id="apellido" name="apellido" value="{{$usuario->last_name}}">
	  </div>			
	</div>
</div>


<div class="row">
	<div class="col-md-6">
	  <div class="form-group">
	     <label for="correo">Correo</label>
		<input type="email" class="form-control" id="correo" name="correo" value="{{$usuario->email}}">
      </div>		
	</div>





<div class="col-md-6">
	  <div class="form-group">
	    <label for="dir">Cargo</label>
	    <input type="cargo" class="form-control" id="cargo" name="cargo" value="{{$usuario->cargo}}">
	  </div>			
	</div>


<div class="col-md-6">
	  <div class="form-group">
	    <label for="dir">Contraseña</label>
	    <input type="password" class="form-control" id="password" name="password" value="{{$usuario->password}}">
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
	<input type="submit" id="btn_basico" class="btn-borde btn-borde-n-i" value="Guardar">
</div>
</form>