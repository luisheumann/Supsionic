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
  width: 160px;
}

select#max_cantidad {
  width: 160px;
}

input[type="checkbox"] {
    margin: 5px;
}

form#form_importador {
    margin: 40px;
}

.col-md-6.a {
    margin-left: 0px;
    margin: 0px;
    /* padding: 0px; */
    padding-left: 0px;
    padding-right: 40px;
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
        <label for="categoria_producto">Categorias </label><br>
           <select id="categoria_producto" required name="categoria[]" multiple="multiple">
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
    <div class="col-md-6 a">
      <div class="form-group">
         <div class="col-md-4">
    <b>Cantidad Minima</b><br>
        <input title="Valor 0 es ilimitado por defecto" placeholder="0" type="text" class="form-control" id="min" name="min" value="{{$interes->min}}"> 
    </div>

      <div class="col-md-4">
        <b> Cantidad Maxima</b><br>
          <input title="Valor 0 es ilimitado por defecto" placeholder="0" type="text" class="form-control" id="max" name="max" value="{{$interes->max}}">
         </div>
<div class="col-md-4">
 <b> Unidad</b><br>
        <select name="min_cantidad" id="min_cantidad" class="form-control" required>
          <option value="">Seleccione...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>
</div>

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

<!--
 <div class="row">

        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipos de Transporte</strong></label>
        <div class="col-md-6">
          <input type="checkbox"   name="SAE" "@if($interes->SAE==1) checked @else @endif"  onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SAE">Aéreo</label>
            <br>
          <input type="checkbox"   name="STE"  "@if($interes->STE==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="STE">Terrestre</label>
            <br>
          <input type="checkbox"  name="SMA"  "@if($interes->SMA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMA">Marítimo</label> 
            <br>   
         <input type="checkbox"  name="SFL" "@if($interes->SFL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SFL"> Fluvial</label>   
           <br>
          <input type="checkbox"  name="SMU"  "@if($interes->SMU==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMU"> Multimodal</label> 
            <br> 
        </div>
      </div><hr>
</div>

 <div class="row">

        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Servicios Adicionales</strong></label>
        <div class="col-md-6">
        <br>
          <input type="checkbox"   name="SOL"  "@if($interes->SOL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SOL">Operadores Logísticos</label>
            <br>
          <input type="checkbox"   name="SA"  "@if($interes->SA==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="SA">Almacenamiento</label>
            <br>
          <input type="checkbox"  name="SSIA"  "@if($interes->SSIA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSIA">Servicios de Intermediación Aduanera</label> 
            <br>   
         <input type="checkbox"  name="SACCE"  "@if($interes->SACCE==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SACCE"> Asesoría y consulta Comercio Exterior</label>   
           <br>

        </div>
      </div>

      </div>
      <hr>

       <div class="row">

            <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Especialidades</strong></label>
        <div class="col-md-6">
          <input type="checkbox"  name="SAMP"  "@if($interes->SAMP==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SAMP">Aislamiento de mercancías peligrosas</label>
            <br>
          <input type="checkbox"   name="STAC"  "@if($interes->STAC==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="STAC">Transporte Aéreo de cargo</label>
            <br>
          <input type="checkbox"  name="STTC"  "@if($interes->STTC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STTC">Transporte Terreste de Carga</label>    <br>
            
         <input type="checkbox"  name="STMC"  "@if($interes->STMC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STMC"> Transporte Marítimo Consolidado</label>   <br>  
         <input type="checkbox"  name="STAI"  "@if($interes->STAI==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STAI"> Servicio de Transporte Aéreo Internacional</label>   <br>  
         <input type="checkbox"  name="SSTAN"  "@if($interes->SSTAN==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSTAN"> Servicio de Transporte Aéreo Nacional</label>    <br> 


        </div>
      </div>
</div>
      <hr>

-->




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

    <a href="/{{$empresa->slug}}/interes_transportador" class="btn btn-info"> <i class="fa fa-close"></i>CERRAR</a>

   


  </div>

  </form>

</div>

@stop


<!-- Finaliza el render de la pagina -->

@stop

@section('scripts')
@parent



<script type="text/javascript">

var values3= "<?foreach ($categorias_select as $ruta) {$resultstr[] = $ruta->categoria_id;}$result = implode(",",$resultstr);echo $result;?>"
console.log("dos");
console.log(values3);
$.each(values3.split(","), function(i,e){
    $("#categoria_producto option[value='" + e + "']").prop("selected", true);
});

var values= "<?foreach ($rutas as $ruta) {$resultstr[] = $ruta->pais_origen;}$result = implode(",",$resultstr);echo $result;?>"
$.each(values.split(","), function(i,e){
    $("#selec_paises option[value='" + e + "']").prop("selected", true);
});


var pais_destino  = <?php echo $rutas[0]->pais_destino ?>;




var min_cantidad = <?php echo $interes->min_medida ?>;
var max_cantidad = <?php echo $interes->max_medida ?>;

var frecuencia = <?php echo $interes->frecuencia ?>;



document.getElementById("pais_destino").value = pais_destino;

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




