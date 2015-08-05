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




if (!$producto == Null && !$origen == Null && $destino == Null && $categoria == Null) {
		$lista_transportadores = DB::table('intereses_sias')
		 ->join('sias_paises_operacion', 'intereses_sias.id', '=', 'sias_paises_operacion.intereses_sias_id')
		->join('empresas', 'intereses_sias.empresa_id', '=', 'empresas.id')
		->where('intereses_sias.productos',$producto)
		->where('sias_paises_operacion.pais_id',$origen)
		 ->get();


}







if (!$origen == Null && $producto == Null  && $destino == Null && $categoria == Null && $country == Null ) {
		$lista_transportadores = DB::table('intereses_sias')
		 ->join('sias_paises_operacion', 'intereses_sias.id', '=', 'sias_paises_operacion.intereses_sias_id')
		 ->join('empresas', 'intereses_sias.empresa_id', '=', 'empresas.id')
	
		->where('sias_paises_operacion.pais_id',$origen)
	
		 ->get();

}


///// PRODUCTO 1

if (!$producto == Null) {
		$lista_transportadores = DB::table('intereses_sias')
		->join('empresas', 'intereses_sias.empresa_id', '=', 'empresas.id')
		->where('intereses_sias.productos',$producto)

		 ->get();


}





if ($origen == Null && $producto == Null  && $destino == Null && $categoria == Null && $country == Null ) {
		$lista_transportadores = DB::table('intereses_sias')
		
		 ->join('empresas', 'intereses_sias.empresa_id', '=', 'empresas.id')
	
	
		 ->get();

}else{


	$lista_transportadores = DB::table('intereses_sias')
		
		 ->join('empresas', 'intereses_sias.empresa_id', '=', 'empresas.id')
	
	
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

</style>


<div class="espacio_sias" data-ckeck="false">
	<img src="{{asset('images/cadena/sias.png')}}">	
</div>

<div class="boton_conectar" style="display:none">
	<p>&nbsp;</p>
</div>


<div class="head_empresa">
	<h1>SIAS</h1>
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


<div class="row post_empresa" id="post_sias<?php echo $i ?>">

	<div class="detalle_producto">

				

				@if(!$lista_transportadore->imagen == null)
			<img id="img_sias<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/{{$lista_transportadore->imagen}}"/>
			@else
			<img id="img_sias<?php echo $i ?>" height="80" width="80" alt="Image" src="/uploads/none.jpg"/>
			@endif




</div>
	<div class="dtalles_producto">
		<h1 class="titulo_sias<?php echo $i ?>">{{$lista_transportadore->productos}}</h1>
		<ul class="dtalles_producto">
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
		<button class="btn-borde btn-borde-ai btn_selec" id="sias<?php echo $i ?>">
			Armar
		</button>	
		<br>
		<img src="{{asset('images/productos/start.png')}}">
<!--
		<div class="dropdown">
		  <a class="link" id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="caret"></span>
		  </a>
			<ul class="dropdown-menu menu_acciones_producto" role="menu" aria-labelledby="drop3">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Esconder</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			</ul>
		</div>-->		
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


	echo '$("#sias'.$j.'").click(function(event) {'."\n";


	echo ' $(\'.lista-empresas\').height(517);'."\n";
	echo '$("#post_sias'.$j.'").addClass(\'activo_check\').siblings().removeClass(\'activo_check\');'."\n";
 	echo 'var imagen = $(\'#img_sias'.$j.'\').attr(\'src\');'."\n";
	echo 'var titulo = $(".titulo_sias'.$j.'").text();'."\n";
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