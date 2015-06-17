@extends('layouts/default')
@section('content')

@section('title')
@parent
 ¡ Completar Registro !
@stop
@include('includes.header')

<div class="contenedor-perfil">



	<div class="row home-perfil-form">
	<div class="separacion-form">1. Registro</div>
	<div class="separacion-punto"></div>

	<form class="form-horizontal" id="form_exportador" action="/public/producto_exportador" method="post" enctype="multipart/form-data">
  


  <label class="radio-inline">
      <input type="radio" name="1">Exportador
    </label>
    <label class="radio-inline">
      <input type="radio" name="2">Importador
    </label>
    <label class="radio-inline">
      <input type="radio" name="3">Transportador
    </label>
      <label class="radio-inline">
      <input type="radio" name="4">SIA
    </label>





	  <div class="form-group">
  <label for="nombre">¿Cuál es su nombre y apellido?</label>
	
<div class="col-md-6-form-register">
		<input id="nombre" class="borde-formulario-registro form-control input-lg" name="usuario" type="text" placeholder="Nombre" required/>
   </div>
   <div class="col-md-6-form-register">
    <input id="apellido" class="borde-formulario-registro form-control input-lg" name="usuario" type="text" placeholder="Apellido" <required/>
</div>
	  </div>


    <div class="form-group">

      <label for="empresa">¿Cuál es el nombre de la empresa?</label>
<div class="col-md-6-form-register400">
      <input type="text" class="borde-formulario-registro form-control input-lg" name="nombre" id="empresa" placeholder="Empresa" required>
</div>
    </div>  


    <div class="form-group">

      <label for="empresa">Telefono</label>
<div class="col-md-6-form-register100">
      <input type="text" class="borde-formulario-registro form-control input-lg" name="codigo" id="codigo" placeholder="Codigo" required>
</div>
<div class="col-md-6-form-register100">
      <input type="text" class="borde-formulario-registro form-control input-lg" name="ext" id="empresa" placeholder="Ext" required>
</div>

<div class="col-md-6-form-register">
      <input type="text" class="borde-formulario-registro form-control input-lg" name="phone" id="phone" placeholder="Phone" required>
</div>
    </div>  



	  <div class="form-group">

		<label for="email">¿Cuál es su E-mail?</label>
<div class="col-md-6-form-register400">
		<input id="email" class="borde-formulario-registro form-control input-lg" name="email" type="email" placeholder="E-mail" required/>
</div>
	  </div>	



	  <div class="form-group">

		<label for="password">Escriba una contraseña</label>
<div class="col-md-6-form-register400">
		<input id="password" class="borde-formulario-registro form-control input-lg"  name="password" type="password" placeholder="Contraseña" required/>
</div>
	  </div>



	  <div class="form-group">

		<label for="password_confirme">Repita la contraseña</label>
<div class="col-md-6-form-register400">
		<input id="password_confirme" class="borde-formulario-registro form-control input-lg"  name="password_confirmation" type="password" placeholder="Repita la contraseña" required/>
</div>
	  </div>

	 <!-- errores de logueo -->

	  <div id="alerta_registro" style="display:none">

	    <h3>Se presentaron los siguientes errores:</h3>

	    <ul class="error_envio"></ul>

	  </div>			

	  <div align="center">	

	  <p>

	  	<img src="{{asset('images/load.gif')}}" id="load_registro" style="display:none">

	  </p>
<div class="col-md-6-form-register400">
	 	<button class="btn-borde btn-borde-a" type="submit" id="btn_registro">ENVIAR</button>
</div>
	  </div>




  <div class="row">

	  <div class="form-group">
	  <br><br>
	  <div class="separacion-form">2. Detalle Producto</div>
	<div class="separacion-punto"></div><br>	<br><br>
    	<label for="categoria_producto">Categoría</label>
      <div class="col-md-6-form-register400">
    	<select name="categoria_producto" id="categoria_producto" class="form-control" required>
	    	<option value="">Seleccione...</option>	
	    	@foreach($categorias as $categoria)
	    		<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
	    	@endforeach
    	</select>
      </div>
     </div>


	  <div class="form-group">
    	<label for="nombre_producto">Nombre del producto</label>
      <div class="col-md-6-form-register400">
    	<input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="Nombre del producto" required>
      </div>
     </div>
    
  </div>

