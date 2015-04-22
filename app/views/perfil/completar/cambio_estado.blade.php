<div class="estado_empresa">
<div class="row">

	<div class="col-xs-5">
		<img src="{{asset('images/iconos_b/'.$perfil->imagen)}}">
		<img src="{{asset('images/iconos_b/separa.png')}}">
	</div>

	<div class="col-xs-7">
	<h4>Estado: <strong>{{$perfil->rol}}</strong></h4>
	<form id="form_cambio_perfil">
	 <div class="form-group">
		@if($perfil->id == 1)
			<select name="cambio_perfil" id="cambio_perfil" class="form-control">
				<option value="">Cambiar estado</option>
				<option value="2">Importador</option>
			</select>
		@elseif($perfil->id == 2) 
			<select name="cambio_perfil" id="cambio_perfil" class="form-control">
				<option value="">Cambiar estado</option>
				<option value="1">Exportador</option>
			</select>
		@endif
	</div>
	<!-- Loader -->
	<div align="center">
	  <img src="{{asset('images/load.gif')}}" id="load_cp" style="display:none">  
	</div>
		<!-- Mensaje de errores -->
		<div class="alert alert-danger danger" id="alerta_cp" style="display:none">
		  <ul></ul>
		</div> 

		<!-- Mensaje de exito -->
		<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_cp" style="display:none">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  <strong><i class="fa fa-check"></i></strong> Su perfil se actualizao correctamente <br>
		  <i class="fa fa-refresh fa-spin"></i> <strong>Recargando...</strong>
		</div>

	<div class="form-group">
		<button id="btn_salvar_perfil" class="btn btn-success" style="display:none">
			Salvar
		</button>
	</div>

		<input type="hidden" name="perfil_id" value="{{$perfil->id}}">
		<input type="hidden" name="id" value="{{$perfil->pivot->id}}">
	</form>		
	</div>
</div>

</div>
<script>
  $('#cambio_perfil').on('change', function() {
  	$('#btn_salvar_perfil').slideDown();
  	 if(this.value ==''){
  	 	$('#btn_salvar_perfil').slideUp();
  	 }
  });	
</script>