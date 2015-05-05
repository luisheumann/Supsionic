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


		public function productojson()
	{

		$producto = Productos::orderBy('nombre', 'ASC')->lists('nombre');
		$producto = InteresesImportador::orderBy('productos', 'ASC')->lists('productos');

	
		return Response::json($producto, 200);
	}




	



}
