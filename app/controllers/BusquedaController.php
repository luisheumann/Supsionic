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
	    	$empresapais = DB::table('empresas')->whereUser_id($user_id)->first();
	    	 $taxonomias = Taxonomy::orderBy('name', 'ASC')->get(); // todas las categorias


	    return View::make('busqueda.index', array('slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'empresa3' =>$slug, 'empresapais' =>$empresapais, 'taxonomias' =>$taxonomias));
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
		$selectProducto = Input::get('selectProducto');



		$productos = Productos::orderBy('nombre', 'ASC')->where('categoria_id','=',	Input::get('categoria'))->get();

		$vendedors = PerfilEmpresa::where('perfil_id','=','1')->get();


		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$empresapais = DB::table('empresas')->whereUser_id($user_id)->first();
		$slug_empresa = $slug->slug;
		$paises = Paises::orderBy('nombre', 'ASC')->get();
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
	    $unidades = Unidades::Get();

	    $transportadores = PerfilEmpresa::where('perfil_id','=','3')->get();
	    $sias = PerfilEmpresa::where('perfil_id','=','4')->get();


	    $rutas = RutaExportador::orderBy('pais_origen', 'ASC')->get();


	    $intereses = InteresesTransportador::orderBy('id', 'ASC')->get();


	
		$lista_importadores = PerfilEmpresa::where('perfil_id','=','1')->get();
	    $lista_exportadores = PerfilEmpresa::where('perfil_id','=','2')->get();
 		//$lista_transportadores = PerfilEmpresa::where('perfil_id','=','3')->get();
	    $lista_sias = PerfilEmpresa::where('perfil_id','=','4')->get();
    	 $taxonomias = Taxonomy::orderBy('name', 'ASC')->get(); // todas las categorias
 		$id1 = null;
        $id2 = null;
        $id3 = null;
        $id4 = null;
        $id5 = null;
        $id6 = null;

		//TRANSPORTADOR
		



	    return View::make('busqueda.search', array('lista_exportadores'=>$lista_exportadores,'lista_sias'=>$lista_sias, 'lista_importadores'=> $lista_importadores, 'slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores, 'intereses'=>$intereses, 'sias'=>$sias, 'vendedors'=>$vendedors, 'perfil'=>$perfil, 'empresapais' =>$empresapais, 'unidades' =>$unidades, 'taxonomias' =>$taxonomias,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
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

public function filtroregioninteres($producto=null)
{
	
		$region = DB::select( DB::raw("SELECT paises.continente,	paises.ncontinente 
FROM empresas INNER JOIN ruta_importador ON empresas.pais_id = ruta_importador.pais_destino
	 INNER JOIN paises ON ruta_importador.pais_origen = paises.id
	 INNER JOIN intereses_importador ON intereses_importador.empresa_id = empresas.id
WHERE intereses_importador.productos = '$producto' and paises.id = ruta_importador.pais_origen and ruta_importador.pais_destino =empresas.pais_id
GROUP BY paises.ncontinente"));

		return Response::json(($region));

}

	public function filtroregion($producto=null)
	{
		
		if ($producto == 000){
	$region = DB::select( DB::raw("SELECT paises.continente, paises.ncontinente 
FROM ruta_exportador inner JOIN productos ON ruta_exportador.perfil_empresa_id = productos.empresa_id AND productos.id = ruta_exportador.producto_id
	 INNER JOIN paises ON ruta_exportador.pais_destino = paises.id
	 INNER JOIN empresas ON empresas.pais_id = ruta_exportador.pais_origen
WHERE paises.id = pais_destino and ruta_exportador.pais_origen =empresas.pais_id and paises.ncontinente <> ''

GROUP BY paises.continente"));

		}else{
		$region = DB::select( DB::raw("SELECT paises.continente, paises.ncontinente 
FROM ruta_exportador inner JOIN productos ON ruta_exportador.perfil_empresa_id = productos.empresa_id AND productos.id = ruta_exportador.producto_id
	 INNER JOIN paises ON ruta_exportador.pais_destino = paises.id
	 INNER JOIN empresas ON empresas.pais_id = ruta_exportador.pais_origen
WHERE productos.nombre = '$producto' and paises.id = pais_destino and ruta_exportador.pais_origen =empresas.pais_id and paises.ncontinente <> ''

GROUP BY paises.continente"));

}

		return Response::json(($region));
		
	}


}