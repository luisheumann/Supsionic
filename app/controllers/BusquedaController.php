<?php

class BusquedaController extends BaseController {

	public function index()
	{
		
		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$slug_empresa = $slug->slug;
		$paises = Paises::orderBy('nombre', 'ASC')->get();
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
	    $productos = Productos::orderBy('nombre', 'ASC')->get();


	    return View::make('busqueda.index', array('slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos));
	}

	public function getBuscarCadena()
	{

		$input = Input::all();

		$perfil = Input::get('perfil');
		$producto = Input::get('producto');
		$origen = Input::get('origen');
		$destino = Input::get('destino');
		$categoria = Input::get('categoria');
		$continente = Input::get('country');



		$productos = Productos::orderBy('nombre', 'ASC')->where('categoria_id','=',	Input::get('categoria'))->get();

		$vendedors = PerfilEmpresa::where('perfil_id','=','1')->get();


		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$slug_empresa = $slug->slug;
		$paises = Paises::orderBy('nombre', 'ASC')->get();
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

	    $transportadores = PerfilEmpresa::where('perfil_id','=','3')->get();
	    $sias = PerfilEmpresa::where('perfil_id','=','4')->get();


	    $rutas = RutaExportador::orderBy('pais_origen', 'ASC')->get();
	    $intereses = InteresesTransportador::orderBy('id', 'ASC')->get();

///////////////////////LISTA DE SIAS/////////////////////////////////

	    $lista_sias = DB::select( DB::raw("SELECT sias_paises_operacion.empresa_id, 
	empresas.id, 
	sias_categoria_interes.empresa_id, 
	paises.nombre as pais, 
	paises.id, 
	categorias.id as categoria, 
	categorias.nombre as categoria, 
	perfil_empresa.empresa_id, 
	perfil_empresa.perfil_id, 
	empresas.nombre, 
	paises.continente,
	empresas.imagen
FROM sias_categoria_interes LEFT JOIN empresas ON sias_categoria_interes.empresa_id = empresas.id
	 LEFT JOIN categorias ON categorias.id = sias_categoria_interes.categoria_id
	 LEFT JOIN sias_paises_operacion ON sias_paises_operacion.empresa_id = empresas.id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 LEFT JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
WHERE perfil_empresa.perfil_id = 4 and paises.continente= 'ninguno' and empresas.nombre = 'demo'") );

///////////////////////////////////////////////////////



	///////////////////////LISTA DE SIAS/////////////////////////////////
if ($categoria != Null and $origen != Null and $destino!=Null) {
	    $lista_sias = DB::select( DB::raw("SELECT empresas.id, 
	empresas.nombre, 
	empresas.pais_id, 
	sias_paises_operacion.empresa_id, 
	perfil_empresa.empresa_id, 
	perfil_empresa.perfil_id, 
	sias_categoria_interes.categoria_id, 
	categorias.id, 
	sias_categoria_interes.empresa_id, 
	categorias.nombre as categoria, 
	empresas.imagen, 
	paises.id, 
	paises.continente, 
	paises.nombre as pais,
	empresas.imagen 
FROM sias_categoria_interes INNER JOIN categorias ON sias_categoria_interes.categoria_id = categorias.id
	 INNER JOIN empresas ON sias_categoria_interes.empresa_id = empresas.id
	 INNER JOIN paises ON empresas.pais_id = paises.id
	 INNER JOIN sias_paises_operacion ON sias_paises_operacion.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
WHERE perfil_empresa.perfil_id = 4 and sias_paises_operacion.pais_id = '$destino' and sias_categoria_interes.categoria_id = '$categoria' and paises.id ='$origen'") );

	}

///////////////////////////////////////////////////////




///////////////////////LISTA DE TRANSPORTADORES/////////////////////////////////


$lista_transportadores = DB::select( DB::raw("SELECT intereses_transporte.id, 
	ruta_transporte.intereses_transporte_id, 
	ruta_transporte.pais_destino, 
	ruta_transporte.pais_origen, 
	intereses_transporte.empresa_id, 
	empresas.id, 
	paises.nombre AS pais, 
	paises.id, 
	paises.continente, 
	intereses_transporte.categoria_id, 
	categorias.id, 
	categorias.nombre AS categoria, 
	perfil_empresa.empresa_id, 
	perfil_empresa.perfil_id, 
	empresas.nombre AS nombreemp, 
	empresas.imagen
FROM ruta_transporte LEFT JOIN intereses_transporte ON ruta_transporte.intereses_transporte_id = intereses_transporte.id
	 LEFT JOIN empresas ON intereses_transporte.empresa_id = empresas.id
	 LEFT JOIN categorias ON categorias.id = intereses_transporte.categoria_id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 LEFT JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
WHERE perfil_empresa.perfil_id = 3 and paises.continente= 'ninguno' and empresas.nombre = 'demo'") );





//////////////////////////////////////////////////////



///////////////////////LISTA DE TRANSPORTADORES-  Pais/////////////////////////////////
if ($origen != Null and $destino != Null and $categoria != Null) {
$lista_transportadores = DB::select( DB::raw("SELECT intereses_transporte.id, 
	ruta_transporte.intereses_transporte_id, 
	ruta_transporte.pais_destino, 
	ruta_transporte.pais_origen, 
	intereses_transporte.empresa_id, 
	empresas.id, 
	paises.nombre AS pais, 
	paises.id, 
	paises.continente, 
	intereses_transporte.categoria_id, 
	categorias.id, 
	categorias.nombre AS categoria, 
	perfil_empresa.empresa_id, 
	perfil_empresa.perfil_id, 
	empresas.nombre AS nombreemp, 
	empresas.imagen
FROM ruta_transporte LEFT JOIN intereses_transporte ON ruta_transporte.intereses_transporte_id = intereses_transporte.id
	 LEFT JOIN empresas ON intereses_transporte.empresa_id = empresas.id
	 LEFT JOIN categorias ON categorias.id = intereses_transporte.categoria_id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 LEFT JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
WHERE perfil_empresa.perfil_id = 3 and ruta_transporte.pais_origen = '$origen' and  ruta_transporte.pais_destino = '$destino' and categorias.id = '$categoria'") );
}


//////////////////////////////////////////////////////



///////////////////////LISTA DE TRANSPORTADORES-  Pais/////////////////////////////////
/*
if ($origen != Null and $destino != Null) {
$lista_transportadores = DB::select( DB::raw("SELECT intereses_transporte.id, 
	ruta_transporte.intereses_transporte_id, 
	ruta_transporte.pais_destino, 
	ruta_transporte.pais_origen, 
	intereses_transporte.empresa_id, 
	empresas.id, 
	paises.nombre AS pais, 
	paises.id, 
	paises.continente, 
	intereses_transporte.categoria_id, 
	categorias.id, 
	categorias.nombre AS categoria, 
	perfil_empresa.empresa_id, 
	perfil_empresa.perfil_id, 
	empresas.nombre AS nombreemp, 
	empresas.imagen
FROM ruta_transporte LEFT JOIN intereses_transporte ON ruta_transporte.intereses_transporte_id = intereses_transporte.id
	 LEFT JOIN empresas ON intereses_transporte.empresa_id = empresas.id
	 LEFT JOIN categorias ON categorias.id = intereses_transporte.categoria_id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 LEFT JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
WHERE perfil_empresa.perfil_id = 3 and ruta_transporte.pais_origen = '$origen' and  ruta_transporte.pais_destino = '$destino'") );
}*/


//////////////////////////////////////////////////////







	    //////////LISTA IMPORTADORES///////////////////

$lista_importadores = DB::select( DB::raw("SELECT perfil_empresa.empresa_id AS empresa_id_perfil, 
		empresas.id, 
	productos.empresa_id AS empresa_id_producto, 
	productos.nombre AS NombrePoducto, 
	empresas.nombre, 
	productos.stock, 
	productos.venta_minima, 
	productos.produccion_mes, 
	productos.descripcion, 
	empresas.imagen, 
	productos.id, 
	img_productos.producto_id, 
	img_productos.imagen AS imagenproducto, 
	productos.unidad_id, 
	ruta_exportador.perfil_empresa_id AS empresa_id_rutaex, 
	ruta_exportador.pais_origen, 
	ruta_exportador.pais_destino, 
	ruta_exportador.producto_id, 
	paises.id, 
	empresas.pais_id, 
	paises.nombre AS pais, 
	paises.continente, 
	perfil_empresa.perfil_id, 
	productos.categoria_id
FROM perfil_empresa RIGHT JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 RIGHT JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT JOIN productos ON productos.empresa_id = empresas.id
	 LEFT JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id

WHERE productos.nombre = 'demo' and  ruta_exportador.pais_origen  = 'demo' and ruta_exportador.pais_destino = 'demo' and perfil_empresa.perfil_id = 1") );

	    ////////////\GENERICO/////////////////


/////////////////////ORIGEN DESTINO /////////////////////////////////


if ($producto != Null and $destino!=Null and $origen!=Null ) {
$lista_importadores = DB::select( DB::raw("SELECT perfil_empresa.empresa_id AS empresa_id_perfil, 
	empresas.id, 
	productos.empresa_id AS empresa_id_producto, 
	productos.nombre AS NombrePoducto, 
	empresas.nombre, 
	productos.stock, 
	productos.venta_minima, 
	productos.produccion_mes, 
	productos.descripcion, 
	empresas.imagen, 
	productos.id, 
	img_productos.producto_id, 
	img_productos.imagen AS imagenproducto, 
	productos.unidad_id, 
	ruta_exportador.perfil_empresa_id AS empresa_id_rutaex, 
	ruta_exportador.pais_origen, 
	ruta_exportador.pais_destino, 
	ruta_exportador.producto_id, 
	paises.id, 
	empresas.pais_id, 
	paises.nombre AS pais, 
	paises.continente, 
	perfil_empresa.perfil_id
FROM perfil_empresa RIGHT JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 RIGHT  JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT  JOIN productos ON productos.empresa_id = empresas.id
	 RIGHT  JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE ruta_exportador.pais_origen  = '$origen' AND  productos.nombre  = '$producto' AND ruta_exportador.pais_destino = '$destino' and perfil_empresa.perfil_id = 1 ") );

}



if ($producto != Null and $destino!=Null and $origen!=Null  and $categoria !=Null) {
$lista_importadores = DB::select( DB::raw("SELECT perfil_empresa.empresa_id AS empresa_id_perfil, 
	empresas.id, 
	productos.empresa_id AS empresa_id_producto, 
	productos.nombre AS NombrePoducto, 
	empresas.nombre, 
	productos.stock, 
	productos.venta_minima, 
	productos.produccion_mes, 
	productos.descripcion, 
	empresas.imagen, 
	productos.id, 
	img_productos.producto_id, 
	img_productos.imagen AS imagenproducto, 
	productos.unidad_id, 
	ruta_exportador.perfil_empresa_id AS empresa_id_rutaex, 
	ruta_exportador.pais_origen, 
	ruta_exportador.pais_destino, 
	ruta_exportador.producto_id, 
	paises.id, 
	empresas.pais_id, 
	paises.nombre AS pais, 
	paises.continente, 
	perfil_empresa.perfil_id
FROM perfil_empresa RIGHT JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT JOIN paises ON paises.id = empresas.pais_id
	 RIGHT  JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT  JOIN productos ON productos.empresa_id = empresas.id
	 RIGHT  JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE ruta_exportador.pais_origen  = '$origen' AND  productos.nombre  = '$producto' AND ruta_exportador.pais_destino = '$destino' and perfil_empresa.perfil_id = 1 AND productos.categoria_id = '$categoria'") );

}


$lista_exportadores= DB::select("SELECT perfil_empresa.empresa_id AS empresa_id_perfil, 
empresas.id, 
empresas.nombre, 
empresas.imagen, 
paises.id, 
empresas.pais_id, 
paises.nombre AS pais, 
paises.continente, 
perfil_empresa.perfil_id, 
intereses_importador.empresa_id, 
intereses_importador.productos, 
ruta_importador.intereses_importador_id, 
intereses_importador.id, 
ruta_importador.pais_destino, 
ruta_importador.pais_origen
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
INNER JOIN paises ON paises.id = empresas.pais_id
WHERE intereses_importador.productos = 'demo' and perfil_empresa.perfil_id = 0   and ruta_importador.pais_destino = 0 and ruta_importador.pais_origen = 0");




if ($producto != Null and $destino!=Null and $origen!=Null  and $categoria !=Null) {
$lista_exportadores= DB::select("SELECT perfil_empresa.empresa_id AS empresa_id_perfil, 
empresas.id, 
empresas.nombre, 
empresas.imagen, 
paises.id, 
empresas.pais_id, 
paises.nombre AS pais, 
paises.continente, 
perfil_empresa.perfil_id, 
intereses_importador.empresa_id, 
intereses_importador.productos, 
ruta_importador.intereses_importador_id, 
intereses_importador.id, 
ruta_importador.pais_destino, 
ruta_importador.pais_origen
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
INNER JOIN paises ON paises.id = empresas.pais_id
WHERE intereses_importador.productos = '$producto' and perfil_empresa.perfil_id = 2   and ruta_importador.pais_destino = '$origen' and ruta_importador.pais_origen = '$destino'");
}


$lista_importadoresalls = DB::select( DB::raw("SELECT empresas.id, 
productos.empresa_id AS empresa_id_producto, 
productos.nombre AS NombrePoducto, 
empresas.nombre as nombre, 
productos.stock, 
productos.venta_minima, 
productos.produccion_mes, 
productos.descripcion, 
empresas.imagen, 
productos.id, 
img_productos.producto_id, 
img_productos.imagen AS imagenproducto, 
productos.unidad_id, 
ruta_exportador.perfil_empresa_id AS empresa_id_rutaex, 
ruta_exportador.pais_origen, 
ruta_exportador.pais_destino, 
ruta_exportador.producto_id, 
paises.id, 
empresas.pais_id, 
paises.nombre AS pais, 
paises.continente, 
intereses_importador.empresa_id, 
intereses_importador.productos, 
intereses_importador.id, 
intereses_importador.categoria_id, 
ruta_importador.pais_destino, 
ruta_importador.pais_origen, 
ruta_importador.intereses_importador_id, 
productos.categoria_id, 
categorias.nombre as categoria, 
categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
LEFT OUTER JOIN categorias ON intereses_importador.categoria_id = categorias.id
LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
LEFT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
LEFT OUTER JOIN productos ON productos.empresa_id = empresas.id
LEFT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id AND categorias.id = productos.categoria_id
WHERE ruta_exportador.pais_origen  = 0 AND  productos.nombre  = 0 AND ruta_exportador.pais_destino = 0 and perfil_empresa.perfil_id = 0 or perfil_empresa.perfil_id = 0 and ruta_importador.pais_destino = 0 and ruta_importador.pais_origen = 0 GROUP BY empresas.nombre") );





if ($producto != Null and $destino!=Null and $origen!=Null  and $categoria !=Null) {
$lista_importadoresalls = DB::select( DB::raw("SELECT empresas.id, 
productos.empresa_id AS empresa_id_producto, 
productos.nombre AS NombrePoducto, 
empresas.nombre as nombre, 
productos.stock, 
productos.venta_minima, 
productos.produccion_mes, 
productos.descripcion, 
empresas.imagen, 
productos.id, 
img_productos.producto_id, 
img_productos.imagen AS imagenproducto, 
productos.unidad_id, 
ruta_exportador.perfil_empresa_id AS empresa_id_rutaex, 
ruta_exportador.pais_origen, 
ruta_exportador.pais_destino, 
ruta_exportador.producto_id, 
paises.id, 
empresas.pais_id, 
paises.nombre AS pais, 
paises.continente, 
intereses_importador.empresa_id, 
intereses_importador.productos, 
intereses_importador.id, 
intereses_importador.categoria_id, 
ruta_importador.pais_destino, 
ruta_importador.pais_origen, 
ruta_importador.intereses_importador_id, 
productos.categoria_id, 
categorias.nombre as categoria, 
categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
LEFT OUTER JOIN categorias ON intereses_importador.categoria_id = categorias.id
LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
LEFT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
LEFT OUTER JOIN productos ON productos.empresa_id = empresas.id
LEFT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id AND categorias.id = productos.categoria_id
WHERE ruta_exportador.pais_origen  = '$origen' AND  productos.nombre  = '$producto' AND ruta_exportador.pais_destino = '$destino' and perfil_empresa.perfil_id = 1 or perfil_empresa.perfil_id = 2 and ruta_importador.pais_destino = '$origen' and ruta_importador.pais_origen = '$destino' GROUP BY empresas.nombre") );

}



//////////////////////////////////////////////////






	

	    return View::make('busqueda.search', array('lista_importadoresalls'=>$lista_importadoresalls, 'lista_exportadores'=>$lista_exportadores,'lista_sias'=>$lista_sias,'lista_transportadores' => $lista_transportadores, 'lista_importadores'=> $lista_importadores, 'slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores, 'intereses'=>$intereses, 'sias'=>$sias, 'vendedors'=>$vendedors, 'perfil'=>$perfil));
	}






	public function filtropais($id=Null)
	{
		if($id == 'json'){
		$paises = Paises::orderBy('nombre', 'ASC')->lists('nombre', 'id'); // todos los paises
	}else{
		$paises = Paises::orderBy('nombre', 'ASC')->where('continente', '=',$id)->lists('nombre', 'id'); // todos los paises

	}
	return Response::json(array($paises));


}


}