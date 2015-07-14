<?php

class ImportadorController extends BaseController {

    protected $user_id;

    public function __construct() 
    {
        if (Sentry::check())
        {
            $this->user_id = Sentry::getuser()->id;
        }
        else{
            $slug = Route::current()->parameters();
            $slug = $slug['post'];
            $perfil = Empresa::findBySlug($slug);
            $this->user_id = $perfil->user_id;
        }
    }

    public function postIntereses()
    {

		$input = Input::all();
		$reglas =  array(
			'categoria_producto' => 'required',
			'productos'			 => 'required',
			'pais_destino' 		 => 'required',
			'origenes' 			 => 'required'
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
		$empresa_id =  $perfil->pivot->empresa_id;

		// GUARDA LOS INTERESES
		$InteresesImportador = new InteresesImportador();
		$InteresesImportador->empresa_id   = $empresa_id;
		$InteresesImportador->categoria_id = input::get('categoria_producto');
		$InteresesImportador->productos    = input::get('productos');
		$InteresesImportador->save();

        // GUARDA LOS DESTINOS
		foreach (Input::get('origenes') as $origen)
		{
	        $RutaImportador = new RutaImportador();
	        $RutaImportador->intereses_importador_id = $InteresesImportador->id;
	        $RutaImportador->pais_destino = Input::get('pais_destino');
	        $RutaImportador->pais_origen  = $origen;
	        $RutaImportador->save();
		}
		return Response::json(['success'=>true]);

    }

 public function Interes()
    {
        $empresa = User::find($this->user_id)->empresas->first();
                $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises

      $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion


        return View::make('perfil.completar.importador.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador));
    }


     public function InteresAdd()
    {
        $empresa = User::find($this->user_id)->empresas->first();
                $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises

      $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion


        return View::make('perfil.completar.importador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador));
    }





	// obtengo el producto por ID
    public function interesById($id)
    {
    	$segment  = Request::segment(4);
    	$interes = InteresesImportador::find($segment);
    	$rutas = $interes->RutaImportador;
    	
    	return View::make('perfil.completar.importador.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas));
    }



}
