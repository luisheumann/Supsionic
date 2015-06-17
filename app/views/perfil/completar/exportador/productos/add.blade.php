@extends('layouts/default')
@section('content')

@section('title')
@parent
 ¡ Adicionar Producto !
@stop
@include('includes.header')

<div class="contenedor-perfil">
<div class="row home-perfil-form">

<form class="form-horizontal" id="form_exportador" action="/public/producto_exportador" method="post" enctype="multipart/form-data">

<div class="container">
  <div class="row clearfix">    
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6  column col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
      <form class="form-horizontal">
        <fieldset>
          <legend class="legenda"><strong>Información Básica</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label" for="selectbasic">Categoria</label>
            <div class="col-md-6">
              <select name="categoria_producto" id="categoria_producto" class="form-control" required>
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
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label" for="detalles_producto">Descripción Producto</label>
            <div class="col-md-6">
              <textarea name="detalles_producto" class="form-control" id="detalles_producto" rows="4" placeholder="Descripción" required></textarea>
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
              <input type="text" class="form-control input-md" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Referencia</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Marca</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Material</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Color</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Peso</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Partida Arancelaria</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Unidad de Medida</label>
            <div class="col-md-6">
              <select name="unidad_medida" id="unidad_medida" class="form-control" required>
                <option value="">Seleccione Unidad de Medida...</option> 
              @foreach($unidades as $unidade)
                <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
              @endforeach
              </select>
            </div>
          </div>

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

          <legend class="legenda"><strong>Información Comercial</strong></legend>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Precio</label>
            <div class="col-md-6">
            <div class="form-inline">
              <select name="pais_origen" id="pais_origen" class="form-control">
              @foreach($monedas as $moneda)
                <option title="{{$moneda->nombre}}" value="{{$moneda->codigo}}">{{$moneda->codigo}}</option>
              @endforeach
              </select>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Capacidad de producción al mes</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad mínima de venta</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Cantidad disponible</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Puerto</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="producto" id="nombre_producto" placeholder="" required>              
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-6 control-label"  for="nombre_producto">Términos de Pago</label>
            <div class="col-md-6">
                <input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> L/C
                <input type="checkbox" id="checkboxEnLinea2" value="opcion_2"> D/A
                <input type="checkbox" id="checkboxEnLinea3" value="opcion_3"> D/P
                <input type="checkbox" id="checkboxEnLinea3" value="opcion_3"> T/T
            </div>
          </div>

        </fieldset>
      </form>
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
  
	</div>	
</div>
</div>
@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/perfil-formulario.css')}}
@stop

@stop


