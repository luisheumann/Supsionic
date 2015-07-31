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



           foreach (Input::get('categoria') as $categoria)
        {

            $SiasCategoriaInteres = SiasCategoriaInteres::findOrNew(Input::get('id'));

          
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesTransportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        }


		return Response::json(['success'=>true]);

    }

     public function Interes()
    {
        $empresa = User::find($this->user_id)->empresas->first();
                $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises

      $intersesTransportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del importador en cuenstion

         $unidades = Unidades::Get();

        return View::make('perfil.completar.transportador.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesTransportador'=>$intersesTransportador,'unidades'=>$unidades));
    }





     public function InteresAdd()
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
        $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $intersesImportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del importador en cuenstion
        $unidades = Unidades::Get();


        return View::make('perfil.completar.transportador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador,'unidades'=>$unidades));
    }








  public function InteresDelete($id)
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($empresa->id)->perfil->first();


$segment  = Request::segment(4);
        $articulo = InteresesTransportador::find($segment);
        if($articulo->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }
       return Redirect::to('/'.$empresa->slug.'/interes_transportador');
        
    }



	// obtengo el producto por ID
    public function interesById($id)
    {

        $segment  = Request::segment(4);
        $interes2 = InteresesTransportador::find($segment);
        $rutas2 = $interes2->RutaTransportador;

        $unidades = Unidades::Get();

        $medidamax2 = Unidades::where('id', $interes2->max_medida)->first();
        $medidamin2 = Unidades::where('id', $interes2->min_medida)->first();
          $categorias_select = SiasCategoriaInteres::where('intereses_transporte_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 
        
        return View::make('perfil.completar.transportador.intereses.detalles', array('interes2' =>$interes2, 'rutas2' => $rutas2,'medidamax2' => $medidamax2 , 'medidamin2' => $medidamin2, 'categorias_select' => $categorias_select));


    	
    }

     public function InteresEdit($id)
    {
        $segment  = Request::segment(4);
        $interes = InteresesTransportador::find($segment);

        $rutas = $interes->RutaTransportador;

        $unidades = Unidades::Get();

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
          $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
             $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
 $empresa = User::find($this->user_id)->empresas->first();

  $categorias_select = SiasCategoriaInteres::where('intereses_transporte_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 

        
        return View::make('perfil.completar.transportador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias, 'unidades' => $unidades, 'paises' => $paises, 'empresa' => $empresa,'categorias_select' => $categorias_select));
    }




 public function interesByIdedit($id)
    {

      $segment  = Request::segment(4);
        $interes = InteresesImportador::where('id', $segment)->first();
        $rutas = $interes->RutaImportador;

        $unidades = Unidades::Get();

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
          $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
             $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
 $empresa = User::find($this->user_id)->empresas->first();

        
        return View::make('perfil.completar.transportador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias, 'unidades' => $unidades, 'paises' => $paises, 'empresa' => $empresa));


        
    }




}
