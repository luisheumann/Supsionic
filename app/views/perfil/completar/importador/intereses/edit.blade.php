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

    
     $interes2 = InteresesImportador::find($id);
     


  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>

@extends('layouts/backend')

@section('content-header')


<style type="text/css">
  .modal-body {
  padding: 40px;


}


input#max {
  width: 100px;
  float: left;
  margin-right: 20px;
}


input#min {
  width: 100px;
  float: left;
    margin-right: 20px;
}


select#min_cantidad {
  width: 250px;
}

select#max_cantidad {
  width: 250px;
}

input[type="checkbox"] {
    margin: 5px;
}

form#form_importador {
    margin: 40px;
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



<div class="contenedoredit">
<form class="form-horizontal" id="form_importador">
   <input type="hidden" class="form-control" id="id" name="id" value="{{$interes->id}}"> 

<br>
    <legend class="legenda"><strong>Información Básica</strong></legend>


  <div class="row">
   <div class="col-md-6"></div>
    <div class="col-md-6">
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
   <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="productos">
          Escriba los productos que te interesan importar de la categoría:<br>
            <strong>
              <em><span id="view_cate"></span></em>
            </strong>
        </label>
        <textarea name="productos" class="form-control" id="productos" rows="4" placeholder="productos de interés"  required>{{$interes->productos}}</textarea>
      </div>
    </div>  
 </div>
  <hr>

 <div class="row">
    <div class="col-md-6"></div>
   <b>Cantidad Minima</b><br>
      <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="form-group">
        
        <input type="text" class="form-control" id="min" name="min" value="{{$interes->min}}"> 

        <select name="min_cantidad" id="min_cantidad" class="form-control" required>
          <option value="">Seleccione Unidad de Medida...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>


      </div>
    </div>  
</div>

 <div class="row">
    <div class="col-md-6"></div>
 <b> Cantidad Maxima</b><br>
  <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="form-group">
  
           <input type="text" class="form-control" id="max" name="max" value="{{$interes->max}}">
            <select name="max_cantidad" id="max_cantidad" class="form-control" required>
          <option value="">Seleccione Unidad de Medida...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>

      </div>
    </div>  
  </div>

  <hr>

 <div class="row">
    <div class="col-md-6"></div>
   <b>Partida arancelaria.</b><br>
       <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="form-group">
        
        <input type="text" class="form-control" id="partida" name="partida" value="{{$interes->partida}}"> 



      </div>
    </div>  
</div>

  <hr>

   <div class="row">
      <div class="col-md-6"></div>

   <b>Frecuencia de Compra</b><br>
       <div class="col-md-6"></div>
    <div class="col-md-6">
      <div class="form-group">
        
       <select id="frecuencia" required name="frecuencia" class="form-control" >
           
              <option value="1">Semanal</option>
              <option value="2">Mensual</option>
              <option value="3">Trimestral</option>
              <option value="4">Semestral</option>
              <option value="5">Anual</option>

         
          </select>


      </div>
    </div>  
  </div>
  <hr>








 <div class="row">
    <div class="col-md-6"></div>
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
</div>
       <div class="row">
          <div class="col-md-6"></div>
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

    <button class="btn btn-success" id="btn_import"><i class="fa fa-check"></i> ACTUALIZAR</button>
    <a href="/{{$empresa->slug}}/interes_importador" class="btn btn-info"> <i class="fa fa-close"></i>CERRAR</a>

   


  </div>

  </form>

</div>

@stop


<!-- Finaliza el render de la pagina -->

@stop

@section('scripts')
@parent



<script type="text/javascript">

var values= "<?foreach ($rutas as $ruta) {$resultstr[] = $ruta->pais_origen;}$result = implode(",",$resultstr);echo $result;?>"
$.each(values.split(","), function(i,e){
    $("#selec_paises option[value='" + e + "']").prop("selected", true);
});


var pais_destino  = <?php echo $rutas[0]->pais_destino ?>;


var categoria_id = <?php echo $interes->categoria_id ?>;

var min_cantidad = <?php echo $interes->min_medida ?>;
var max_cantidad = <?php echo $interes->max_medida ?>;

var frecuencia = <?php echo $interes->frecuencia ?>;



document.getElementById("pais_destino").value = pais_destino;
document.getElementById("categoria_producto").value = categoria_id;
document.getElementById("min_cantidad").value = min_cantidad;
document.getElementById("max_cantidad").value = max_cantidad;

document.getElementById("frecuencia").value = frecuencia;


  function changeValueCheckbox(element){

 
  

   if(element.checked){
    element.value='1';
    
 
  }else{
    element.value='0';
    
  }
}





</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  {{HTML::script('js/importador.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}
@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
@stop



