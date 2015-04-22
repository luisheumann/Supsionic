<?php

class BusquedaController extends BaseController {

	public function index()
	{
		
		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$slug_empresa = $slug->slug;
		$paises     = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
	        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
		return View::make('busqueda.index', array('slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias));
	}

}