
<div class="box-body">
 
<form class="form-horizontal" id="datos-basico"  enctype="multipart/form-data">


	<div class="col-md-6">
	  <div class="form-group">
	    <label for="nombre">Datos Usuario</label>
	    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$usuario->first_name}}">

	  </div>		
	</div>

	<div class="col-md-6">
	  <div class="form-group">
	    <label for="apellido">Apellido</label>
	    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$usuario->last_name}}">
	  </div>			
	</div>




	<div class="col-md-6">
	  <div class="form-group">
	     <label for="correo">Correo</label>
		<input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}">
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
<!--
<a href="<?php echo URL::to($empresa->slug.'/login/pass/')?>">
	  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal3">Cambiar Contraseña</button></a>
	  </div>			-->
</div>
 <a href="<?php echo URL::to($empresa->slug.'/login/pass/')?>">
    <button type="button" class="btn btn-success btn-md" >Cambiar Contraseña</button></a>

	</div>



  

	<!-- Loader -->
	<div align="center">
		<!--<img src="{{asset('images/load.gif')}}" id="load_basico" style="display:none">-->


	</div>

    <!-- Mensaje de errores -->
 <div class="alert alert-danger danger" id="alerta_basico" style="display:none">


   
 
	 <div id="alerta_basico" class="alert alert-danger danger" > <strong></strong> Los datos no guardaron correctamente
    </div>


      
    </div> 

 	<!-- Mensaje de exito -->
    <div class=" alert-dismissible fade in" role="alert" id="alerta_ok" style="display:none">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      
    </div>

<div align="right">


	<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Actualizar</button>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmar Password</h4>
      </div>
      <div class="modal-body">
        <p>Escriba el Password de su cuenta</p>
        <input type="password" class="form-control" id="pass2" name="pass2" value="">




      </div>
      <div class="modal-footer">

                   
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<input type="submit"  class="btn btn-info btn-md" value="Actualizar">

      </div>
    </div>

  </div>
</div>


 

</form>
            </div>


