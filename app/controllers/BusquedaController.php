<?php

class BusquedaController extends BaseController {

	public function index()
	{
		
		$user_id = Sentry::getuser()->id;
		$slug = DB::table('empresas')->whereUser_id($user_id)->first();
		$slug_empresa = $slug->slug;
		

			$paises = Paises::orderBy('nombre', 'ASC')->get();

	        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

	        $productos = productos::orderBy('nombre', 'ASC')->get();

  			 $transportadores = PerfilEmpresa::orderBy('id', 'DESC')->get();
	   
   
    	$rutas = RutaExportador::orderBy('pais_origen', 'ASC')->get();


		return View::make('busqueda.index', array('slug' => $slug_empresa, 'paises' => $paises, 'categorias' =>$categorias, 'productos' =>$productos, 'rutas'=>$rutas, 'transportadores'=>$transportadores));
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