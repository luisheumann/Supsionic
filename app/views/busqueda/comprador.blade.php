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


$lista_importadoresalls = null;


///PRODUCTO


if (!$producto == Null && $origen == Null && $destino == Null && $categoria == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	 ->where('productos.nombre',$producto)
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();


}




///// PRODUCTO
////  ORIGEN
////  DESTINO
if (!$producto == Null && !$origen == Null && !$destino == Null && $categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	 ->where('productos.nombre',$producto)
     	 ->where('ruta_exportador.pais_origen',$origen)
     	 ->where('ruta_exportador.pais_destino',$destino)
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}



///// PRODUCTO

////  DESTINO
if (!$producto == Null && $origen == Null && !$destino == Null && $categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	 ->where('productos.nombre',$producto)

     	 ->where('ruta_exportador.pais_destino',$destino)
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}


///// PRODUCTO
////  ORIGEN

if (!$producto == Null && !$origen == Null && $destino == Null && $categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	 ->where('productos.nombre',$producto)
     	 ->where('ruta_exportador.pais_origen',$origen)
     	
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}

///// DESTINO
////  ORIGEN

if ($producto == Null && !$origen == Null && !$destino == Null && $categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	
     	 ->where('ruta_exportador.pais_origen',$origen)
     	 ->where('ruta_exportador.pais_destino',$destino)
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}

//////////////////
////  ORIGEN

if ($producto == Null && !$origen == Null && $destino == Null && $categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
     	
     	 ->where('ruta_exportador.pais_origen',$origen)
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	  ->groupBy('img_productos.producto_id')
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}



//////////////////

////  CATEGORIA

if ($producto == Null && $origen == Null && $destino == Null && !$categoria == Null && $country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
		 ->join('sias_categoria_interes', 'productos.id', '=', 'sias_categoria_interes.producto_id')
     	
     	 ->where('sias_categoria_interes.categoria_id',$categoria)
     	 ->groupBy('ruta_exportador.producto_id')
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	 
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




}


////  REGION

switch ($country) {
	case 'América':
	$country = 2;
	break;
	case 'Africa':
	$country = 1;
	break;
	case 'Asia':
	$country = 3;
	break;
	case 'Europa':
	$country = 4;
	break;
	case 'Oceanía':
	$country = 5;
	break;
}

if ($producto == Null && $origen == Null && $destino == Null && $categoria == Null && !$country == Null) {
		$lista_importadoresalls = Productos::
		 join('empresas', 'productos.empresa_id', '=', 'empresas.id')
		 ->join('ruta_exportador', 'productos.id', '=', 'ruta_exportador.producto_id')
		 ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
		 ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
		 ->join('paises', 'ruta_exportador.pais_destino', '=', 'paises.id')
	     ->where('paises.continente',$country)
       ->groupBy('ruta_exportador.producto_id')
     	  ->select('img_productos.imagen as imagenes', 'empresas.nombre as nombre', 'productos.nombre as productos', 'productos.venta_minima', 'productos.stock', 'productos.unidad_id')
     	 
		 ->get();

		  if (!$lista_importadoresalls->count()){

		$lista_importadoresalls = null;
	}




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



   


</style>
<div class="espacio_empresa" data-ckeck="false">
	<img src="{{asset('images/cadena/comprador.png')}}">
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>

<div class="head_empresa">
	<h1>Productos</h1>
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
	<div class="imagen_producto">







	@if(!$lista_importadoresall->imagenes == null)
			<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/productos/{{$lista_importadoresall->imagenes}}"/>

			<img style="display:none" id="imagenproducto<?php echo $i ?>" height="80" width="80" alt="Image" title="@if ($lista_importadoresall->imagenes == null){{$img= $lista_importadoresall->imagenes}} @else {{$img= 'producto.png'}} @endif"  src="/uploads/productos/{{$img}}"/>

			@else
			<img id="product_img<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
			



			@endif





</div>

	<div class="detalle_producto">
		<h1 class="titulo_product<?php echo $i ?>">{{$lista_importadoresall->nombre}}</h1>
		<ul class="dtalles_producto">


		<li>Interes:{{$lista_importadoresall->productos}}</li>
				@if ($lista_importadoresall->venta_minima == 0)
				<li>  Min:  Ilimitado</li>
				@else
				<li> Min: {{$lista_importadoresall->venta_minima}} @if (!$lista_importadoresall->unidad_id == null) {{Unidades::find($lista_importadoresall->unidad_id)->nombre}} @endif</li>
				@endif


				@if ($lista_importadoresall->stock == 0)
				<li>  Max: Ilimitado</li>
				@else
				<li> Max:{{$lista_importadoresall->stock}}  @if (!$lista_importadoresall->unidad_id == null) {{Unidades::find($lista_importadoresall->unidad_id)->nombre}} @endif</li>
				@endif
	
	</div>	


	<div class="opcion_producto">
		<button class="btn-borde btn-borde-ai btn_selec" id="empresa<?php echo $i ?>">
			Seleccionar
		</button>	
		<br>
		<!--<img src="{{asset('images/productos/start.png')}}">

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




<!--                         INTERES -->
<!--                         INTERES -->
<!--                         INTERES -->






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

	echo '$(\'.espacio_empresa_emp_select\').append((\'<div  class="contenido_producto2"><span class="tpc2"> \'+titulo2+\' </span></div>\'));'."\n";



	echo '$(\'.espacio_empresa\').append((\'<img  src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Vendedor</span></div>\'));'."\n";

		echo '$(\'.espacio_empresa_select\').append((\'<img  src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Vendedor</span></div>\'));'."\n";




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