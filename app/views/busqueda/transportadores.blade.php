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

<?php  $i = 1 ?>

	
				@if($lista_transportadores == Null)
	<style>
	.lista-empresas {
  background-color: #EDEDED;
}
	</style>
<br>
<center><b>No Existen Coincidencias</b></center>
				@else
							
			


 @foreach($lista_transportadores as $lista_transportadore)
 

<div class="row post_empresa" id="post_transporte<?php echo $i ?>">
<!--	<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>-->
	<div class="col-xs-3">

		 <img id="img_trans<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_transportadore->imagen}}"/>


	
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_transporte<?php echo $i ?>">{{$lista_transportadore->nombreemp}}</h1>
		<ul class="r_dtalles_producto">
			<li>{{$lista_transportadore->continente}}</li>
			<li> {{$lista_transportadore->pais}} </li>
			<li>{{$lista_transportadore->categoria}} </li>
			<li>Especialidad</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="transporte<?php echo $i ?>">
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
	@endif
</div>



@if($lista_transportadores == Null) 
nada
				@else

<script>
$( document ).ready(function() {
<?php

$j = 1;
while ($j <= $i){


	echo '$("#transporte'.$j.'").click(function(event) {'."\n";
echo '$(\'.espacio_transporte\').attr(\'data-ckeck\', true);'."\n";

	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_transporte'.$j.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_trans'.$j.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_transporte'.$j.'").text();'."\n";
	echo '$(".espacio_transporte").empty();'."\n";
	echo '$(\'.espacio_transporte\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Transportador</span></div>\'));'."\n";

	echo '$(\'.boton_conectar\').show(\'last\');'."\n";

	

		echo '});'."\n";

$j++;

}

	

?>
});
</script>

@endif