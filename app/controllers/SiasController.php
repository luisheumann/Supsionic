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


        $InteresesSias = InteresesSias::findOrNew(Input::get('id'));

        $InteresesSias->empresa_id   = $empresa_id;
        //$InteresesImportador->categoria_id = input::get('categoria_producto');
        $InteresesSias->productos    = input::get('productos');
            if (input::get('min') == null){
                $valormin = 0;

            }else{
                $valormin = input::get('min');

            }

               if (input::get('max') == null){
                $valormax = 0;

            }else{
                $valormax = input::get('max');

            }



        $InteresesSias->min    = $valormin;
        $InteresesSias->max    = $valormax;
        $InteresesSias->min_medida    = input::get('min_cantidad');
        $InteresesSias->max_medida   = input::get('min_cantidad');
        $InteresesSias->frecuencia   = input::get('frecuencia');
        $InteresesSias->partida   = input::get('partida');


        $InteresesSias->save();





		// GUARDA LOS INTERESES
        /*
    		$InteresesTransportador = new InteresesTransportador();
    		$InteresesTransportador->empresa_id   = $empresa_id;
    		$InteresesTransportador->categoria_id = input::get('categoria_producto');
    		$InteresesTransportador->save();
        */

         //  VALIDAR QUE SI YA SE ESTÁ, EL PAIS O LA CATEGORIA NO SE VUELVA A AGREGAR    


        // GUARDA LAS CATEGORÍAS DE INTERÉS

              $valorid = SiasCategoriaInteres::where('intereses_sias_id', $InteresesSias->id)->get(); 
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
            $SiasCategoriaInteres->intereses_sias_id = $InteresesSias->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        }

        
// BORRAR LOS PAISES PARA EVITAR DUPLICADOS
         $valorid = SiasPaisesOperacion::where('intereses_sias_id', $InteresesSias->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }

             }
// /BORRAR LOS PAISES PARA EVITAR DUPLICADOS

        // GUARDA LOS PAISES DE OPERACIÓN
		foreach (Input::get('operacion') as $operacion)
		{

	         $SiasPaisesOperacion = SiasPaisesOperacion::findOrNew(0);
             $SiasPaisesOperacion->empresa_id = $empresa_id;
            $SiasPaisesOperacion->intereses_sias_id = $InteresesSias->id;
	        $SiasPaisesOperacion->pais_id = $operacion;
	        $SiasPaisesOperacion->save();
		}

		return Response::json(['success'=>true]);

    }


     public function Interes()
    {
      $empresa = User::find($this->user_id)->empresas->first();
      $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
      $InteresesSias  = Empresa::find($empresa->id)->intersesSias;
      $unidades = Unidades::Get();



      return View::make('perfil.completar.sias.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'InteresesSias'=>$InteresesSias,'unidades'=>$unidades));
  }


   public function InteresAdd()
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
        $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $InteresesSias  = Empresa::find($empresa->id)->intersesSias; // intereses del importador en cuenstion
        $unidades = Unidades::Get();


        return View::make('perfil.completar.sias.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'InteresesSias'=>$InteresesSias,'unidades'=>$unidades ));
    }



  public function InteresEdit($id)
    {
        $segment  = Request::segment(4);
        $interes = InteresesSias::find($segment);
        $rutas = $interes->PaisesOperacion;
        $categorias_select = SiasCategoriaInteres::where('intereses_sias_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias



        $paises_operacion = SiasPaisesOperacion::where('intereses_sias_id', $segment)->get(); 


        $unidades = Unidades::Get();
        $paises = Paises::orderBy('nombre', 'ASC')->get();

     

             $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
        
        return View::make('perfil.completar.sias.intereses.edit', array('interes' =>$interes,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias,'categorias_select' => $categorias_select,'unidades' => $unidades,'paises' => $paises,'paises_operacion' => $paises_operacion,'rutas' => $rutas));
    }




  public function InteresDelete($id)
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $perfil  = Empresa::find($empresa->id)->perfil->first();


        $segment  = Request::segment(4);

        $articulo = InteresesSias::find($segment);
        if($articulo->delete()){
        Session::set('mensaje','Artículo eliminado con éxito');
            }else{
        Session::set('error','Ocurrió un error al intentar eliminar');
        }
        return Redirect::to('/'.$empresa->slug.'/info_sias');
        
    }

    public function interesById($id)
    {
        $segment  = Request::segment(4);
        $interes = InteresesSias::find($segment);
        $rutas = $interes->PaisesOperacion;

        $unidades = Unidades::Get();
              $paises_operacion = SiasPaisesOperacion::where('intereses_sias_id', $segment)->get(); 
               $categorias_select = SiasCategoriaInteres::where('intereses_sias_id', $segment)->orderBy('categoria_id', 'ASC')->get(); 

        $medidamax = Unidades::where('id', $interes->max_medida)->first();
        $medidamin = Unidades::where('id', $interes->min_medida)->first();
        
        return View::make('perfil.completar.sias.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin,'paises_operacion' => $paises_operacion,'categorias_select' => $categorias_select));
    }












}
