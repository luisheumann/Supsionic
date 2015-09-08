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

         

         <div class="col-md-12">
 
<div class="form-group"><label class="testinputcategoria">Categoria</label><br>
    <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Busqueda Automatica</a></li>
  <li><a data-toggle="tab" href="#menu1">Busqueda Manual</a></li>
  
</ul>
  
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
  

    <div class="categoriamanual">

          <input style="width: 200px" type="text" id="testinput" value="" />  

          <button type="button"  id="testid" 
          onclick="updateInput(this.value)" 
          value="" title="Aceptar">Aceptar</button>

      </div>

  </div>
  <div id="menu1" class="tab-pane fade">
 
      <div class="listacategoria"> 
       <input type="hidden" name="demo7" />
       <div class="results" id="demo7-result"></div>

   </div>

   <code><pre>

   </pre></code>
  </div>
 
</div>


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



<style type="text/css">

label.testinputcategoria {
    padding-bottom: 7px;
}
    .form-group.multipais {
    margin-left: 10px !important;
    /* width: 100%; */
}

    hr {
    margin-top: 7px;
    margin-bottom: 7px;
    border: 0;
    border-top: 1px solid #eee;
}


    label.testinputcategoria {
    padding-left: 6px;
}

    .categoriamanual {
    background-color: #DDD;
    margin: 5px;
    padding: 10px;
}


    .listacategoria{
    background-color: #DDD;
        margin: 5px;
    padding: 10px
}


    section.content {
    margin: 0px;
    margin-left: 50px !important;
    margin-right: 50px !important;
        padding-bottom: 145px;
}

ul.multiselect-container.dropdown-menu {
    padding: 5px;
}


select[name=demo7______] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
  

}

select[name=demo7_____] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
   
}

select[name=demo7____] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
 
}


select[name=demo7___] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;

}


select[name=demo7__] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
    
}

select[name=demo7_] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
    
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
     margin-right: 10px;
    
}


label.testinput-buscador-select {
    padding-left: 5px;
}



</style>
<!-- Initialize the plugin: -->
  
	</div>	
</div>
</div>
@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/perfil-formulario.css')}}
@stop

@section('scripts')
@parent




{{HTML::script('js/importador.js')}}
{{HTML::script('/api/tree/jquery.optionTree.js')}}

  {{HTML::script('/js/autocomplete.js')}}
    {{HTML::script('js/bootstrap-multiselect.js')}}
    {{HTML::script('js/jasny-bootstrap.min.js')}}
  <link rel="stylesheet" href="/css/autocomplete.css" type="text/css" media="screen" charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>




 <script type="text/javascript">
    function updateInput(ish){

      var url = window.location.href; 

      var url2 = url.substring(0, url.length-1);

//var url2 = url;
  

      if (url2.indexOf('?') > -1){
       url2 += '&param='+ ish
     }else{
       url2 += '?param='+ ish
     }




     window.location.href = url2;



   }

   

   $(function() {

    var options = {
      empty_value: 'null',
            indexed: true,  // the data in tree is indexed by values (ids), not by labels
            on_each_change: '/api/tree/get-subtree.php', // this file will be called with 'id' parameter, JSON data must be returned
            choose: function(level) {
              return 'Choose level ' + level;
            },
            loading_image: '/api/tree/demo/ajax-load.gif',
            show_multiple: 10, // if true - will set the size to show all options
            id:1,
            choose: '' // no choose item
            
          };

          var displayParents = function() {

            var porNombre=document.getElementsByName("demo7_")[0].value;
            document.getElementById("padre").value = porNombre;

            var hijo1=document.getElementsByName("demo7__")[0].value;
            document.getElementById("hijo1").value = hijo1;

            var hijo2=document.getElementsByName("demo7___")[0].value;
            document.getElementById("hijo2").value = hijo2;

            var hijo3=document.getElementsByName("demo7____")[0].value;
            document.getElementById("hijo3").value = hijo3;

            var hijo4=document.getElementsByName("demo7_____")[0].value;
            document.getElementById("hijo4").value = hijo4;

            var hijo5=document.getElementsByName("demo7______")[0].value;
            document.getElementById("hijo5").value = hijo5;



var categoryselect = [porNombre, hijo1, hijo2,hijo3,hijo4,hijo5];

 document.getElementById("categoria_producto2").value = categoryselect;




     



            var labels = []; // initialize array
            $(this).siblings('select') // find all select

                           .find(':selected') // and their current options
                           
                             .each(function() { labels.push($(this).text()); }); // and add option text to array
            $('<div>').text(this.value + ':' + labels.join(' > ')).appendTo('#demo7-result'); 

                       
             // and display the labels
   

          }

    $.getJSON('/api/tree/get-subtree.php', function(tree) { // initialize the tree by loading the file first
      $('input[name=demo7]').optionTree(tree, options).change(displayParents);


    });

  });


