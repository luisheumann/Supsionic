<?php

class FrontendController extends BaseController {

	public function index()
	{
		
		return View::make('demo.default');
	}


	public function producto()
	{
		
		return View::make('demo.producto');
	}


public function lista()
	{
		
		return View::make('demo.lista');
	}



	

	



		public function busqueda()
	{

		$input = Input::all();

		$perfil = Input::get('perfil');
		$producto = Input::get('producto');
		$origen = Input::get('origen');
		$destino = Input::get('destino');
		$categoria = Input::get('categoria');
		$continente = Input::get('country');
		$selectProducto = Input::get('selectProducto');



		$productos = Productos::orderBy('nombre', 'ASC')->where('categoria_id','=',	Input::get('categoria'))->get();

		$vendedors = PerfilEmpresa::where('perfil_id','=','1')->get();


		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$empresapais = DB::table('empresas')->whereUser_id($user_id)->first();
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
}

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


*/




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


/*
if ($categoria != null or $continente != null or $producto != null){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}

if ($producto != null){
	$stringproducto = ' and  productos.nombre = ';
	$stringproductointeres = ' and intereses_importador.productos = ';
	$producto = " '$producto' ";
	$producto1 = $stringproducto.$producto;
	$producto2 = $stringproductointeres.$producto;

}else{
$producto1 = '';
	$producto2 = '';
		$producto = '';
}


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria $producto1  GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos as NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria $producto2  GROUP BY intereses_importador.productos)"));


}
*/


if ($categoria != null and $producto != null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and intereses_importador.productos = '$producto'  GROUP BY intereses_importador.productos)"));


}



if ($categoria != null and $producto == null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria   GROUP BY intereses_importador.productos)"));


}

if ($categoria == null and $producto != null and $continente == null ){


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos)"));


}




if ($categoria != null and $continente != null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}

switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and paises.continente = '$continente' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and paises.continente = '$continente'  GROUP BY intereses_importador.productos)"));


}




if ($categoria != null and $continente != null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and paises.continente = '$continente' and productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and paises.continente = '$continente' and intereses_importador.productos= '$producto'  GROUP BY intereses_importador.productos)"));


}


///////// LISTA IMPORTAR ///////




$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = 0 GROUP BY productos.nombre") );



///////// LISTA IMPORTAR ///////
if ($categoria != null and $continente != null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE productos.nombre  = '$producto' and paises.continente = $continente and categorias.id = $categoria
GROUP BY productos.nombre") );

}
///////// LISTA IMPORTAR ///////
if ($categoria != null and $continente == null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE categorias.id = $categoria
GROUP BY productos.nombre") );

}


///////// LISTA IMPORTAR ///////
if ($categoria == null and $continente != null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = $continente GROUP BY productos.nombre") );

}


if ($categoria != null and $continente != null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = $continente and categorias.id = $categoria GROUP BY productos.nombre") );

}


if ($categoria != null and $continente == null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE productos.nombre = '$producto' and  $categoria GROUP BY productos.nombre") );

}
/////////////////////////////////////////




	
$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where paises.id = 00 and paises.continente = 000 GROUP BY intereses_importador.productos");






if ($producto != Null  and $continente != null  and $categoria != Null) {

	switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where intereses_importador.productos = '$producto' and paises.continente = $continente and categorias.id = $categoria
GROUP BY intereses_importador.productos");
}




if ($producto != Null  and $continente == null  and $categoria == Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos");
}




if ($producto == Null  and $continente == null  and $categoria != Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria GROUP BY intereses_importador.productos");
}



if ($producto != Null  and $continente == null  and $categoria != Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria  and intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos");
}

if ($producto == Null  and $continente != null  and $categoria == Null) {


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where paises.continente = $continente GROUP BY intereses_importador.productos");
}


