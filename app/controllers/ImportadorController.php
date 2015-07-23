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


        $perfil2  = Empresa::find($empresa->id)->perfil->first();

        $PerfilEmpresa  = PerfilEmpresa::find($perfil2->pivot->id);

        $input = Input::all();

		// GUARDA LOS INTERESES

        if ($PerfilEmpresa->perfil_id == 3)
        {
         $InteresesImportador = InteresesTransportador::findOrNew(Input::get('id'));

        $InteresesImportador->empresa_id   = $empresa_id;
        $InteresesImportador->categoria_id = input::get('categoria_producto');
        $InteresesImportador->productos    = input::get('productos');
        $InteresesImportador->min    = input::get('min');
        $InteresesImportador->max    = input::get('max');
        $InteresesImportador->min_medida    = input::get('min_cantidad');
        $InteresesImportador->max_medida   = input::get('max_cantidad');
        $InteresesImportador->frecuencia   = input::get('frecuencia');
        $InteresesImportador->partida   = input::get('partida');

        $InteresesImportador->SAE   = input::get('SAE');
        $InteresesImportador->STE   = input::get('STE');
        $InteresesImportador->SMA   = input::get('SMA');
        $InteresesImportador->SFL   = input::get('SFL');
        $InteresesImportador->SMU   = input::get('SMU');
        $InteresesImportador->SOL   = input::get('SOL');
        $InteresesImportador->SA   = input::get('SA');
        $InteresesImportador->SSIA   = input::get('SSIA');
        $InteresesImportador->SACCE   = input::get('SACCE');
        $InteresesImportador->SAMP   = input::get('SAMP');
        $InteresesImportador->STAC   = input::get('STAC');
        $InteresesImportador->STTC   = input::get('STTC');
        $InteresesImportador->STMC   = input::get('STMC');
        $InteresesImportador->STAI   = input::get('STAI');
        $InteresesImportador->SSTAN   = input::get('SSTAN');


        $InteresesImportador->save();

}



 if ($PerfilEmpresa->perfil_id == 2)
        {
         $InteresesImportador = InteresesImportador::findOrNew(Input::get('id'));

		$InteresesImportador->empresa_id   = $empresa_id;
		$InteresesImportador->categoria_id = input::get('categoria_producto');
		$InteresesImportador->productos    = input::get('productos');
        $InteresesImportador->min    = input::get('min');
        $InteresesImportador->max    = input::get('max');
        $InteresesImportador->min_medida    = input::get('min_cantidad');
        $InteresesImportador->max_medida   = input::get('max_cantidad');
        $InteresesImportador->frecuencia   = input::get('frecuencia');
        $InteresesImportador->partida   = input::get('partida');

        $InteresesImportador->SAE   = input::get('SAE');
        $InteresesImportador->STE   = input::get('STE');
        $InteresesImportador->SMA   = input::get('SMA');
        $InteresesImportador->SFL   = input::get('SFL');
        $InteresesImportador->SMU   = input::get('SMU');
        $InteresesImportador->SOL   = input::get('SOL');
        $InteresesImportador->SA   = input::get('SA');
        $InteresesImportador->SSIA   = input::get('SSIA');
        $InteresesImportador->SACCE   = input::get('SACCE');
        $InteresesImportador->SAMP   = input::get('SAMP');
        $InteresesImportador->STAC   = input::get('STAC');
        $InteresesImportador->STTC   = input::get('STTC');
        $InteresesImportador->STMC   = input::get('STMC');
        $InteresesImportador->STAI   = input::get('STAI');
        $InteresesImportador->SSTAN   = input::get('SSTAN');


		$InteresesImportador->save();

}
        if ($PerfilEmpresa->perfil_id == 3)
        {



    foreach (Input::get('origenes') as $destino)
        {
        

            $RutaTransportador = new RutaTransportador();
            $RutaTransportador->intereses_transporte_id = $InteresesImportador->id;
            $RutaTransportador->pais_destino  = Input::get('pais_destino');
            $RutaTransportador->pais_origen = $destino;
            $RutaTransportador->save();
        }

        }
      
        if ($PerfilEmpresa->perfil_id == 2)
        {
        // GUARDA LOS DESTINOS
		foreach (Input::get('origenes') as $origen)
		{
	        $RutaImportador = new RutaImportador();
	        $RutaImportador->intereses_importador_id = $InteresesImportador->id;
	        $RutaImportador->pais_destino = Input::get('pais_destino');
	        $RutaImportador->pais_origen  = $origen;
	        $RutaImportador->save();
		}

     }
		return Response::json(['success'=>true]);

    }

 public function Interes()
    {
        $empresa = User::find($this->user_id)->empresas->first();
                $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises

      $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
         $unidades = Unidades::Get();

        return View::make('perfil.completar.importador.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador,'unidades'=>$unidades));
    }


     public function InteresAdd()
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
        $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
        $unidades = Unidades::Get();


        return View::make('perfil.completar.importador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador));
    }



    // obtengo el producto por ID
    public function InteresEdit($id)
    {
        $segment  = Request::segment(4);
        $interes = InteresesImportador::find($segment);
        $rutas = $interes->RutaImportador;

        $unidades = Unidades::Get();

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
        
        return View::make('perfil.completar.importador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin));
    }





	// obtengo el producto por ID
    public function interesById($id)
    {
    	$segment  = Request::segment(4);
    	$interes = InteresesImportador::find($segment);
    	$rutas = $interes->RutaImportador;

        $unidades = Unidades::Get();

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
    	
    	return View::make('perfil.completar.importador.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin));
    }



}
