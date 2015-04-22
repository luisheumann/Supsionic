<?php

class SiasController  extends BaseController {

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

    public function postInfo()
    {

		$input = Input::all();
		$reglas =  array(
			'categoria' => 'required',
			'operacion' => 'required',
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
        /*
    		$InteresesTransportador = new InteresesTransportador();
    		$InteresesTransportador->empresa_id   = $empresa_id;
    		$InteresesTransportador->categoria_id = input::get('categoria_producto');
    		$InteresesTransportador->save();
        */

         //  VALIDAR QUE SI YA SE ESTÁ, EL PAIS O LA CATEGORIA NO SE VUELVA A AGREGAR    


        // GUARDA LAS CATEGORÍAS DE INTERÉS
        foreach (Input::get('categoria') as $categoria)
        {
            $SiasCategoriaInteres = new SiasCategoriaInteres();
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        }

        // GUARDA LOS PAISES DE OPERACIÓN
		foreach (Input::get('operacion') as $operacion)
		{
	        $SiasPaisesOperacion = new SiasPaisesOperacion();
	        $SiasPaisesOperacion->empresa_id = $empresa_id;
	        $SiasPaisesOperacion->pais_id = $operacion;
	        $SiasPaisesOperacion->save();
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
