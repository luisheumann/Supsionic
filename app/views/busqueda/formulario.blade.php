
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


		      <input type="text" class="form-control typeahead" id="producto" name="producto" placeholder="PRODUCTO">
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

	      	 	<option value="África">Africa</option>
	      	 	<option value="América">América</option>
	      	 	<option value="Asia">Asia</option>
	      	 	<option value="Europa">Europa</option>
	      	 	<option value="Oceanía">Oceanía</option>
	


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





$('#sites input:radio').addClass('input_hidden');

$('#sites label').click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
});

$( document ).ready(function() {


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




	$('#perfil').change(function(event) {
		/* Act on the event */
   		var optionSelected = $(this).find("option:selected");
     	var valueSelected  = optionSelected.val();
     	var textSelected   = optionSelected.text();		
		if(valueSelected==1)
		{
			$('#cambio_vista').attr('data-cambio', 1); // data-chek como true
			$('#vista_comprador').hide();
			$('#vista_vendedor').show();

		    $(".espacio_transporte").empty();
		    $('.espacio_transporte').append(('<img src="images/cadena/recomendado_transportador.png">'));	
		    
		    
			$(".espacio_sias").empty();
		    $('.espacio_sias').append(('<img src="images/cadena/recomendado_sias.png">'));	

		}
		if(valueSelected==2)
		{
			$('#cambio_vista').attr('data-cambio', 2); // data-chek como true
			$('#vista_comprador').show();
			$('#vista_vendedor').hide();

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
