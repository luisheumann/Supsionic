

<div class="espacio_empresa" data-ckeck="false">
	<img src="{{asset('images/cadena/comprador.png')}}">
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>

<div class="head_empresa">
	<h1>Vendedor</h1>
</div>
<div class="lista-empresas"> 

	
	<?php  $i = 1;




	?>
 @foreach($lista_importadoresalls as $lista_importadoresall)
<!--<div class="row post_empresa anunciantes" id="post_empresa">-->
<div class="row post_empresa" id="post_empresa<?php echo $i ?>">
	<!--<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>-->
	<div class="col-xs-3">
			 <img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->imagen}}"/>
			 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->imagen}}"/>


	</div>


	



	<div class="col-xs-7">
		<h1 class="titulo_product<?php echo $i ?>">{{$lista_importadoresall->nombre}}</h1>
		<ul class="r_dtalles_producto">
			@if($lista_importadoresall->continente == Null) 
				@else	
				{{$lista_importadoresall->continente}} -{{$lista_importadoresall->pais}}							
				@endif</li>
				

@if($lista_importadoresall->NombrePoducto == Null) 
						<li>Producto:{{$lista_importadoresall->productos}} 	</li>		
				@else	
						<li>Producto: {{$lista_importadoresall->NombrePoducto}}</li>	
				@endif
	
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="empresa<?php echo $i ?>">
			Seleccionar
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

</div> <!-- / lista-empresa  -->



<script>
$( document ).ready(function() {
<?php


$j = 1;
while ($j <= $i ){


	echo '$("#empresa'.$j.'").click(function(event) {'."\n";

	echo '$(\'.espacio_empresa\').attr(\'data-ckeck\', true);'."\n";
	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_empresa'.$j.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#product_img'.$j.'\').attr(\'src\');'."\n";
	//echo 'var imagen2 = $(\'#imagenproducto'.$i.'\').attr(\'src\');'."\n";
	echo 'var titulo2 = $(\'#imagenproducto'.$j.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_product'.$j.'").text();'."\n";
	
	echo '$(".espacio_empresa").empty();'."\n";

	echo '$(\'.espacio_empresa\').append((\'<div style="display:none" class="contenido_producto2"><span class="tpc2"> \'+titulo2+\' </span></div>\'));'."\n";

	echo '$(\'.espacio_empresa\').append((\'<img  src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Vendedor</span></div>\'));'."\n";

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

$j++;

}

	

?>
});
</script>

@section('estilos')
@parent
	{{HTML::style('css/lista_empresas.css')}}
@stop