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








   $valorid = SiasCategoriaInteres::where('intereses_transporte_id', $InteresesTransportador->id)->get(); 
             foreach ($valorid as $valorunico){

                if($valorunico->delete()){
        Session::set('mensaje','ELIMINADO');
            }else{
        Session::set('error','ERROR ELIMINAR');
        }

             }


             if (Input::get('demo7_') == null) {
                $hijo1 = 0;
             }else{
                $hijo1 = Input::get('demo7_');
             }

              if (Input::get('demo7__') == null) {
                $hijo2 = 0;
             }else{
                $hijo2 = Input::get('demo7__');
             }

              if (Input::get('demo7___') == null) {
                $hijo3 = 0;
             }else{
                $hijo3 = Input::get('demo7___');
             }

              if (Input::get('demo7____') == null) {
                $hijo4 = 0;
             }else{
                $hijo4 = Input::get('demo7____');
             }

              if (Input::get('demo7_____') == null) {
                $hijo5 = 0;
             }else{
                $hijo5 = Input::get('demo7_____');
             }

         if (Input::get('demo7______') == null) {
                $hijo6 = 0;
             }else{
                $hijo6 = Input::get('demo7______');
             }




    $categorias = [$hijo1,$hijo2,$hijo3,$hijo4,$hijo5,$hijo6];



         foreach ($categorias as $categoria)
        {

            if (!$categoria == 0){
            $SiasCategoriaInteres = SiasCategoriaInteres::findOrNew(Input::get('id'));        
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesTransportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        };
        }


         if (Input::get('shijo1') == null) {
                $shijo1 = 0;
             }else{
                $shijo1 = Input::get('shijo1');
             }

              if (Input::get('shijo2') == null) {
                $shijo2 = 0;
             }else{
                $shijo2 = Input::get('shijo2');
             }

              if (Input::get('shijo3') == null) {
                $shijo3 = 0;
             }else{
                $shijo3 = Input::get('shijo3');
             }

              if (Input::get('shijo4') == null) {
                $shijo4 = 0;
             }else{
                $shijo4 = Input::get('shijo4');
             }

              if (Input::get('shijo5') == null) {
                $shijo5 = 0;
             }else{
                $shijo5 = Input::get('shijo5');
             }

         if (Input::get('shijo6') == null) {
                $shijo6 = 0;
             }else{
                $shijo6 = Input::get('shijo6');
             }

        $scategorias = [$shijo1,$shijo2,$shijo3,$shijo4,$shijo5,$shijo6];

         foreach ($scategorias as $categoria)
        {

            if (!$categoria == 0){
            $SiasCategoriaInteres = SiasCategoriaInteres::findOrNew(Input::get('id'));        
            $SiasCategoriaInteres->empresa_id = $empresa_id;
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesTransportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        };
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
        $taxonomias = Taxonomy::remember(100)->get(); 
        $id1 = null;
        $id2 = null;
        $id3 = null;
        $id4 = null;
        $id5 = null;
        $id6 = null;

        return View::make('perfil.completar.transportador.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesTransportador'=>$intersesTransportador,'unidades'=>$unidades, 'taxonomias'=>$taxonomias,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
    }





     public function InteresAdd()
    {
        $empresa = User::find($this->user_id)->empresas->first();
        $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
        $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $intersesImportador  = Empresa::find($empresa->id)->intersesTransportador; // intereses del importador en cuenstion
        $unidades = Unidades::Get();
        $taxonomias = Taxonomy::remember(100)->get(); 
        $id1 = null;
        $id2 = null;
        $id3 = null;
        $id4 = null;
        $id5 = null;
        $id6 = null;


        return View::make('perfil.completar.transportador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador,'unidades'=>$unidades, 'taxonomias'=>$taxonomias,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
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
          $categorias_select = SiasCategoriaInteres::where('intereses_transporte_id', $segment)->orderBy('categoria_id', 'ASC')->first(); 
        
          $categorianame = Taxonomy::where('id',$categorias_select->categoria_id)->first();

        
        return View::make('perfil.completar.transportador.intereses.detalles', array('interes2' =>$interes2, 'rutas2' => $rutas2,'medidamax2' => $medidamax2 , 'medidamin2' => $medidamin2, 'categorias_select' => $categorias_select, 'categorianame' => $categorianame));


    	
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


   $categorias_select = SiasCategoriaInteres::where('intereses_transporte_id', $segment)->orderBy('categoria_id', 'DESC')->first(); 

  $categorianame = Taxonomy::where('id',$categorias_select->categoria_id)->first();

        $id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;
    $taxonomias = Taxonomy::orderBy('name', 'ASC')->get();



        
        return View::make('perfil.completar.transportador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias, 'unidades' => $unidades, 'paises' => $paises, 'empresa' => $empresa,'categorias_select' => $categorias_select, 'taxonomias'=>$taxonomias, 'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6, 'categorianame' => $categorianame));
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
