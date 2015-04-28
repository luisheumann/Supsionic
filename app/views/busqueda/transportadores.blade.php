<div class="espacio_transporte" data-ckeck="false">
	<img src="{{asset('images/cadena/transportador.png')}}">	
</div>

<div class="boton_conectar" style="display:none">
	<div class="marquee">
		<p><a class="mostar_mi_cadena">CONECTAR</a></p>
		<p><a class="mostar_mi_cadena">CLIC AQUÍ PARA VER SU CADENA</a></p>
	</div>
</div>

<div class="head_empresa">
	<h1>Transportadores</h1>
</div>
<div class="lista-empresas"> 


 @foreach($transportadores as $transportadore)

<div class="row post_empresa anunciantes" id="post_transporte1">
	<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>
	<div class="col-xs-3">
		<img src="{{asset('images/transporte/empresa1.png')}}" id="img_trans1">
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_transporte1">{{$transportadore->empresas->nombre}}</h1>
		<ul class="r_dtalles_producto">
			<li>Región</li>
			<li>Ubicación: {{$transportadore->empresas->pais_id}}</li>
			<li>Categoría de transporte: </li>
			<li>Especialidad</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="transporte1">
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

 @endforeach

</div>


<script>
$( document ).ready(function() {
<?php

$i = 1;
while ($i < 12){


	echo '$("#transporte'.$i.'").click(function(event) {'."\n";


	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_transporte'.$i.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_trans'.$i.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_transporte'.$i.'").text();'."\n";
	echo '$(".espacio_transporte").empty();'."\n";
	echo '$(\'.espacio_transporte\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Transportador</span></div>\'));'."\n";

	echo '$(\'.boton_conectar\').show(\'last\');'."\n";

	echo 'var data_t = $( ".espacio_transporte" ).attr(\'data-ckeck\');'."\n";
	echo 'var data_s = $( ".espacio_sias" ).attr(\'data-ckeck\');'."\n";


	echo '  if ( data_t == \'false\' ) {'."\n";
	echo '  $(".espacio_transporte").empty();'."\n";
	echo '$(\'.espacio_transporte\').append((\'<img src="images/cadena/recomendado_transportador.png">\'));'."\n";	
	echo '}'."\n";
	echo 'if ( data_s == \'false\' ) {'."\n";
	echo '$(".espacio_sias").empty();'."\n";
	echo  '$(\'.espacio_sias\').append((\'<img src="images/cadena/recomendado_sias.png">\'));'."\n";
	echo  '}'."\n";

		echo '});'."\n";

$i++;

}

	

?>
});
</script>