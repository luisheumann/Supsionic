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
    	$productos = Empresa::find($empresa->id)->productos;
	

    	 

    	 

    	//$imagenes = $productos->imagen;
	    return View::make('perfil.index', array('empresa'=> $empresa, 'perfil'=>$perfil,'productos'=>$productos));

		View::composer(array('includes.header'), function($view)
		{
		    $view->with('perfil', $perfil);
		});

	}

	public function Registro()
	{
		$usuario = User::find($this->user_id)->first();
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
				  'intersesTransportador'=>$intersesTransportador,
				  'usuario'=>$usuario

				)
			);
	}


	public function postRegistroDatosBasicos()
	{

$input = Input::all();
try
{
    // Find the user using the user id
    $user = Sentry::findUserById($this->user_id);

$pass = Input::get('pass2');
    if($user->checkPassword($pass))
    {






    $usuario = User::find($this->user_id);
	
      
			$usuario->first_name  =  Input::get('first_name');
			$usuario->last_name  =  Input::get('last_name');
			$usuario->email  = Input::get('email');
			$usuario->cargo  = Input::get('cargo');
			
			//$pass = Input::get('password');

				$usuario->save();
			//if ($usuario->password === md5($pass)) {
			//	$usuario->save();

			//}


		//$pass2 = md5($pass);
	
		return Response::json(['success'=>true]);


	 }
    else
    {


return Response::json(['success'=>false]);
    }


}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
	
return Response::json(['success'=>false]);
}

}




	public function postRegistroBasico()
	{

$input = Input::all();
try
{
    // Find the user using the user id
    $user = Sentry::findUserById($this->user_id);

$pass = Input::get('pass');
    if($user->checkPassword($pass))
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
		//	'email'     => 'required|email',
			//'web'       => 'url',
		//	'direccion' => 'required',
		///	'telefono'	=> 'required|numeric',
		//	'direccion'	=> 'required',

		//	'imagen'    => 'image'
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
			$empresa_update->pais_id  = Input::get('pais_id');
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
  $FileEmpresas = FileEmpresas::findOrNew(Input::get($empresa->id));
        if(Input::file('files'))
		{
			

			


			$destinationPath = 'uploads/files'; // upload path
	      	$extension = Input::file('files')->getClientOriginalExtension(); // getting image extension
	      	$fileNameFiles = rand(11111,99999).'.'.$extension; // renameing image
	      	Input::file('files')->move($destinationPath, $fileNameFiles); // uploading file to given path

	      		$FileEmpresas->empresa_id = $empresa->id;
        $FileEmpresas->name = Input::get('filesname');
		$FileEmpresas->files = $fileNameFiles;
		$FileEmpresas->save();
	      	
        }
        else{


        	$fileNameFiles =$FileEmpresas->files;
        	$fileNameFilestext =$FileEmpresas->name;
        }

	


		
		$empresa_update->email       = Input::get('email');
		$empresa_update->web         = Input::get('web');
		$empresa_update->telefono    = Input::get('telefono');
		$empresa_update->direccion   = Input::get('direccion');
		$empresa_update->pais_id     = Input::get('pais_id');
		$empresa_update->ciudad     = Input::get('ciudad');
		$empresa_update->personacontacto     = Input::get('personacontacto');
		$empresa_update->postal      = Input::get('postal');
		$empresa_update->descripcion = Input::get('descripcion');
		$empresa_update->tw = Input::get('twitter');
		$empresa_update->fb = Input::get('facebook');
		$empresa_update->cod_area = Input::get('cod_area');
		$empresa_update->cod_pais = Input::get('cod_pais');
	
		$empresa_update->imagen      = $fileName;

		$empresa_update->save();


		return Response::json(['success'=>true]);

	 }
    else
    {


return Response::json(['success'=>false]);
    }


}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
	
