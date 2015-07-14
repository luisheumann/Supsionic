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

<form class="form-horizontal" id="form_exportador"  enctype="multipart/form-data">
  <fieldset>



 

  <input type="hidden" class="form-control" name="id" id="id" value="0" placeholder="">
   

          <legend class="legenda"><strong>Información Básica</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label" for="selectbasic">Categoria</label>
            <div class="col-md-6">
              <select name="categoria_producto" id="categoria_producto"   class="form-control" required>
                <option value="">Seleccione Categoría...</option> 
                @foreach($categorias as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Nombre del producto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto"  placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label" for="detalles_producto">Descripción Producto</label>
            <div class="col-md-6">
              <textarea name="detalles_producto" class="form-control" id="detalles_producto"  rows="4" placeholder="Descripción" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label" for="detalles_producto">Imágen de Producto</label>
            <div class="col-md-6">
              <a class="btn btn-default btn-block" data-toggle="modal" data-target="#AddImgModal">
                <i class="fa fa-picture-o"></i> Agregar imagenes
              </a>
            </div>
          </div>    

           <legend class="legenda"><strong>Detalles del Producto</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Código</label>
            <div class="col-md-6">
              <input type="text" class="form-control input-md" name="codigo" id="codigo"  placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Referencia</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="referencia" id="referencia"   placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Marca</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="marca" id="marca" placeholder=""   required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Material</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="material" id="material" placeholder=""  required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Color</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="color" id="color" placeholder=""  required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Peso Producto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="peso" id="peso" placeholder="" >
                <select name="peso_unidad" id="peso_unidad" class="form-control">
                <option value="">Kl / Lb</option>
              <option value="1">Kilos</option>
              <option value="2">Libras</option>
              </select>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Peso con Caja</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="peso_caja" id="peso_caja" placeholder="" >
                <select name="peso_caja_unidad" id="peso_caja_unidad" class="form-control">
                <option value="">Kl / Lb</option>
              <option value="1">Kilos</option>
              <option value="2">Libras</option>
              </select>

            </div>
          </div>



          <div class="form-group">
            <label class="col-md-6 control-label"  for="dimenciones_producto">Dimensiones del producto</label>
            <div class="col-md-6">

              <label class="label2"  for="nombre_producto">Alto</label>
              <input type="text" class="form-control" name="alto" id="alto" placeholder="" >
              <label class="label2"  for="nombre_producto">Ancho</label>
                <input type="text" class="form-control" name="ancho" id="ancho" placeholder="" >
                       <label class="label2"  for="nombre_producto">Profundo</label>
                  <input type="text" class="form-control" name="profundo" id="profundo" placeholder="" >
                <select name="dimencion_unidad" id="dimencion_unidad" class="form-control">
                <option value="">Cm / In</option>
              <option value="1">Centimetros</option>
              <option value="2">Pulgadas</option>
              </select>
            </div>
          </div>




          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Partida Arancelaria</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="partida" id="partida"  placeholder="" required>
            </div>
          </div>
<!--
          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Unidad de Medida</label>
            <div class="col-md-6">
              <select name="unidad_medida" id="unidad_medida" class="form-control" >
                <option value="">Seleccione Unidad de Medida...</option> 
              @foreach($unidades as $unidade)
                <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
              @endforeach
              </select>
              <input type="number" class="form-control" name="medida" id="medida"   placeholder="" >
            </div>
          </div>
-->
          <div class="form-group">
            <label class="col-md-6 control-label" for="pais_origen">País de Origen</label>
            <div class="col-md-6">
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
    	<label for="selec_paises" class="col-md-6 control-label" >Paises de destino</label><br>
        <div class="col-md-6"> <select id="selec_paises" required name="destinos[]"  multiple="multiple">
          @foreach($paises as $pais)
            <option value="{{$pais->id}}">{{$pais->nombre}}</option>
          @endforeach 
        </select>
        </div>
     </div>

   



 
          <legend class="legenda"><strong>Información Comercial</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Precio</label>
            <div class="col-md-6">
            <div class="form-inline">
              <select name="moneda" id="moneda" class="form-control">
              @foreach($monedas as $moneda)
                <option title="{{$moneda->nombre}}" value="{{$moneda->id}}">{{$moneda->codigo}}</option>
              @endforeach
              </select>
                <input type="text" class="form-control" name="precio" id="precio">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Capacidad de producción al mes</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="capacidad_produccion" id="cantidad_pm"  placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad mínima de venta</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cantidad_minima" id="cantidad_min" placeholder=""  required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad disponible</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cantidad_disponible" id="cantidad_disp"  placeholder="" required>

                <select name="unidad_medida" id="unidad_medida" class="form-control" >
                <option value="">Seleccione Unidad de Medida...</option> 
              @foreach($unidades as $unidade)
                <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
              @endforeach
              </select>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Puerto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="puerto" id="puerto" placeholder=""    required>              
            </div>
          </div>

  


          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Términos de Pago</label>
            <div class="col-md-6">
                <input type="checkbox" name="LC" id="LC"  onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">L/C</label>
  				<input type="checkbox" name="DA" id="DA"   onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">D/A</label>
   			    <input type="checkbox" name="DP" id="DP"   onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">D/P</label>
   				<input type="checkbox" name="TT"  id="TT"   onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">T/T</label>
            </div>
          </div>

        </fieldset>

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



