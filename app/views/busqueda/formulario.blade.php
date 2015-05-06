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


<select name="perfil" id="perfil"  class="form-control">
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
<select name="categoria" id="categoria"  class="form-control">
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

<div id="prefetch">
<?php 




if(isset($_GET['producto'])) {
    $test = $_GET['producto'];
} else {
    $test = '';
}





	?>

<input type="text" class="form-control typeahead" id="producto" name="producto" value="<?php echo $test ?>" placeholder="PRODUCTO">
</div>



</div>
</div>

<div class="salto_linea"></div>

<div class="form-group">
<label for="region" class="col-xs-2 control-label">
<img src="{{asset('images/home/cuatro.png')}}" alt="">
</label>
<div class="col-xs-10">


<select name="country" class="country" id="country" class="form-control">
<option selected="selected" value="">REGION</option>

<option value="1">Africa</option>
<option value="2">América</option>
<option value="3">Asia</option>
<option value="4">Europa</option>
<option value="5">Oceanía</option>



</select>
</div>
</div>

<div class="salto_linea"></div>
<div class="form-group">
<label for="destino" class="col-xs-2 control-label num_form">
<img src="{{asset('images/home/cinco.png')}}" alt="">
</label>
<div class="col-xs-10">

<select name="origen" class="city" id="origen" class="form-control">
<option selected="selected" value ="">PAÍS DE ORIGEN</option>
</select>

</div>
</div>

<div class="form-group">
<label for="origen" class="col-xs-2 control-label num_form">
<img src="{{asset('images/home/seix.png')}}" alt="">
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





<script>







document.getElementById("perfil").value = '<?php echo $_GET['perfil']?>';
document.getElementById("categoria").value = '<?php echo $_GET['categoria']?>';
document.getElementById("country").value = '<?php echo $_GET['country']?>';



var idcountry ='<?php echo $_GET['country']?>';

if (idcountry !='') {


var countryId = '<?php echo $_GET['country']?>';

$ciudaditems = $('.cityItems').remove();
$.get('../api/filtropais/'+countryId, function(data){

$.each(data[0], function(index, element){
console.log(index);
$('select#origen').append('<option value="'+index+'" class="cityItems">'+element+'</option>')
});
}, 'json');

}else{

	 $('select#country').change(function(){
        var countryId = $(this).val();

        $ciudaditems = $('.cityItems').remove();
        $.get('../api/filtropais/'+countryId, function(data){

            $.each(data[0], function(index, element){
            console.log(index);
                $('select#origen').append('<option value="'+index+'" class="cityItems">'+element+'</option>')
            });
        }, 'json');
    });

}







$('#sites input:radio').addClass('input_hidden');

$('#sites label').click(function() {
$(this).addClass('selected').siblings().removeClass('selected');
});

$( document ).ready(function() {


var delay=2500; //1 seconds

setTimeout(function(){

document.getElementById("origen").value = '<?php echo $_GET['origen']?>';
}, delay);


 
document.getElementById("destino").value = '<?php echo $_GET['destino']?>';







$('#perfil').change(function(event) {
/* Act on the event */
var optionSelected = $(this).find("option:selected");
var valueSelected  = optionSelected.val();
var textSelected   = optionSelected.text();
if(valueSelected==1)
{

var pach = "/api/buscar_cadena?perfil=1&categoria=&producto=&country=&origen=&destino=";
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

var pach = "/api/buscar_cadena?perfil=2&categoria=&producto=&country=&origen=&destino=";
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

         	var pach = "/api/buscar_cadena?perfil=3&categoria=&producto=&country=&origen=&destino=";
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

var pach = "/api/buscar_cadena?perfil=4&categoria=&producto=&country=&origen=&destino=";
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
{{HTML::script('js/typeahead.bundle.js')}}