

<style>
  #multiple-datasets .league-name {
    margin: 0 20px 5px 20px;
    padding: 3px 0;
    border-bottom: 1px solid #ccc;

  }

  .tt-menu {
    background-color: azure;
  }
  .scrollable{
   overflow: auto;
   width: 70px; /* adjust this width depending to amount of text to display */
   height: 80px; /* adjust height depending on number of options to display */
   border: 1px silver solid;
 }
 .scrollable select{
   border: none;
 }




</style>

{{HTML::style('css/jquery-ui.css')}}



<?php $aleatorio = rand(5, 1000); ?>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
{{HTML::script('js/jquery-ui.min.js')}}


<div class="busqueda">

  <img src="{{asset('images/home/arme_su_cadena_small.png')}}" class="titulo_busqueda">
  <div class="salto_linea"></div>


  <form class="form-horizontal form_home_buscar" id="busqueda" action="/api/buscar_cadena"  method="get">
    <div class="campos_busq">

      <div class="form-group">
        <label for="perfil" class="col-xs-2 control-label">
          <img src="{{asset('images/home/uno.png')}}" alt="">
        </label>
        <div class="col-xs-10">


          <select name="perfil" id="perfil"  class="form-control validate[required]">
            <option value="">Seleccione...</option>
            <option value="1">Importar</option>
            <option value="2">Exportar</option>
            <option value="3">Transportar</option>
            <option value="4">SIAS</option>
          </select>
        </div>
      </div>

      <div class="salto_linea"></div>

      <div class="form-group">
        <label for="categoria" class="col-xs-2 control-label">
          <img src="{{asset('images/home/dos.png')}}" alt="">
        </label>
        <div class="col-xs-10">
          <select name="categoria" id="categoria"  class="form-control ">
            <option value="">Categoría</option>
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>


      <div class="form-group">
        <label for="producto" class="col-xs-2 control-label num_form">
          <img src="{{asset('images/home/tres.png')}}" alt="">
        </label>
        <div class="col-xs-10">


          <input type="hidden" id="producto2" name="productohidden"/>

          
          <select name="selectProducto" class="form-control validate[required]" id="combobox" >
            <optgroup label="Seleccione un Producto">
            </optgroup>
            <optgroup label="Seleccione un Intereses">
            </optgroup>

          </select>



        </div>
      </div>

      <div class="salto_linea"></div>

      <div class="form-group">
        <label for="region" class="col-xs-2 control-label">
          <img src="{{asset('images/home/cuatro.png')}}" alt="">
        </label>
        <div class="col-xs-10">

<!--
<select name="country" class="country" id="country" class="form-control">
<option selected="selected" value="">REGION</option>

<option value="1">Africa</option>
<option value="2">América</option>
<option value="3">Asia</option>
<option value="4">Europa</option>
<option value="5">Oceanía</option>

</select>
-->



<select name="country" class="country" id="country" class="form-control" >

  <option selected="selected" value ="">REGION</option>
</select>


</div>
</div>

<div class="salto_linea"></div>




<div class="form-group">
  <label for="origen" class="col-xs-2 control-label num_form">
    <img src="{{asset('images/home/cinco.png')}}" alt="">
  </label>
  <div class="col-xs-10">
    <select name="origen" id="origen"  class="form-control">
      <option value="">PAÍS DE ORIGEN</option>
      @foreach($paises as $pais)
      <option value="{{$pais->id}}">{{$pais->nombre}}</option>
      @endforeach
    </select>

  </div>
</div>


<div class="salto_linea"></div>
<div class="form-group">
  <label for="origen" class="col-xs-2 control-label num_form">
    <img src="{{asset('images/home/seis.png')}}" alt="">
  </label>
  <div class="col-xs-10">
    <select name="destino" id="destino"  class="form-control">
      <option value="">PAÍS DE DESTINO</option>
      @foreach($paises as $pais)
      <option value="{{$pais->id}}">{{$pais->nombre}}</option>
      @endforeach
    </select>

  </div>
</div>

<div class="salto_linea"></div>	 	 
<button class="btn-borde btn-borde-n">BUSCAR</button>
</div>
</form>
</div>



<?php
if (isset($_GET["producto"]) && !empty($_GET["producto"])) {
  $producto = $_GET['producto'];
}

if (isset($_GET["selectProducto"]) && !empty($_GET["selectProducto"])) {

 $categoria = $_GET['selectProducto'];
}
?>