</script>


<script type="text/javascript">

  var options = {
    script:"/json/taxonomy/search",
    varname:"?term",
    json:true,
    callback: function (obj) { 
      document.getElementById('testid').value = obj.id; 
      var valor = document.getElementById("valoroculto").value = obj.id;

      if (!valor==null ){

        var valor =  valor;

      }else{
       var valor= 0;
     }


   }
 };
 var as_json = new AutoSuggest('testinput', options);


 var options_xml = {
  script:"test.php?",
  varname:"input"
};
var as_xml = new AutoSuggest('testinput_xml', options_xml);

</script>



<?php

if (isset($_GET["param"]) && !empty($_GET["param"])) {
  $param = $_GET['param'];
}else{
  $param = 0;
}

$id = taxonomy::where('id',$param)->first();

if( !$id == null){
$nombreCat = $id->name;
}else{
$nombreCat = null;
}

if( !$id == null){
  $id = $id->id;
}else{
  $id = null;
}
if (!$id == null) {
  $id1 = taxonomy::where('id', $id)
  ->select('parent')
  ->first();


  if(!$id1 == null){
    $valorid1 = $id1->parent;
  }else{
    $valorid1 = null;
  }
}else{
 $valorid1 = null;

}

if (!$id1 == null) {
  $id2 = taxonomy::where('id', $id1->parent)
  ->select('parent')
  ->first();


  if(!$id2 == null){
    $valorid2 = $id2->parent;
  }else{
    $valorid2 = null;
  }
}else{

 $valorid2 = null;
}

if (!$id2 == null) {
  $id3 = taxonomy::where('id', $id2->parent)->select('parent')->first();

  if(!$id3 == null){
    $valorid3 = $id3->parent;
  }else{
    $valorid3 = null;
  }
}else{
  $valorid3 = null;

}
if (!$id3 == null) {
  $id4 = taxonomy::where('id', $id3->parent)->select('parent')->first();

  if(!$id4 == null){
    $valorid4 = $id4->parent;
  }else{
    $valorid4 = null;
  }
}else{

 $valorid4 = null;
}

if (!$id4 == null) {
  $id5 = taxonomy::where('id', $id4->parent)->select('parent')->first();

  if(!$id5 == null){
    $valorid5 = $id5->parent;
  }else{
    $valorid5 = null;
  }
}else{
  $valorid5 = null;
}


if (!$id5 == null) {
  $id6 = taxonomy::where('id', $id5->parent)->select('parent')->first();

  if(!$id6 == null){
    $valorid6 = $id6->parent;
  }else{
    $valorid6 = null;
  }

}else{
 $valorid6 = null;

}

?>

<script>
  var vartatataranieto11 = "<?php echo $valorid5; ?>" ;
  var varpadre11 = "<?php echo $valorid4; ?>" ;
  var varhijo1 = "<?php echo $valorid3; ?>" ;
  var varnieto = "<?php echo $valorid2; ?>" ;
  var varbisnieto11 = "<?php echo $valorid1; ?>" ;
  var vartataranieto11 = "<?php echo $id; ?>" ;

  var testinput = "<?php echo $nombreCat; ?>" ;

  var testinput =document.getElementById('testinput').value = testinput; 

  var padre11 =document.getElementById('padre11').value = varpadre11; 
  var hijo11 =document.getElementById('hijo11').value = varhijo1; 
  var nieto1 =document.getElementById('nieto1').value = varnieto; 
  var bisnieto11 =document.getElementById('bisnieto11').value = varbisnieto11;
  var vartataranieto11 =document.getElementById('tataranieto11').value = vartataranieto11;  
  var vartatataranieto11 =document.getElementById('tatataranieto11').value = vartatataranieto11;  



</script>
@stop