return Response::json(['success'=>false]);
}

}


	public function postRegistroBasico2()

	{

		
$input = Input::all();
try
{
    // Find the user using the user id
    $user = Sentry::findUserById($this->user_id);

$pass = Input::get('pass');
    if($user->checkPassword($pass))
    {

		$input = Input::all();

		$empresa = User::find($this->user_id)->empresas->first();

        $empresa_update = Empresa::find($empresa->id);

		
		$empresa_update->FOB = Input::get('FOB');
		$empresa_update->EXW = Input::get('EXW');
		$empresa_update->FCA = Input::get('FCA');
		$empresa_update->DDP = Input::get('DDP');
		$empresa_update->DES = Input::get('DES');
		$empresa_update->CFR = Input::get('CFR');
		$empresa_update->FAS = Input::get('FAS');
		$empresa_update->CPT = Input::get('CPT');
		$empresa_update->DDU = Input::get('DDU');
		$empresa_update->Expres = Input::get('Expres');
		$empresa_update->CIF = Input::get('CIF');
		$empresa_update->CIP = Input::get('CIP');
		$empresa_update->DEQ = Input::get('DEQ');
		$empresa_update->DAF = Input::get('DAF');

		$empresa_update->COP = Input::get('COP');
		$empresa_update->CAD = Input::get('CAD');
		$empresa_update->GBP = Input::get('GBP');
		$empresa_update->USD = Input::get('USD');
		$empresa_update->AUD = Input::get('AUD');
		$empresa_update->CNY = Input::get('CNY');
		$empresa_update->EUR = Input::get('EUR');
		$empresa_update->HKD = Input::get('HKD');
		$empresa_update->CHF = Input::get('CHF');

		$empresa_update->TT = Input::get('TT');
		$empresa_update->LC = Input::get('LC');
		$empresa_update->DP = Input::get('DP');
		$empresa_update->DA = Input::get('DA');

		$empresa_update->ingles = Input::get('ingles');
		$empresa_update->espanol = Input::get('espanol');
		$empresa_update->chino = Input::get('chino');
		$empresa_update->japones = Input::get('japones');
		$empresa_update->portugues = Input::get('portugues');
		$empresa_update->aleman = Input::get('aleman');
		$empresa_update->arabe = Input::get('arabe');
		$empresa_update->frances = Input::get('frances');
		$empresa_update->ruso = Input::get('ruso');
		$empresa_update->koreano = Input::get('koreano');
		$empresa_update->hindu = Input::get('hindu');
		$empresa_update->italiano = Input::get('italiano');


		$empresa_update->RIM = Input::get('RIM');
		$empresa_update->CA = Input::get('CA');
		$empresa_update->AT = Input::get('AT');
		$empresa_update->AJA = Input::get('AJA');
		$empresa_update->BPZF = Input::get('BPZF');
		$empresa_update->DTCO = Input::get('DTCO');

		$empresa_update->SOL = Input::get('SOL');
		$empresa_update->SA = Input::get('SA');
		$empresa_update->SSIA = Input::get('SSIA');
		$empresa_update->SACCE = Input::get('SACCE');


		$empresa_update->SAMP = Input::get('SAMP');
		$empresa_update->STAC = Input::get('STAC');
		$empresa_update->STTC = Input::get('STTC');
		$empresa_update->STMC = Input::get('STMC');
		$empresa_update->STAI = Input::get('STAI');
		$empresa_update->SSTAN = Input::get('SSTAN');

		$empresa_update->SAE = Input::get('SAE');
		$empresa_update->STE = Input::get('STE');
		$empresa_update->SMA = Input::get('SMA');
		$empresa_update->SFL = Input::get('SFL');
		$empresa_update->SMU = Input::get('SMU');


	


	
		$empresa_update->save();


		return Response::json(['success'=>true, $empresa_update]);


	 }
    else
    {


return Response::json(['success'=>false]);
    }


}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
	
return Response::json(['success'=>false]);
}

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