if ($producto == Null  and $continente != null  and $categoria != Null) {


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria and paises.continente = $continente GROUP BY intereses_importador.productos");
}





	

	    return View::make('demo.busqueda', array('lista_importadoresalls'=>$lista_importadoresalls, 'lista_exportadores'=>$lista_exportadores,'lista_sias'=>$lista_sias,'lista_transportadores' => $lista_transportadores, 'lista_importadores'=> $lista_importadores, 'slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores, 'intereses'=>$intereses, 'sias'=>$sias, 'vendedors'=>$vendedors, 'perfil'=>$perfil, 'empresapais' =>$empresapais));
	}

		public function busqueda2()
	{

		$input = Input::all();

		$perfil = Input::get('perfil');
		$producto = Input::get('producto');
		$origen = Input::get('origen');
		$destino = Input::get('destino');
		$categoria = Input::get('categoria');
		$continente = Input::get('country');
		$selectProducto = Input::get('selectProducto');



		$productos = Productos::orderBy('nombre', 'ASC')->where('categoria_id','=',	Input::get('categoria'))->get();

		$vendedors = PerfilEmpresa::where('perfil_id','=','1')->get();


		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$empresapais = DB::table('empresas')->whereUser_id($user_id)->first();
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
}

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


*/




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


/*
if ($categoria != null or $continente != null or $producto != null){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}

if ($producto != null){
	$stringproducto = ' and  productos.nombre = ';
	$stringproductointeres = ' and intereses_importador.productos = ';
	$producto = " '$producto' ";
	$producto1 = $stringproducto.$producto;
	$producto2 = $stringproductointeres.$producto;

}else{
$producto1 = '';
	$producto2 = '';
		$producto = '';
}


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria $producto1  GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos as NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria $producto2  GROUP BY intereses_importador.productos)"));


}
*/


if ($categoria != null and $producto != null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and intereses_importador.productos = '$producto'  GROUP BY intereses_importador.productos)"));


}



if ($categoria != null and $producto == null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria   GROUP BY intereses_importador.productos)"));


}

if ($categoria == null and $producto != null and $continente == null ){


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos)"));


}




if ($categoria != null and $continente != null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}

switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and paises.continente = '$continente' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and paises.continente = '$continente'  GROUP BY intereses_importador.productos)"));


}




if ($categoria != null and $continente != null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}



$lista_importadoresalls = DB::select( DB::raw("(SELECT empresas.nombre, 
	productos.nombre AS NombrePoducto, 
	img_productos.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.ncontinente, 
	paises.nombre AS pais, 
	perfil_empresa.perfil_id, 
	productos.stock, 
	productos.venta_minima, 
	productos.condiciones_pago, 
	productos.produccion_mes,
	empresas.imagen as eimagen
FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id
	 INNER JOIN empresas ON productos.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN img_productos ON img_productos.producto_id = productos.id
	 INNER JOIN ruta_exportador ON ruta_exportador.producto_id = productos.id
	 INNER JOIN paises ON ruta_exportador.pais_origen = paises.id where $categoria and paises.continente = '$continente' and productos.nombre = '$producto' GROUP BY productos.nombre)UNION (SELECT intereses_importador.productos AS NombrePoducto, 
	empresas.nombre, 
	empresas.imagen, 
	categorias.id AS categoria_id, 
	paises.continente, 
	paises.nombre AS pais, 
	paises.ncontinente, 
	perfil_empresa.perfil_id,
	perfil_empresa.null as stok,
	perfil_empresa.null as venta_minima,
	perfil_empresa.null as condiciones_pago,
	perfil_empresa.null as produccion_mes,
	empresas.imagen as eimagen
FROM ruta_importador INNER JOIN intereses_importador ON ruta_importador.intereses_importador_id = intereses_importador.id
	 INNER JOIN empresas ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN perfil_empresa ON perfil_empresa.empresa_id = empresas.id
	 INNER JOIN categorias ON intereses_importador.categoria_id = categorias.id
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id where $categoria and paises.continente = '$continente' and intereses_importador.productos= '$producto'  GROUP BY intereses_importador.productos)"));


}


