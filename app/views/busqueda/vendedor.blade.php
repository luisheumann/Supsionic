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
	
	<?php  $i = 1 ?>
 @foreach($lista_importadores as $lista_importadore)

<div class="row post_empresa anunciantes" id="post_empresa<?php echo $i ?>">
	<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>
	<div class="col-xs-3">
		<img src="{{asset('images/productos/zapato1.png')}}" id="product_img<?php echo $i ?>">
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_product<?php echo $i ?>">{{$lista_importadore->nombre}}</h1>
		<ul class="r_dtalles_producto">
			<li>Región22 - Ubicación</li>
			<li>Cantidad disponible</li>
			<li>XX mín XX máx</li>
			<li>Términos de pago</li>
		</ul>
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

<?php echo $lista_importadores->count() ?>

<script>
$( document ).ready(function() {
<?php





$i = 1;
while ($i <= $lista_importadores->count() ){


	echo '$("#empresa'.$i.'").click(function(event) {'."\n";

	echo '$(\'.espacio_empresa\').attr(\'data-ckeck\', true);'."\n";
	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_empresa'.$i.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_img'.$i.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_product'.$i.'").text();'."\n";
	echo '$(".espacio_empresa").empty();'."\n";
	echo '$(\'.espacio_empresa\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Vendedor</span></div>\'));'."\n";

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

@section('estilos')
@parent
	{{HTML::style('css/lista_empresas.css')}}
@stop