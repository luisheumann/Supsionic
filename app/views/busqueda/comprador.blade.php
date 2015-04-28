<div class="espacio_comprador" data-ckeck="false">
	<img src="{{asset('images/cadena/comprador.png')}}">
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>

<div class="head_empresa">
	<h1>Comprador</h1> 
</div>
<div class="lista-empresas"> 
	

<?php  $i = 1 ?>
<!-- Comprador 1 -->
 @foreach($productos as $producto)


<div class="row post_empresa " id="post_comprador<?php echo $i ?>">
	<!--<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>-->
	<div class="col-xs-3">
		<img src="{{asset('images/empresas/empresa1.png')}}" id="img_comprador1" class="img_comprador">
	</div>
	<div class="col-xs-7">
		<h1 class="titulo_comprador<?php echo $i ?>">{{$producto->nombre}}</h1>
		<ul class="r_dtalles_producto">
			<li>Región - Ubicación @if($producto->ruta_exportador->count() > 0) 
										@if(!is_null($producto->ruta_exportador->first()->pais))
											{{$producto->ruta_exportador->first()->pais->nombre}} 
										@endif
									@endif


</li>
			<li>Cantidad disponible</li>
			<li>{{$producto->venta_minima}} mín {{$producto->produccion_mes}} máx</li>
			<li>Términos de pago</li>
		</ul>
	</div>	
	<div class="col-xs-2">
		<button class="btn-borde btn-borde-ai btn_selec" id="comprador<?php echo $i ?>">
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


<input type="text" id="producto-item" value="<?php echo $productos->count() ?>" />

<script>
$( document ).ready(function() {
<?php

$i = 1;
while ($i < 12){


	echo '$("#comprador'.$i.'").click(function(event) {'."\n";

	echo '$(\'.espacio_comprador\').attr(\'data-ckeck\', true);'."\n";
	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_comprador'.$i.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_comprador'.$i.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_comprador'.$i.'").text();'."\n";
	echo '$(".espacio_comprador").empty();'."\n";
	echo '$(\'.espacio_comprador\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Comprador</span></div>\'));'."\n";

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