///////// LISTA IMPORTAR ///////




$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = 0 GROUP BY productos.nombre") );



///////// LISTA IMPORTAR ///////
if ($categoria != null and $continente != null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE productos.nombre  = '$producto' and paises.continente = $continente and categorias.id = $categoria
GROUP BY productos.nombre") );

}
///////// LISTA IMPORTAR ///////
if ($categoria != null and $continente == null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE categorias.id = $categoria
GROUP BY productos.nombre") );

}


///////// LISTA IMPORTAR ///////
if ($categoria == null and $continente != null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = $continente GROUP BY productos.nombre") );

}


if ($categoria != null and $continente != null and $producto ==null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE paises.continente = $continente and categorias.id = $categoria GROUP BY productos.nombre") );

}


if ($categoria != null and $continente == null and $producto !=null ){


if ($categoria != null){
	$stringcategoria = ' categorias.id = ';
	$categoria = $stringcategoria.$categoria;
}


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}

$lista_importadores = DB::select( DB::raw("SELECT empresas.id, 
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
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id
FROM perfil_empresa RIGHT OUTER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN paises ON paises.id = empresas.pais_id
	 RIGHT OUTER JOIN ruta_exportador ON ruta_exportador.perfil_empresa_id = empresas.id
	 RIGHT OUTER JOIN productos ON productos.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = productos.categoria_id
	 RIGHT OUTER JOIN img_productos ON img_productos.producto_id = productos.id AND ruta_exportador.producto_id = productos.id
WHERE productos.nombre = '$producto' and  $categoria GROUP BY productos.nombre") );

}
/////////////////////////////////////////




	
$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where paises.id = 00 and paises.continente = 000 GROUP BY intereses_importador.productos");






if ($producto != Null  and $continente != null  and $categoria != Null) {

	switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where intereses_importador.productos = '$producto' and paises.continente = $continente and categorias.id = $categoria
GROUP BY intereses_importador.productos");
}




if ($producto != Null  and $continente == null  and $categoria == Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos");
}




if ($producto == Null  and $continente == null  and $categoria != Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria GROUP BY intereses_importador.productos");
}



if ($producto != Null  and $continente == null  and $categoria != Null) {




$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria  and intereses_importador.productos = '$producto' GROUP BY intereses_importador.productos");
}

if ($producto == Null  and $continente != null  and $categoria == Null) {


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where paises.continente = $continente GROUP BY intereses_importador.productos");
}


if ($producto == Null  and $continente != null  and $categoria != Null) {


switch ($continente) {
    case 'América':
            $continente = 2;
        break;
    case 'Africa':
             $continente = 1;
        break;
    case 'Asia':
        $continente = 3;
        break;
     case 'Europa':
           $continente = 4;
        break;
     case 'Oceanía':
        $continente = 5;
        break;
}


$lista_exportadores= DB::select("SELECT empresas.id, 
	empresas.nombre, 
	empresas.imagen, 
	paises.id, 
	paises.nombre AS pais, 
	paises.continente, 
	categorias.id AS categoria_id, 
	intereses_importador.productos, 
	paises.ncontinente
FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	 LEFT OUTER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
	 INNER JOIN categorias ON categorias.id = intereses_importador.categoria_id
	 LEFT OUTER JOIN ruta_importador ON intereses_importador.id = ruta_importador.intereses_importador_id
	 INNER JOIN paises ON paises.id = empresas.pais_id
	 where $categoria and paises.continente = $continente GROUP BY intereses_importador.productos");
}





	

	    return View::make('demo.search', array('lista_importadoresalls'=>$lista_importadoresalls, 'lista_exportadores'=>$lista_exportadores,'lista_sias'=>$lista_sias,'lista_transportadores' => $lista_transportadores, 'lista_importadores'=> $lista_importadores, 'slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores, 'intereses'=>$intereses, 'sias'=>$sias, 'vendedors'=>$vendedors, 'perfil'=>$perfil, 'empresapais' =>$empresapais));
	}


}