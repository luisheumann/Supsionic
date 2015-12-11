<?php

class AdminController extends BaseController {


 protected $user_id;

    public function __construct() 
    {
    	$slug = Route::current()->parameters();
        $perfil = Empresa::findBySlug($slug);
        if (empty($perfil)) {
            return App::abort(404);
        }
        $this->user_id = $perfil->id;
    }

    
	public function index()
	{


		$usuario = Sentry::findUserById($this->user_id);
		$empresa = User::find($this->user_id)->empresas->first();
		$perfil  = Empresa::find($empresa->id)->perfil->first();
	    $productos  = Empresa::find($empresa->id)->productos; //los productos de la empresa en cuestión
	    $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
	    $intersesTransportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del transportador en cuenstion
	    $progreso = Null;


	    if (!$usuario->cargo == null ) {

	    	$progreso = 1;
	    }
$progreso = Sentry::findUserById($this->user_id);
		return View::make('admin.default', array(
			      'empresa'=> $empresa, 
				  'perfil'=>$perfil,
				  'productos'=>$productos,
				  'intersesImportador'=>$intersesImportador,
				  'intersesTransportador'=>$intersesTransportador,
				  'usuario'=>$usuario,
				  'progreso'=>$progreso

				)
			);

		

	}

		public function producto_lista()
	{
		
		return View::make('admin.producto.lista');
	}


	public function producto_delete($borra)
{

	
		$producto = Productos::find($id);
		if($producto->delete()){
		Session::set('mensaje','Artículo eliminado con éxito');
			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}
		return Redirect::to('/producto/lista');


}

public function file_delete($borra)
{

	
		$producto = FileEmpresas::find($borra);
		if($producto->delete()){
		Session::set('mensaje','Artículo eliminado con éxito');
			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}
		return Redirect::to('/producto/lista');


}



		public function producto_add()
	{
		
		     $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
     $producto  = Empresa::find($this->user_id)->productos; //los productos de la empresa en cuestión
         $unidades = Unidades::Get();
      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($this->user_id)->perfil->first();
           $monedas = Monedas::orderBy('nombre', 'ASC')->get(); 


           $taxonomias = Taxonomy::orderBy('name', 'ASC')->get(); // todas las categorias
		
$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;



        return View::make('admin.producto.add', array('producto' =>$producto, 'categorias' => $categorias, 'unidades' =>$unidades, 'paises'=>$paises, 'empresa'=>$empresa,'perfil'=>$perfil, 'monedas'=>$monedas,'taxonomias'=>$taxonomias, 'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));


	}


		public function producto_edit()
	{
		

		     $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
     $producto  = Empresa::find($this->user_id)->productos; //los productos de la empresa en cuestión
         $unidades = Unidades::Get();
      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($this->user_id)->perfil->first();
           $monedas = Monedas::orderBy('nombre', 'ASC')->get(); 

            $categorias_select = SiasCategoriaInteres::where('producto_id', Input::get('id'))->orderBy('categoria_id', 'DESC')->first(); 
		

		$categorianame = Taxonomy::where('id',$categorias_select->categoria_id)->first();

		$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;
	$taxonomias = Taxonomy::orderBy('name', 'ASC')->get();



        return View::make('admin.producto.edit', array('producto' =>$producto, 'categorias' => $categorias, 'unidades' =>$unidades, 'paises'=>$paises, 'empresa'=>$empresa,'perfil'=>$perfil, 'monedas'=>$monedas,'categorias_select' => $categorias_select,'taxonomias'=>$taxonomias, 'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6, 'categorianame' => $categorianame));


	}


	public function basico()
	{
		
		return View::make('admin.perfil.basicos');
	}


	public function cambiopass()
	{
		
		return View::make('admin.login.cambio');
	}


	public function empresa()
	{

	$usuario = Sentry::findUserById($this->user_id);
	
		$empresa = User::find($this->user_id)->empresas->first();
		$perfil  = Empresa::find($empresa->id)->perfil->first();

	    $paises     = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
	    $unidades   = Unidades::orderBy('nombre', 'ASC')->get(); // todas las unidaddes de productos
	    $productos  = Empresa::find($empresa->id)->productos; //los productos de la empresa en cuestión
	    $archivos = FileEmpresas::where('empresa_id', $empresa->id)->get();

	    $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
	    $intersesTransportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del transportador en cuenstion

		return View::make('admin.perfil.empresa', array(
			      'empresa'=> $empresa, 
				  'paises'=> $paises, 
				  'categorias'=>$categorias, 
				  'unidades'=>$unidades,
				  'perfil'=>$perfil,
				  'productos'=>$productos,
				  'intersesImportador'=>$intersesImportador,
				  'intersesTransportador'=>$intersesTransportador,
				  'usuario'=>$usuario,
				  'archivos'=>$archivos
				)
			);

		
		
	}



	



}