<script>


  function QuitarFoco(){
    elemento = document.getElementById("newID");
    elemento.blur();
  }


  //var pais_id_user = <?php echo $empresapais->pais_id ?>; 

 document.getElementById("destino").value = '<?php echo $_GET['destino']?>';
 document.getElementById("origen").value = '<?php echo $_GET['origen']?>';

  document.getElementById("perfil").value = '<?php echo $_GET['perfil']?>';
  document.getElementById("categoria").value = '<?php echo $_GET['categoria']?>';
  document.getElementById("country").value = '<?php echo $_GET['country']?>';


  $('#country').on('click', function (e) {
    $('country').on('refresh', true);
  });




  $('#sites input:radio').addClass('input_hidden');

  $('#sites label').click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
  });

  $( document ).ready(function() {

 

//$('#newID').change(function(event) {
  /* Act on the event */
 //   var optionSelected = $(this).find("option:selected");
 //   var valueSelected  = optionSelected.val();
 //   var textSelected   = optionSelected.text();
  //}

  jQuery("#busqueda").validationEngine();


//////////////////////////////////////////////////


if (producto != null){
  url = window.location.href;

  var producto = urlParams["producto"];
  var categoria = urlParams["selectProducto"];
  $ciudaditems = $('.cityItems').remove();

  if (categoria == "producto") {
   rutajson = '../api/filtroregion/';

 }else{

   rutajson = '../api/filtroregioninteres/';  
 }

 $ciudaditems = $('.cityItems').remove();

 $.get(rutajson+producto, function(data,index){
  for(var i=0;i<data.length;i++){
    var obj = data[i];

    for(var key in obj){

      var attrName = key;
      var attrValue = obj[key];
      
    }


    $('select#country').append('<option value="'+attrValue+'" class="cityItems">'+attrValue+'</option>')
            };// funcion
          }, 'json');

}else{

  $ciudaditems = $('.cityItems').remove();


   rutajson = '../api/filtroregion/000';


 $ciudaditems = $('.cityItems').remove();

 $.get(rutajson, function(data,index){
  for(var i=0;i<data.length;i++){
    var obj = data[i];

    for(var key in obj){

      var attrName = key;
      var attrValue = obj[key];
      
    }


    $('select#country').append('<option value="'+attrValue+'" class="cityItems">'+attrValue+'</option>')
            };// funcion
          }, 'json');


}
document.getElementById("country").value = '<?php echo $_GET['country']?>';


$('#perfil').change(function(event) {
  /* Act on the event */
  var optionSelected = $(this).find("option:selected");
  var valueSelected  = optionSelected.val();
  var textSelected   = optionSelected.text();
  if(valueSelected==1)
  {

    var pach = "/api/buscar_cadena?perfil=1&categoria=&producto=&country=&origen=&destino=&selectProducto=";
    window.location =  pach;

$('#cambio_vista').attr('data-cambio', 1); // data-chek como true
$('#vista_vendedor').show(); 
$('#vista_comprador').hide();

$(".espacio_transporte").empty();
$('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 


$(".espacio_sias").empty();
$('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  
}
if(valueSelected==2)
{

  var pach = "/api/buscar_cadena?perfil=2&categoria=&producto=&country=&origen=&destino=&selectProducto=";
  window.location =  pach;
             $('#cambio_vista').attr('data-cambio', 2); // data-chek como true
             $('#vista_vendedor').hide();
             $('#vista_comprador').show();


             $(".espacio_transporte").empty();
             $('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 

             $(".espacio_sias").empty();
             $('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  

           }

           if(valueSelected==3)
           {

            var pach = "/api/buscar_cadena?perfil=3&categoria=&producto=&country=&origen=&destino=&selectProducto=";
            window.location =  pach;


$('#cambio_vista').attr('data-cambio', 3); // data-chek como true
$('#vista_transporte').show();
$('#vista_vendedor').hide();
$('#vista_comprador').hide();
$('#vista_sias').hide();
$(".espacio_transporte").empty();
$('.espacio_transporte').append(('<img src="images/cadena/recomendado_transportador.png">'));
$(".espacio_sias").empty();
$('.espacio_sias').append(('<img src="images/cadena/recomendado_sias.png">'));

}

if(valueSelected==4)
{

  var pach = "/api/buscar_cadena?perfil=4&categoria=&producto=&country=&origen=&destino=&selectProducto=";
  window.location =  pach;


$('#cambio_vista').attr('data-cambio', 4); // data-chek como true
$('#vista_sias').show();
$('#vista_vendedor').hide();
$('#vista_comprador').hide();
$('#vista_transporte').hide();

$(".espacio_transporte").empty();
$('.espacio_transporte').append(('<img src="images/cadena/recomendado_transportador.png">'));

$(".espacio_sias").empty();
$('.espacio_sias').append(('<img src="images/cadena/recomendado_sias.png">'));

}

});


});
</script>

{{HTML::style('css/busqueda_small.css')}}
{{HTML::script('js/jquery.ddslick.min.js')}}


<script>




  var idperfil = '<?php echo $_GET['perfil']?>';
  //if (idperfil == 2){
  //  var jsonselect = "../api/productoex.json";
  //}else{
    var jsonselect = "../api/producto.json";
  //}

  var select = $('#combobox');
  $.get(jsonselect, function(data){
    $.each(data, function (key, cat) {
      var option = "<option  value='"+cat.category+"'>"+cat.name+"</option>";

      if (cat.hasOwnProperty("category")) {
        var group = cat.category;

        if (select.find("optgroup[label='" + group + "']").length === 0) {
          select.append("<optgroup label='" + group + "' />");
        }

        select.find("optgroup[label='" + group + "']").append(option);
      } else {
        select.append(option);
      }        
    });
  }, 'json');



  (function($) {
    $.widget("ui.combobox", {
      _create: function() {


        var input, self = this,
        select = this.element.hide(),
        selected = select.children(":selected"),
        value = selected.val() ? selected.text() : "",


        wrapper = this.wrapper = $("<span>").addClass("ui-combobox").insertAfter(select);




  var valorproducto = '<?php echo $_GET['producto']?>';






        var productonow = valorproducto;

    
        if (productonow == ""){
          
         value2 = value;
       }else{
        
        value2 = valorproducto;



/////////////////////////////////////////////


} 


input = $("<input>").appendTo(wrapper).val(value2).attr('style', 'visible').attr('id', 'newID').attr('name', 'producto').addClass("ui-state-default ui-combobox-input").autocomplete({

  delay: 0,
  minLength: 0,
  source: function(request, response) { 

    var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");

    response(select.find("option").map(function() {


      var text = $(this).text();
      
      if (this.value && (!request.term || matcher.test(text))) 

        return {
          label: text.replace(
            new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(request.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>"),
          value: text,
          option: this,
          category: $(this).closest("optgroup").attr("label")
        };

                        //MK 
                        $('#test').attr('style', 'display: none;');

                      }).get());

  },
  select: function(event, ui) {

    ui.item.option.selected = true;
    
    self._trigger("selected", event, {

      item: ui.item.option

    });
//////////////////////////////////////COMBO REGION


var item = ui.item;
var itemValue = item.value;
producto = itemValue;

categoria = select.val();
$ciudaditems = $('.cityItems').remove();
if (categoria == "producto") {
 rutajson = '../api/filtroregion/';

}else{

 rutajson = '../api/filtroregioninteres/';  
}

$ciudaditems = $('.cityItems').remove();



$.get(rutajson+producto, function(data){

          //  $.each(data[0], function(index, element){
            //console.log(index);

            for(var i=0;i<data.length;i++){
              var obj = data[i];




              for(var key in obj){
                var attrName = key;
                var attrValue = obj[key];
              }

              
              $('select#country').append('<option value="'+attrValue+'" class="cityItems">'+attrValue+'</option>')
            };// funcion
          }, 'json');


////////////////////////////////////

},
change: function(event, ui) {
  if (!ui.item) {
    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex($(this).val()) + "$", "i"),
    valid = false;
    select.children("option").each(function() {

      if ($(this).text().match(matcher)) {

        this.selected = valid = true;

        return false;

      }


    });

    if (!valid) {
      $('#test').attr('style', 'display: block;');
                            // remove invalid value, as it didn't match anything
                            //$( this ).val( "" );
                            //select.val( "" );
                            //input.data( "autocomplete" ).term = "";
                            //return false;   


                          }
                        }
                      }
                    }).addClass("ui-widget ui-widget-content ui-corner-left");

input.data("autocomplete")._renderItem = function(ul, item) {

  return $("<li></li>").data("item.autocomplete", item).append("<a>" + item.label + "</a>").appendTo(ul);

};

input.data("autocomplete")._renderMenu = function(ul, items) {
  var self = this,
  currentCategory = "";
  $.each(items, function(index, item) {

    if (item.category != currentCategory) {
      if (item.category) {

        ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
      }
      currentCategory = item.category;

    }

    self._renderItem(ul, item); 

  });
};

$("<a>").attr("tabIndex", -1).attr("title", "Show All Items").appendTo(wrapper).button({
  icons: {
    primary: "ui-icon-triangle-1-s"

  },
  text: false
}).removeClass("ui-corner-all").addClass("ui-corner-right ui-combobox-toggle").click(function() {

                // close if already visible
                if (input.autocomplete("widget").is(":visible")) {
                  input.autocomplete("close");
                  return;
                }

                // work around a bug (likely same cause as #5265)
                $(this).blur();


                // pass empty string as value to search for, displaying all results
                input.autocomplete("search", "");

                input.focus();



              });

},

destroy: function() {
  this.wrapper.remove();
  this.element.show();
  $.Widget.prototype.destroy.call(this);
}
});
})(jQuery);

$(function() {

  $("#combobox").combobox();
  
  $("#toggle").click(function() {
    $("#combobox").toggle();


  });

});


</script>

