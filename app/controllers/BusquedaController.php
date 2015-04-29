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

	public function postBuscarCadena()
	{

		$input = Input::all();

		$perfil = Input::get('perfil');
		$categoriasearch = Input::get('categoria');


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


	    $lista_importadores = DB::select( DB::raw("SELECT perfil_empresa.empresa_id, 
	    	empresas.id, 
	    	productos.empresa_id, 
	    	productos.nombre AS NombrePoducto, 
	    	empresas.nombre, 
	    	productos.stock, 
	    	productos.venta_minima, 
	    	productos.produccion_mes, 
	    	productos.descripcion, 
	    	empresas.imagen
	    	FROM perfil_empresa INNER JOIN empresas ON perfil_empresa.empresa_id = empresas.id
	    	INNER JOIN productos ON productos.empresa_id = empresas.id
	    	WHERE productos.nombre = '$categoriasearch'") );

	    return View::make('busqueda.search', array('lista_importadores'=> $lista_importadores, 'slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores, 'intereses'=>$intereses, 'sias'=>$sias, 'vendedors'=>$vendedors, 'perfil'=>$perfil));
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