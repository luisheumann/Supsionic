<div class="espacio_sias" data-ckeck="false">
	<img src="{{asset('images/cadena/sias.png')}}">	
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>


<div class="head_empresa">
	<h1>SIAS</h1>
</div>
<div class="lista-empresas"> 

<div class="row post_empresa anunciantes" id="post_sias1">
	<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>
	<div class="col-xs-3">
		<img src="{{asset('images/sias/empresa1.png')}}" id="img_sias1">
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_sias1">Corey</h1>
		<ul class="r_dtalles_producto">
			<li>Región</li>
			<li>Ubicación</li>
			<li>Especialidad</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="sias1">
			Armar
		</button>	
		<br>
		<img src="{{asset('images/productos/start.png')}}">

		<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>		
	</div>
</div>

<div class="row post_empresa" id="post_sias2">
	<div class="col-xs-3">
		<img src="{{asset('images/sias/empresa2.png')}}" id="img_sias2">
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_sias2">E-SIAS-2</h1>
		<ul class="r_dtalles_producto">
			<li>Región</li>
			<li>Ubicación</li>
			<li>Especialidad</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="sias2">
			Armar
		</button>	
		<br>
		<img src="{{asset('images/productos/start.png')}}">

		<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>		
	</div>
</div>

</div>

<script>
$( document ).ready(function() {

	$("#sias1").click(function(event) {

	
		$('.lista-empresas').height(517);
		$("#post_sias1").addClass('activo_check').siblings().removeClass('activo_check');
		var imagen = $('#img_sias1').attr('src');
		var titulo = $(".titulo_sias1").text();
		$(".espacio_sias").empty();

		$('.espacio_sias').attr('data-ckeck', true);

	    $('.espacio_sias').append(('<img src=" '+imagen+' "> <div class="contenido_producto"><span class="tpc"> '+titulo+' </span><br><span>SIAS</span></div>'));	
	    $('.boton_conectar').show('last');

	});

	$("#sias2").click(function(event) {

		$('.lista-empresas').height(517);
		$("#post_sias2").addClass('activo_check').siblings().removeClass('activo_check');
		var imagen = $('#img_sias2').attr('src');
		var titulo = $(".titulo_sias2").text();
		$(".espacio_sias").empty();

		$('.espacio_sias').attr('data-ckeck', true);

	    $('.espacio_sias').append(('<img src=" '+imagen+' "> <div class="contenido_producto"><span class="tpc"> '+titulo+' </span><br><span>SIAS</span></div>'));	
	    $('.boton_conectar').show('last');
	});
}); // fin ready	
</script>