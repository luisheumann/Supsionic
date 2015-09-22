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

$lista_transportadores = null;



///// CATEGORIA

if (!$categoria == Null  && $origen == Null && $producto == Null  && $destino == Null  && $country == Null ) {
	$lista_transportadores = SiasCategoriaInteres::
	join('intereses_transporte', 'sias_categoria_interes.intereses_transporte_id', '=', 'intereses_transporte.id')
	->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
	->Where('sias_categoria_interes.categoria_id',$categoria)
	->get();

	if (!$lista_transportadores->count()){

		$lista_transportadores = null;
	}
} 


///// PRODUCTO
////  ORIGEN
////  DESTINO

if (!$producto == Null && !$origen == Null && !$destino == Null && $categoria == Null  && $country == Null) {
		$lista_transportadores = InteresesTransportador::
		join('ruta_transporte', 'intereses_transporte.id', '=', 'ruta_transporte.intereses_transporte_id')
		 ->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
		->where('intereses_transporte.productos',$producto)
		->where('ruta_transporte.pais_destino',$origen)
		->where('ruta_transporte.pais_origen',$destino)
		 ->get();

		 if (!$lista_transportadores->count()){

		$lista_transportadores = null;
	}


}


////  ORIGEN
////  DESTINO

if (!$origen == Null && !$destino == Null && $producto == Null  && $categoria == Null  && $country == Null) {
		$lista_transportadores = InteresesTransportador::
		join('ruta_transporte', 'intereses_transporte.id', '=', 'ruta_transporte.intereses_transporte_id')
		 ->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
		->where('ruta_transporte.pais_destino',$origen)
		->where('ruta_transporte.pais_origen',$destino)
		 ->get();

		 if (!$lista_transportadores->count()){

		$lista_transportadores = null;
	}


}

///// PRODUCTO

if (!$producto == Null && $origen == Null && $destino == Null && $categoria == Null  && $country == Null) {
		$lista_transportadores = InteresesTransportador::
		join('ruta_transporte', 'intereses_transporte.id', '=', 'ruta_transporte.intereses_transporte_id')
		 ->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
	     ->where('intereses_transporte.productos',$producto)
	     ->groupBy('intereses_transporte.id')
		 ->get();

		 if (!$lista_transportadores->count()){

		$lista_transportadores = null;
	}


}

///// REGION
///// DESTINO


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

if (!$country == Null && $origen == Null && !$destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = InteresesTransportador::
		join('ruta_transporte', 'intereses_transporte.id', '=', 'ruta_transporte.intereses_transporte_id')
		 ->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
	     ->join('paises', 'ruta_transporte.pais_destino', '=', 'paises.id')
	     ->where('paises.continente',$country)
		 ->where('ruta_transporte.pais_origen',$destino)
		 ->select('empresas.nombre as nombre', 'intereses_transporte.productos as productos', 'intereses_transporte.min', 'intereses_transporte.max', 'intereses_transporte.min_medida', 'empresas.imagen')
		 ->get();

		 if (!$lista_transportadores->count()){

		$lista_transportadores = null;
	}

}



///// REGION


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