<div class="row">

    <div class="form-group">
      <label for="codigo">Código del producto</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código del producto" required>
      </div>
     </div>
 


    <div class="form-group">
      <label for="unidad_medida">Unidad de medida del producto</label>
      <div class="col-md-6-form-register400">
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

    <div class="form-group">
      <label for="codigo">Marca</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" required>
      </div>
     </div>
    


    <div class="form-group">
      <label for="unidad_medida">Precio</label>
      <div class="col-md-6-form-register400">
       <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required>
     </div>
     </div>   
 
  </div>




  <div class="row">

	  <div class="form-group">
	    <label for="detalles_producto">Detalles del producto</label>
      <div class="col-md-6-form-register400">
	    <textarea name="detalles_producto" class="form-control" id="detalles_producto" rows="4" placeholder="Descripción" required></textarea>
      </div>
	  </div>
	
   </div>

   <div class="row">

      <div class="form-group">
      <div class="col-md-6-form-register400">
        <a class="btn btn-default btn-block" data-toggle="modal" data-target="#AddImgModal">
        <i class="fa fa-picture-o"></i> Agregar imagenes
        </a>
      </div>    
      </div>

	
		  <div class="form-group">
      <div class="col-md-6-form-register400">
		 	  <button class="btn btn-default btn-block" id="add_doc">
        <i class="fa fa-file-text"></i> Agregar documentos</button>
		  </div>		
	</div>
   </div>
   <hr>


	  <div class="form-group">
    	<label for="pais_origen">País de Origen</label>
      <div class="col-md-6-form-register400">
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


	
	  <div class="form-group">
    	<label for="selec_paises">Paises de destino</label><br>
      <div class="col-md-6-form-register400">
         <select id="selec_paises" required name="destinos[]" multiple="multiple">
          @foreach($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
          @endforeach 
        </select>
        </div>
     </div>

 
  <hr>

 

<!-- Capacidad de producción al mes -->


	  <div class="form-group">
    	<label for="cantidad_pm">Capacidad de producción al mes</label>
      <div class="col-md-6-form-register400">
    	<input type="number" class="form-control" name="capacidad_produccion" id="cantidad_pm" placeholder="Solo número (Ej: 900)">
      </div>
     </div>   

	  <div class="form-group">
    	<label for="unidad">Unidad</label>
      <div class="col-md-6-form-register400">
    	 <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
       </div>
    </div>
	



<!-- Cantidad minima de venta -->


	  <div class="form-group">
    	<label for="cantidad_min">Cantidad mínima de venta</label>
      <div class="col-md-6-form-register400">
    	<input type="number" id="cantidad_min" name="cantidad_minima" class="form-control" placeholder="Solo número (Ej: 100)">
      </div>
     </div>   


    <div class="form-group">
      <label for="unidad">Unidad</label>
      <div class="col-md-6-form-register400">
       <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
       </div>
    </div>



<!-- Cantidad disponible -->


	  <div class="form-group">
    	<label for="cantidad_disp">Cantidad disponible</label>
      <div class="col-md-6-form-register400">
    	<input type="number" class="form-control" name="cantidad_disponible" id="cantidad_disp" placeholder="Solo número (Ej: 500)">
      </div>
     </div>   

	
    <div class="form-group">
      <label for="unidad">Unidad</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control unidad" placeholder="Unidad" readonly>
      </div>
    </div>  
	




    <div class="form-group">
      <label for="codigo">Puerto</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="puerto" id="puerto" placeholder="Puerto" required>
      </div>
     </div>
    

<div class="form-group">

      <label for="condiciones_pago">Condiciones de Pago</label>
      <div class="col-md-6-form-register400">
      <select name="condiciones_pago" id="condiciones_pago" class="form-control" required>
        <option value="1">Seleccione...</option> 
         <option value="1">Condiciones de Pago</option> 
      </select>
      </div>

  </div>


 
    <div class="form-group">
      <label for="codigo">Material</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="material" id="material" placeholder="Material" required>
      </div>
     </div>
   


  <div class="form-group">
      <label for="unidad_medida">Peso</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso" required>
  </div>
  </div>

 



    <div class="form-group">
      <label for="codigo">Dimenciones</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="dimenciones" id="dimenciones" placeholder="Dimenciones" required>
      </div>
     </div>
    


    <div class="form-group">
      <label for="unidad_medida">Color</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="color" id="color" placeholder="Color" required>
      </div>
     </div>   
 




    <div class="form-group">
      <label for="codigo">Referencia</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Referencia" required>
      </div>
     </div>
  


    <div class="form-group">
      <label for="unidad_medida">Detalle del Producto</label>
      <div class="col-md-6-form-register400">
      <input type="text" class="form-control" name="detalle_producto" id="detalle_producto" placeholder="Detalle del Producto" required>
      </div>
     </div>   




  <div class="row">

    <div class="form-group">
      <label for="detalles_producto">Condiciones de transporte</label>
      <div class="col-md-6-form-register400">
      <textarea name="condiciones_transporte" class="form-control" id="condiciones_transporte" rows="4" placeholder="Condiciones del trasporte" required></textarea>
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
<div class="col-md-6-form-register400">
  <button class="btn btn-success" id="btn_export"><i class="fa fa-check"></i> GUARDAR</button>
  </div>
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
  
	</div>	
</div>
</div>
@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/perfil-formulario.css')}}
@stop

@stop


