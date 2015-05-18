<div class="busqueda">

<form class="form-horizontal form_home_buscar" id="busqueda" action="busqueda">

<img src="{{asset('images/home/arme_su_cadena.png')}}" class="titulo_busqueda">


<div class="paso_1">
	<span class="num"><img src="{{asset('images/home/uno.png')}}" alt=""></span>
	<span class="num_text">Que desea hacer.</span>
</div>

<div id="sites">
    <input type="radio" name="site" id="so" value="stackoverflow" />
    <label for="so">
    	<img src="{{asset('images/home/icon_exportar.png')}}"/>
    </label>

	<img src="{{asset('images/home/separa_radio.png')}}"/>

    <input type="radio" name="site" id="sf" value="serverfault" />
    <label for="sf">
    	<img src="{{asset('images/home/icon_importar.png')}}"/>
    </label>

	<img src="{{asset('images/home/separa_radio.png')}}"/>

    <input type="radio" name="site" id="su" value="superuser" />
    <label for="su">
    	<img src="{{asset('images/home/icon_transportar.png')}}"/>
    </label>

	<img src="{{asset('images/home/separa_radio.png')}}"/>

    <input type="radio" name="site" id="sias" value="sias" />
    <label for="sias">
    	<img src="{{asset('images/home/icon_sias.png')}}"/>
    </label> 
</div>

<div class="salto_linea"></div>

<div class="campos_busq">

   <div class="row">
		<div class="col-xs-6">
		  <div class="form-group">
		    <label for="categoria" class="col-xs-2 control-label">
		    	<img src="{{asset('images/home/dos.png')}}" alt="">
		    </label>
		    <div class="col-xs-10">
		     <select name="categoria" id="categoria" class="form-control select_region">
		        <option value="">CATEGORÍA</option>
			      @foreach($categorias as $categoria)
					 	<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
			      @endforeach	
		      </select>
		    </div>
		  </div>
		</div>

		<div class="col-xs-6">
		  <div class="form-group">
		    <label for="producto" class="col-xs-2 control-label">
		    	<img src="{{asset('images/home/tres.png')}}" alt="">
		    </label>
		    <div class="col-xs-10">
		    <div id="prefetch">


		      <input type="text" class="form-control input-lg typeahead" id="producto" placeholder="PRODUCTO">
		    </div>
		    </div>
		  </div>
		</div>	  
	 </div>

	<div class="salto_linea"></div>

	  <div class="form-group">
	    <label for="region" class="col-xs-1 control-label">
	    	<img src="{{asset('images/home/cuatro.png')}}">
	    </label>
	    <div class="col-xs-11">
	      <select name="region" id="region" class="form-control select_region">
	      	<option value="">REGIÓN</option>
	      	<option value="">Colombia</option>
	      	<option value="">Ecuador</option>
	      	<option value="">Perú2</option>
	      </select>
	    </div>
	  </div>

	<div class="salto_linea"></div>

   <div class="row">
		<div class="col-xs-6">
		  <div class="form-group">
		    <label for="destino" class="col-xs-2 control-label">
		    	<img src="{{asset('images/home/cinco.png')}}" alt="">
		    </label>
		    <div class="col-xs-10">
		      <select name="destino" id="destino" class="form-control select_region">
		        <option value="">PAÍS DE DESTINO</option>
			      @foreach($paises as $pais)
					 	<option value="{{$pais->id}}">{{$pais->nombre}}</option>
			      @endforeach	
		      </select>
		    </div>
		  </div>
		</div>

		<div class="col-xs-6">
		  <div class="form-group">
		    <label for="origen" class="col-xs-2 control-label">
		    	<img src="{{asset('images/home/seix.png')}}" alt="">
		    </label>
		    <div class="col-xs-10">
		      <select name="origen" id="origen" class="form-control select_region">
		        <option value="">PAÍS DE ORIGEN</option>
			      @foreach($paises as $pais)
					 	<option value="{{$pais->id}}">{{$pais->nombre}}</option>
			      @endforeach	
		      </select>
		    </div>
		  </div>
		</div>	  
	 </div>

	 
	</div>

</form>
 <div class="salto_linea"></div>	  	  	
<a target="top" href="/busqueda?categoria=&region=&destino=&origen=&country=&perfil=&selectProducto=&producto=">
	  <button  class="btn-borde btn-borde-n">BUSCAR NEGOCIO</button>
</a>
</div>

<script>
	$('#sites input:radio').addClass('input_hidden');
	$('#sites label').click(function() {
	    $(this).addClass('selected').siblings().removeClass('selected');
	});
</script>

{{HTML::style('css/busqueda.css')}}
{{HTML::script('js/typeahead.bundle.js')}}

