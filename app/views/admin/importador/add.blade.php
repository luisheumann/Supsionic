<?php


  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

    
     // $producto = Productos::find();
      


  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>





@extends('layouts/backend')



@section('content-header')
<style type="text/css">
	select#unidad_medida {
  float: left;
  width: 230px;
   margin-right: 10px;

}

input#medida {
  width: 80px;
  padding-left: 10px;
  margin-left: 10px;
}
.btn-lg, .btn-group-lg>.btn {
  padding: 10px 16px;
  font-size: 13px;
  line-height: 1.33;
  border-radius: 6px;
  width: 100%;
}

select#peso_unidad {
  width: 115px;
}

input#peso {
  width: 100px;
  margin-right: 10px;
  float: left;
}


select#peso_caja_unidad {
  width: 115px;
}

input#peso_caja {
  width: 100px;
  margin-right: 10px;
  float: left;
}

input#alto {
  width: 50px;
  float: left;
  margin-right: 10px;
}

input#ancho {
  width: 50px;
  float: left;
  margin-right: 10px;
}


input#profundo {
  width: 50px;
  float: left;
  margin-right: 10px;
}


select#dimencion_unidad {
  width: 114px;
}

label.label2 {
  float: left;
  padding-top: 10px;
  padding-right: 1px;
}

input#cantidad_disp {
  width: 100px;
  float: left;
  margin-right: 10px;
}



</style>
 <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Productos</li>
          </ol>
@stop



@section('content')
<form class="form-horizontal" id="form_importador">
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

  <div class="row">
  	<div class="col-md-12">
  	  <div class="form-group">
  	    <label for="productos">
          Escriba los productos que te interesan importar de la categoría:<br>
            <strong>
              <em><span id="view_cate"></span></em>
            </strong>
        </label>
  	    <textarea name="productos" class="form-control" id="productos" rows="4" placeholder="productos de interés" required></textarea>
  	  </div>
  	</div>	
   </div>
  <hr>

  <div class="row">
  	<div class="col-md-6">
  	  <div class="form-group">
      	<label for="pais_origen">País de Destino</label>
      	<select name="pais_destino" id="pais_destino" class="form-control">
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
      	<label for="selec_paises">Paises de Origen </label><br>
           <select id="selec_paises" required name="origenes[]" multiple="multiple">
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
    <img src="{{asset('images/load.gif')}}" id="load_import" style="display:none">  
  </div>

  <!-- Mensaje de errores -->
  <div class="alert alert-danger danger" id="alerta_import" style="display:none">
    <ul></ul>
  </div> 

  <div align="center">
    <button class="btn btn-success" id="btn_import"><i class="fa fa-check"></i> GUARDAR</button>
  </div>

  </form>

	
@stop





<!-- Finaliza el render de la pagina -->

@stop

@section('scripts')
@parent



<script type="text/javascript">




  function changeValueCheckbox(element){

 
  

   if(element.checked){
    element.value='1';
    
 
  }else{
    element.value='0';
    
  }
}





</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  {{HTML::script('js/productos.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}
@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
@stop

