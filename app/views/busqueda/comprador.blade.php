

<div class="espacio_empresa" data-ckeck="false">
	<img src="{{asset('images/cadena/comprador.png')}}">
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>

<div class="head_empresa">
	<h1>Productos/Intereses</h1>
</div>
<div class="lista-empresas"> 

	<?php  $i = 1;?>

	@if($lista_importadoresalls == Null)
	<style>
	.lista-empresas {
  background-color: #EDEDED;
}
	</style>
<br>
<center><b>No Existen Coincidencias</b></center>
				@else


 @foreach($lista_importadoresalls as $lista_importadoresall)
<!--<div class="row post_empresa anunciantes" id="post_empresa">-->
<div class="row post_empresa" id="post_empresa<?php echo $i ?>">
	<!--<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>-->
	<div class="col-xs-3">

@if($lista_importadoresall->imagen != null and $lista_importadoresall->perfil_id ==1 )
<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/productos/{{$lista_importadoresall->imagen}}"/>
 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->eimagen}}"/>
@endif
@if($lista_importadoresall->imagen == null and $lista_importadoresall->perfil_id ==1 )
<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->imagen}}"/>
 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->eimagen}}"/>
@endif
@if($lista_importadoresall->imagen != null and $lista_importadoresall->perfil_id ==2 )
<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->imagen}}"/>
 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_importadoresall->eimagen}}"/>
@endif
@if($lista_importadoresall->imagen == null and $lista_importadoresall->perfil_id ==2 )
<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
@endif

</div>

	<div class="col-xs-7">
		<h1 class="titulo_product<?php echo $i ?>">{{$lista_importadoresall->nombre}}</h1>
		<ul class="r_dtalles_producto">
			<li>{{$lista_importadoresall->NombrePoducto}}</li>
			<li>{{$lista_importadoresall->ncontinente}} -{{$lista_importadoresall->pais}}</li>							
			@if($lista_importadoresall->stock != Null)
			<li>Stock:{{$lista_importadoresall->stock}}</li>
			@endif

				@if($lista_importadoresall->venta_minima != Null)
			<li>Min:{{$lista_importadoresall->venta_minima}} Max:{{$lista_importadoresall->produccion_mes}}</li>
			@endif

			@if($lista_importadoresall->condiciones_pago != Null) 
			<li>Condiciones de pago:{{$lista_importadoresall->condiciones_pago}}</li>			
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
 
 @endif

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