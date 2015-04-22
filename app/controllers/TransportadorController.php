<?php

class TransportadorController  extends BaseController {

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
			'pais_origen' 		 => 'required',
			'destinos' 			 => 'required'
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
		$InteresesTransportador = new InteresesTransportador();
		$InteresesTransportador->empresa_id   = $empresa_id;
		$InteresesTransportador->categoria_id = input::get('categoria_producto');
		$InteresesTransportador->save();

        // GUARDA LOS DESTINOS
		foreach (Input::get('destinos') as $destino)
		{
	        $RutaTransportador = new RutaTransportador();
	        $RutaTransportador->intereses_transporte_id = $InteresesTransportador->id;
	        $RutaTransportador->pais_origen  = Input::get('pais_origen');
	        $RutaTransportador->pais_destino = $destino;
	        $RutaTransportador->save();
		}
		return Response::json(['success'=>true]);

    }

	// obtengo el producto por ID
    public function interesById($id)
    {
    	$segment  = Request::segment(4);
    	$interes = InteresesTransportador::find($segment);
    	$rutas = $interes->RutaTransportador;
    	
    	return View::make('perfil.completar.transportador.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas));
    }



}
