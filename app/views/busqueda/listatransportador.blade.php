<?php


if (isset($_GET["producto"]) && !empty($_GET["producto"])) {
	$producto = $_GET['producto'];
}else{
	$producto = null;
}

if (isset($_GET["categoria"]) && !empty($_GET["categoria"])) {
	$categoria = $_GET['categoria'];
}else{
	$categoria = null;
}


if (isset($_GET["origen"]) && !empty($_GET["origen"])) {
	$origen = $_GET['origen'];
}else{
	$origen = null;
}

if (isset($_GET["destino"]) && !empty($_GET["destino"])) {
	$destino = $_GET['destino'];
}else{
	$destino = null;
}

if (isset($_GET["country"]) && !empty($_GET["country"])) {
	$country = $_GET['country'];
}else{
	$country = null;
}




///// PRODUCTO
////  ORIGEN
////  DESTINO

if (!$producto == Null && !$origen == Null && !$destino == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		 ->join('ruta_importador', 'intereses_importador.id', '=', 'ruta_importador.intereses_importador_id')
		 ->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		->where('intereses_importador.productos',$producto)
		->where('ruta_importador.pais_destino',$origen)
		->where('ruta_importador.pais_origen',$destino)
		 ->get();


}


////  ORIGEN
////  DESTINO

if (!$origen == Null && !$destino == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		 ->join('ruta_importador', 'intereses_importador.id', '=', 'ruta_importador.intereses_importador_id')
		 ->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		->where('ruta_importador.pais_destino',$origen)
		->where('ruta_importador.pais_origen',$destino)
		 ->get();


}
///// TODO VACIO

if ($producto == Null && $origen == Null && $destino == Null && $categoria == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		 ->get();


}

///// CATEGORIA

if (!$categoria == Null) {
	$lista_transportadores = SiasCategoriaInteres::
	Where('categoria_id',$categoria)
	->Where('intereses_importador_id','<>',0)
	->get();
} 


///// PRODUCTO

if (!$producto == Null && $origen == Null && $destino == Null && $categoria == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		 ->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
     	 ->where('intereses_importador.productos',$producto)
		 ->get();


}

///// REGION
///// DESTINO

if (!$country == Null && $origen == Null && !$destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		 ->join('ruta_importador', 'intereses_importador.id', '=', 'ruta_importador.intereses_importador_id')
		 ->join('paises', 'ruta_importador.pais_destino', '=', 'paises.id')
		 ->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		->where('paises.continente',$country)
		->where('ruta_importador.pais_origen',$destino)
		
		 ->get();


}
///// destino

if ($country == Null && $origen == Null && !$destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		 ->get();

}

///// origen

if ($country == Null && !$origen == Null && $destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		 ->get();

}

if (!$country == Null && !$origen == Null && $destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = DB::table('intereses_importador')
		->join('empresas', 'intereses_importador.empresa_id', '=', 'empresas.id')
		 ->get();

}


?>



<style type="text/css">
	
.detalle_producto {
    width: 250px;
  
}

.dtalles_producto {
  float: left;
 font-size: 11px;

}

ul.dtalles_producto {
    height: 50px;
    width: 100px;
}



</style>
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
		@if($lista_transportadores == Null)
	<style>
	.lista-empresas {
  background-color: #EDEDED;
}
	</style>
<br>
<center><b>No Existen Coincidencias</b></center>
				@else


 @foreach($lista_transportadores as $lista_exportadore)
<!--<div class="row post_empresa anunciantes" id="post_empresa">-->
<div class="row post_empresa" id="post_empresa<?php echo $i ?>">
	<!--<p class="anuncio_producto">
	  <i class="fa fa-bullhorn"></i> ANUNCIOS
	</p>-->
	<div class="col-xs-3">

			@if($lista_exportadore->imagen != null)
			 <img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_exportadore->imagen}}"/>

			  <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_exportadore->imagen}}"/>
			@else
 			<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>

 			 <img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
			@endif
			
			
			 
			

	</div>


	



	<div class="detalle_producto">
		<h1 class="titulo_product<?php echo $i ?>">{{$lista_exportadore->nombre}}</h1>
		<ul class="dtalles_producto">
			
				<li> Interesado en : {{$lista_exportadore->productos}}</li>
				
		</ul>
	</div>	
	<div class="opcion_producto">
		<button class="btn-borde btn-borde-ai btn_selec" id="empresa<?php echo $i ?>">
			Seleccionar
		</button>	
		<!--<br>
		<img src="{{asset('images/productos/start.png')}}">

		<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>		-->
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