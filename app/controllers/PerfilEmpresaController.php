<?php

class PerfilEmpresaController extends BaseController {


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

	public function index($slug)
	{
	    $empresa = Empresa::findBySlug($slug);
	    $perfil  = Empresa::find($empresa->id)->perfil->first();
	    return View::make('perfil.index', array('empresa'=> $empresa, 'perfil'=>$perfil));

		View::composer(array('includes.header'), function($view)
		{
		    $view->with('perfil', $perfil);
		});

	}

	public function Registro()
	{

		$empresa = User::find($this->user_id)->empresas->first();
		$perfil  = Empresa::find($empresa->id)->perfil->first();

	    $paises     = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
	    $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
	    $unidades   = Unidades::orderBy('nombre', 'ASC')->get(); // todas las unidaddes de productos
	    $productos  = Empresa::find($empresa->id)->productos; //los productos de la empresa en cuestión

	    $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
	    $intersesTransportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del transportador en cuenstion

		return View::make('perfil.completar.index', array(
			      'empresa'=> $empresa, 
				  'paises'=> $paises, 
				  'categorias'=>$categorias, 
				  'unidades'=>$unidades,
				  'perfil'=>$perfil,
				  'productos'=>$productos,
				  'intersesImportador'=>$intersesImportador,
				  'intersesTransportador'=>$intersesTransportador
				)
			);
	}

	public function postRegistroBasico()
	{

		$empresa = User::find($this->user_id)->empresas->first();

		if(Input::get('nombre')!=$empresa->nombre)
		{
			$regla_nombre = 'required|unique:empresas';
		}else{
			$regla_nombre = 'required';
		}

		$input = Input::all();
		$reglas =  array(
			'nombre' 	=> $regla_nombre,
			'email'     => 'required|email',
			'web'       => 'url',
			'direccion' => 'required',
			'telefono'	=> 'required|numeric',
			'direccion'	=> 'required',
			'pais'	    => 'required',
			'imagen'    => 'image'
			);

	   $validation = Validator::make($input, $reglas);

       if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }
        // busco el id de la empresa para actualizar
        $empresa_update = Empresa::find($empresa->id);

		if(Input::get('nombre')!=$empresa->nombre)
		{
			$empresa_update->nombre  = Input::get('nombre');
			$empresa_update->email  = Input::get('email');
			$empresa_update->personacontacto  = Input::get('personacontacto');
			$empresa_update->pais  = Input::get('pais');
			$empresa_update->resluggify(); // para actualizar el slug;
		}

		if(Input::file('imagen'))
		{
			$destinationPath = 'uploads'; // upload path
	      	$extension = Input::file('imagen')->getClientOriginalExtension(); // getting image extension
	      	$fileName = rand(11111,99999).'.'.$extension; // renameing image
	      	Input::file('imagen')->move($destinationPath, $fileName); // uploading file to given path
        }
        else{
        	$fileName =$empresa_update->imagen;
        }
		
		$empresa_update->email       = Input::get('email');
		$empresa_update->web         = Input::get('web');
		$empresa_update->telefono    = Input::get('telefono');
		$empresa_update->direccion   = Input::get('direccion');
		$empresa_update->pais_id     = Input::get('pais');
		$empresa_update->ciudad     = Input::get('ciudad');
		$empresa_update->personacontacto     = Input::get('personacontacto');
		$empresa_update->postal      = Input::get('postal');
		$empresa_update->descripcion = Input::get('descripcion');
		$empresa_update->imagen      = $fileName;
		$empresa_update->save();


		return Response::json(['success'=>true]);

	}


	public function postCambioPerfil()
	{
		$input = Input::all();
		$reglas =  array(
			'cambio_perfil' => 'required',
		);
	    $validation = Validator::make($input, $reglas);

        if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }

		$empresa = User::find($this->user_id)->empresas->first();
		$perfil  = Empresa::find($empresa->id)->perfil->first();

        $PerfilEmpresa  = PerfilEmpresa::find($perfil->pivot->id);
        $PerfilEmpresa->perfil_id = Input::get('cambio_perfil');
        $PerfilEmpresa->save();

		return Response::json(['success'=>true]);
	}

}