if (!$country == Null && $origen == Null && $destino == Null && $categoria == Null && $producto == Null) {
		$lista_transportadores = InteresesTransportador::
		join('ruta_transporte', 'intereses_transporte.id', '=', 'ruta_transporte.intereses_transporte_id')
		 ->join('empresas', 'intereses_transporte.empresa_id', '=', 'empresas.id')
	     ->join('paises', 'ruta_transporte.pais_destino', '=', 'paises.id')
	     ->where('paises.continente',$country)
		 ->select('empresas.nombre as nombre', 'intereses_transporte.productos as productos', 'intereses_transporte.min', 'intereses_transporte.max', 'intereses_transporte.min_medida', 'empresas.imagen')
		 ->groupBy('intereses_transporte.id')
		 ->get();

		 if (!$lista_transportadores->count()){

		$lista_transportadores = null;
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

<div class="espacio_transporte" data-ckeck="false">
	<img src="{{asset('images/cadena/transportador.png')}}">	
</div>

<div class="boton_conectar" style="display:none">
	<div class="marquee">
		<p><a class="mostar_mi_cadena">CONECTAR</a></p>
		<p><a  class="mostar_mi_cadena">CLIC AQUÍ PARA VER SU CADENA</a></p>
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












@if(!$categoria == Null and  $origen == Null and  $destino == Null and  $producto == Null)
@foreach($lista_transportadores as $lista_transportadore)
@foreach(InteresesTransportador::where('id', $lista_transportadore->intereses_transporte_id)->get() as $valor)


<div class="row post_empresa" id="post_transporte<?php echo $i ?>">
<!--	<p class="anuncio_producto">
		  <i class="fa fa-bullhorn"></i> ANUNCIOS
		</p>-->
		<div class="detalle_producto">


			@if(!$valor->empresas->imagen == null)
			<img id="img_trans<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$valor->empresas->imagen}}"/>
			@else
			<img id="img_trans<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
			@endif



		</div>
		<div class="dtalles_producto">
			<h1 class="titulo_transporte<?php echo $i ?>">  
			{{$lista_transportadore->nombre}}
		


			</h1>
			<ul class="dtalles_producto">
					<li>Interes:{{$valor->productos}}</li>
				@if ($valor->min == 0)
				<li>  Min:  Ilimitado</li>
				@else
				<li> Min: {{$valor->min}} @if (!$valor->min_medida == null) {{Unidades::find($valor->min_medida)->nombre}} @endif</li>
				@endif


				@if ($valor->max == 0)
				<li>  Max: Ilimitado</li>
				@else
				<li> Max:{{$valor->max}}  @if (!$valor->min_medida == null) {{Unidades::find($valor->min_medida)->nombre}} @endif</li>
				@endif


			</ul>

		</div>	
		<div class="opcion_producto">
			<button class="btn-borde btn-borde-ai btn_selec" id="transporte<?php echo $i ?>">
				Seleccionar
			</button>		

			<br>
			<!--	<img src="{{asset('images/productos/start.png')}}">

				<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>	-->	
	</div>
</div>
<?php  $i ++ ?>



@endforeach
@endforeach


@else



@foreach($lista_transportadores as $lista_transportadore)



<div class="row post_empresa" id="post_transporte<?php echo $i ?>">
<!--	<p class="anuncio_producto">
		  <i class="fa fa-bullhorn"></i> ANUNCIOS
		</p>-->

		<div class="detalle_producto">

			@if(!$lista_transportadore->imagen == null)
			<img id="img_trans<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_transportadore->imagen}}"/>
			@else
			<img id="img_trans<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
			@endif


		</div>


		<div class="dtalles_producto">
			<h1 class="titulo_transporte<?php echo $i ?>">  

			{{$lista_transportadore->nombre}}		
			
				


			</h1>
			<ul class="dtalles_producto">
			<li>Interes: {{$lista_transportadore->productos}}</li>
				@if ($lista_transportadore->min == 0)
				<li>  Min:  Ilimitado</li>
				@else
				<li> Min: {{$lista_transportadore->min}} @if (!$lista_transportadore->min_medida == null) {{Unidades::find($lista_transportadore->min_medida)->nombre}} @endif</li>
				@endif


				@if ($lista_transportadore->max == 0)
				<li>  Max: Ilimitado</li>
				@else
				<li> Max:{{$lista_transportadore->max}}  @if (!$lista_transportadore->min_medida == null) {{Unidades::find($lista_transportadore->min_medida)->nombre}} @endif</li>
				@endif


			</ul>

		</div>	
		<div class="opcion_producto">
			<button class="btn-borde btn-borde-ai btn_selec" id="transporte<?php echo $i ?>">
				Seleccionar
			</button>		

			<br>
			<!--	<img src="{{asset('images/productos/start.png')}}">

				<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>	-->	
	</div>
</div>
<?php  $i ++ ?>




@endforeach
@endif
@endif








</div>






@if($lista_transportadores == Null) 

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


	echo '$(\'.espacio_transporte_select\').append((\'<img src=" \'+imagen+\' "> <div class="contenido_producto"><span class="tpc"> \'+titulo+\' </span><br><span>Transportador</span></div>\'));'."\n";


	echo '$(\'.boton_conectar\').show(\'last\');'."\n";

	

		echo '});'."\n";

$j++;

}

	

?>
});
</script>

@endif