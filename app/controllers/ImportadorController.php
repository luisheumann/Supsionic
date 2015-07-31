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
        $InteresesImportador->categoria_id = 0;
        $InteresesImportador->productos    = input::get('productos');
        $InteresesImportador->min    = input::get('min');
        $InteresesImportador->max    = input::get('max');
        $InteresesImportador->min_medida    = input::get('min_cantidad');
        $InteresesImportador->max_medida   = input::get('min_cantidad');
        $InteresesImportador->frecuencia   = 0;
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


// BORRAR LOS categorias PARA EVITAR DUPLICADOS
       $valorid = SiasCategoriaInteres::where('intereses_transporte_id', $InteresesImportador->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }

             }

// /BORRAR LOS PAISES PARA EVITAR DUPLICADOS
     foreach (Input::get('categoria') as $categoria)
        {

            $SiasCategoriaInteres = SiasCategoriaInteres::findOrNew(Input::get('id'));

          
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesImportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        }

}



 if ($PerfilEmpresa->perfil_id == 2)
        {
         $InteresesImportador = InteresesImportador::findOrNew(Input::get('id'));

		$InteresesImportador->empresa_id   = $empresa_id;
		$InteresesImportador->categoria_id = 0;
		$InteresesImportador->productos    = input::get('productos');
        $InteresesImportador->min    = input::get('min');
        $InteresesImportador->max    = input::get('max');
        $InteresesImportador->min_medida    = input::get('min_cantidad');
        $InteresesImportador->max_medida   = input::get('min_cantidad');
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


        // BORRAR LOS categorias PARA EVITAR DUPLICADOS
       $valorid = SiasCategoriaInteres::where('intereses_importador_id', $InteresesImportador->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }

             }


         foreach (Input::get('categoria') as $categoria)
        {

            $SiasCategoriaInteres = SiasCategoriaInteres::findOrNew(Input::get('id'));

          
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->intereses_importador_id = $InteresesImportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        }


}
        if ($PerfilEmpresa->perfil_id == 3)
        {



// BORRAR LOS categorias PARA EVITAR DUPLICADOS
       $valorid = RutaTransportador::where('intereses_transporte_id', $InteresesImportador->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }

             }




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

           
       $valorid = RutaImportador::where('intereses_importador_id', $InteresesImportador->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }

             }


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
          $categorias_select = SiasCategoriaInteres::where('intereses_importador_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 


        return View::make('perfil.completar.importador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador,'categorias_select'=>$categorias_select));
    }



    // obtengo el producto por ID
    public function InteresEdit($id)
    {
        $segment  = Request::segment(4);
        $interes = InteresesImportador::find($segment);
        $rutas = $interes->RutaImportador;
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); 

        $unidades = Unidades::Get();
        $paises = Paises::orderBy('nombre', 'ASC')->get();

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
         $categorias_select = SiasCategoriaInteres::where('intereses_importador_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 
        
        return View::make('perfil.completar.importador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias,'unidades' => $unidades,'paises' => $paises,'categorias_select' => $categorias_select));
    }



  public function InteresDelete($id)
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($empresa->id)->perfil->first();


        $segment  = Request::segment(4);
        $articulo = InteresesImportador::find($segment);
        if($articulo->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }
        return Redirect::to('/'.$empresa->slug.'/interes_importador');
        
    }



public function InteresDelete2($id)
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($empresa->id)->perfil->first();


        $segment  = Request::segment(4);
        $articulo2 = FileEmpresas::where('id', $segment)->first();
        if($articulo2->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }
return Redirect::to('/'.$empresa->slug.'/admin/perfil/empresa#datos-empresa');
        
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
           $categorias_select = SiasCategoriaInteres::where('intereses_importador_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 
    	
    	return View::make('perfil.completar.importador.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin,'categorias_select' => $categorias_select));
    }



}
