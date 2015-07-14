<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {
  $id = $_GET['id'];
}else{
   $id = 0;
}
  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

    
      $producto = Productos::find($id);
      $rutas = $producto->RutaExportador;


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



 

  <input type="hidden" class="form-control" name="id" id="id" value="{{$id}}" placeholder="">
   

          <legend class="legenda"><strong>Información Básica</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label" for="selectbasic">Categoria</label>
            <div class="col-md-6">
              <select name="categoria_producto" id="categoria_producto"  value="{{$producto->categoria_id}}" class="form-control" required>
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
              <input type="text" class="form-control" name="producto" id="nombre_producto" value="{{$producto->nombre}}" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label" for="detalles_producto">Descripción Producto</label>
            <div class="col-md-6">
              <textarea name="detalles_producto" class="form-control" id="detalles_producto" value="{{$producto->descripcion}}" rows="4" placeholder="Descripción" required>{{$producto->descripcion}}</textarea>
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
              <input type="text" class="form-control input-md" name="codigo" id="codigo" value="{{$producto->codigo}}" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Referencia</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="referencia" id="referencia"  value="{{$producto->referencia}}" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Marca</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="marca" id="marca" placeholder=""  value="{{$producto->marca}}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Material</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="material" id="material" placeholder="" value="{{$producto->material}}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Color</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="color" id="color" placeholder="" value="{{$producto->color}}" required>
            </div>
          </div>

           <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Peso Producto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="peso" id="peso" value="{{$producto->peso}}" placeholder="" >
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
              <input type="text" class="form-control" value="{{$producto->peso_caja}}" name="peso_caja" id="peso_caja" placeholder="" >
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
              <input type="text" class="form-control" name="alto" value="{{$producto->alto}}"  id="alto" placeholder="" >
              <label class="label2"  for="nombre_producto">Ancho</label>
                <input type="text" class="form-control" name="ancho" id="ancho" value="{{$producto->ancho}}" placeholder="" >
                       <label class="label2"  for="nombre_producto">Profundo</label>
                  <input type="text" class="form-control" name="profundo" id="profundo" value="{{$producto->profundo}}" placeholder="" >
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
              <input type="text" class="form-control" name="partida" id="partida" value="{{$producto->partida}}" placeholder="" required>
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
              <input type="number" class="form-control" name="medida" id="medida" value="{{$producto->medida}}"  placeholder="" >
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
        <div class="col-md-6"> <select id="selec_paises" required name="destinos[]" value="{{$producto->destinos}}" multiple="multiple">
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
                <input type="text" class="form-control" name="precio" id="precio" value="{{$producto->precio}}">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Capacidad de producción al mes</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="capacidad_produccion" id="cantidad_pm" value="{{$producto->produccion_mes}}" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad mínima de venta</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cantidad_minima" id="cantidad_min" placeholder="" value="{{$producto->venta_minima}}"  required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad disponible</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cantidad_disponible" id="cantidad_disp" value="{{$producto->stock}}"  placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Puerto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="puerto" id="puerto" placeholder=""  value="{{$producto->puerto}}"  required>              
            </div>
          </div>

  


          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Términos de Pago</label>
            <div class="col-md-6">
                <input type="checkbox" name="LC" id="LC" "@if($producto->LC==1) checked @else @endif"  onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">L/C</label>
  				<input type="checkbox" name="DA" id="DA" "@if($producto->DA==1) checked @else @endif"   onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">D/A</label>
   			    <input type="checkbox" name="DP" id="DP" "@if($producto->DP==1) checked @else @endif"  onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">D/P</label>
   				<input type="checkbox" name="TT"  id="TT" "@if($producto->TT==1) checked @else @endif"  onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">T/T</label>
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

var values= "<?foreach ($rutas as $ruta) {$resultstr[] = $ruta->pais_destino;}$result = implode(",",$resultstr);echo $result;?>"
$.each(values.split(","), function(i,e){
    $("#selec_paises option[value='" + e + "']").prop("selected", true);
});


var categoria_id = <?php echo $producto->categoria_id ?>;
var unidad_id = <?php echo $producto->unidad_id ?>;
var pais_origen  = <?php echo $rutas[0]->pais_origen ?>;
var moneda_id  = <?php echo $producto->moneda ?>;


var peso_unidad = <?php if ($producto->peso_unidad == null) {echo 1;}else{echo $producto->peso_unidad;}  ?>;
var dimencion_unidad = <?php if ($producto->dimencion_unidad == null) {echo 1;}else{echo $producto->dimencion_unidad;}  ?>;


var peso_caja_unidad = <?php if ($producto->peso_caja_unidad == null) {echo 1;}else{echo $producto->peso_caja_unidad;}  ?>;



var lc_valor  = <?php if ($producto->LC==null){echo 0;}else{echo 1;}?>;
var da_valor  = <?php if ($producto->LC==null){echo 0;}else{echo 1;}?>;
var dp_valor  = <?php if ($producto->LC==null){echo 0;}else{echo 1;}?>;
var tt_valor  = <?php if ($producto->LC==null){echo 0;}else{echo 1;}?>;

console.log(pais_origen);

document.getElementById("categoria_producto").value = categoria_id;

document.getElementById("pais_origen").value = pais_origen;
document.getElementById("moneda").value = moneda_id;
document.getElementById("peso_unidad").value = peso_unidad;
document.getElementById("peso_caja_unidad").value = peso_caja_unidad;
document.getElementById("dimencion_unidad").value = dimencion_unidad;


document.getElementById("LC").value = lc_valor;
document.getElementById("DA").value = da_valor;
document.getElementById("DP").value = dp_valor;
document.getElementById("TT").value = tt_valor;


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


