<div class="espacio_sias" data-ckeck="false">
	<img src="{{asset('images/cadena/sias.png')}}">	
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>


<div class="head_empresa">
	<h1>SIAS</h1>
</div>

@if($lista_sias == Null)

nada
				@else


<div class="lista-empresas"> 

<?php  $i = 1 ?>
 @foreach($lista_sias as $lista_sia)


<div class="row post_empresa anunciantes" id="post_sias<?php echo $i ?>">
	<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>
	<div class="col-xs-3">

				 <img id="img_sias<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_sia->imagen}}"/>
</div>
	<div class="col-xs-7">
		<h1 class="titulo_sias<?php echo $i ?>">{{$lista_sia->nombre}}</h1>
		<ul class="r_dtalles_producto">
			<li>{{$lista_sia->continente}}</li>
			<li>{{$lista_sia->pais}}</li>
			<li>Especialidad</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="sias<?php echo $i ?>">
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

<?php  $i ++ ?>
 @endforeach

</div>
@endif


@if($lista_sias == Null) 
nada
				@else
<script>
$( document ).ready(function() {
<?php

$j = 1;
while ($j <= $i){


	echo '$("#sias'.$j.'").click(function(event) {'."\n";


	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_sias'.$j.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_sias'.$j.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_transporte'.$j.'").text();'."\n";
	echo '$(".espacio_sias").empty();'."\n";
	echo '$(\'.espacio_sias\').attr(\'data-ckeck\', true);';
	echo '$(\'.espacio_sias\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>SIAS</span></div>\'));'."\n";

	echo '$(\'.boton_conectar\').show(\'last\');'."\n";

	

		echo '});'."\n";

$j++;

}

	

?>
});
</script>

@endif