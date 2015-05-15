<?php

class HomeController extends BaseController {

	public function index()
	{
		if (!Sentry::check())
		{
			return Redirect::to('login');
		}
		
		$user_id = Sentry::getuser()->id;
		$slug_empresa = User::find($user_id)->empresas->first()->slug;
	    $paises     = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

		return View::make('index', array('slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias));
	}

	public function salir()
	{
		Sentry::logout();
		return Redirect::to('/');
	}

		public function productojson2()
	{

		$producto = Productos::orderBy('nombre', 'ASC')->lists('nombre');

		return Response::json( $producto, 200);
	}



		public function productojson()
	{

		//$producto = Productos::orderBy('nombre', 'ASC')->select('category as category2', 'nombre')->get();
		$producto = DB::select( DB::raw("(SELECT 'producto' as category,  nombre as name FROM productos) UNION (SELECT 'intereses' as category, productos  as name FROM intereses_importador)"));


		return Response::json( $producto, 200);
	}

		public function interesesjson()
	{

		$interes = InteresesImportador::orderBy('productos', 'ASC')->select('productos')->get();

		return Response::json( $interes, 200);
	}





	



}
