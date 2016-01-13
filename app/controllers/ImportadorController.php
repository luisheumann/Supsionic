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
		
			
			'pais_destino' 		 => 'required',
			'categoria' 		 => 'required',
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
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesImportador->id;
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
            $SiasCategoriaInteres->intereses_transporte_id = $InteresesImportador->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        };
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
			$SiasCategoriaInteres->intereses_importador_id = $InteresesImportador->id;
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
			$SiasCategoriaInteres->intereses_importador_id = $InteresesImportador->id;
			$SiasCategoriaInteres->categoria_id = $categoria;
			$SiasCategoriaInteres->save();
		};
		}





}

// TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR   TRANSPORTADOR  
		if ($PerfilEmpresa->perfil_id == 3)
		{



	   $valorid = RutaTransportador::where('intereses_transporte_id', $InteresesImportador->id)->get(); 
		 foreach ($valorid as $valorunico){
		if($valorunico->delete()){
		Session::set('mensaje','ELIMINADO');
			}else{
		Session::set('error','ERROR ELIMINAR');
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
	  $taxonomias = Taxonomy::remember(100)->get(); 
	  $intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
	  $unidades = Unidades::Get();

$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;

	  
		return View::make('perfil.completar.importador.index', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador,'unidades'=>$unidades, 'taxonomias'=>$taxonomias,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
	}


	 public function InteresAdd()
	{
		$empresa = User::find($this->user_id)->empresas->first();
		$categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
		$taxonomias = Taxonomy::orderBy('name', 'ASC')->get(); // todas las categorias
		$paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
		$intersesImportador  = Empresa::find($empresa->id)->intersesImportador; // intereses del importador en cuenstion
		$unidades = Unidades::Get();

$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;
		 

		return View::make('perfil.completar.importador.intereses.add', array( 'categorias' => $categorias, 'paises'=>$paises,'empresa'=>$empresa,'intersesImportador'=>$intersesImportador, 'taxonomias'=>$taxonomias, 'unidades'=>$unidades,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
	}


	   public function taxonomy()
	{
		$taxonomias = Taxonomy::with('childrenRecursive')->where('id', 464)->get();


	
$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;
		return View::make('perfil.completar.importador.intereses.taxonomy', array('taxonomias'=>$taxonomias,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6));
	}


	public function search()
	{
		$taxonomias = Taxonomy::where('name', 'like', '%'.Input::get('term').'%')
		->select('id','name as value','parent as info')->get();


		return Response::json(
			array(
				'results' => $taxonomias->toArray()
				),
			200
			);

		
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
        $categorias_select = SiasCategoriaInteres::where('intereses_importador_id', $segment)->orderBy('categoria_id', 'DESC')->first(); 
		

		$categorianame = Taxonomy::where('id',$categorias_select->categoria_id)->first();

		$id1 = null;
$id2 = null;
$id3 = null;
$id4 = null;
$id5 = null;
$id6 = null;
	$taxonomias = Taxonomy::orderBy('name', 'ASC')->get();
		return View::make('perfil.completar.importador.intereses.edit', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin, 'categorias' => $categorias,'unidades' => $unidades,'paises' => $paises,'categorias_select' => $categorias_select,'taxonomias'=>$taxonomias, 'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'id5'=>$id5,'id6'=>$id6, 'categorianame' => $categorianame));
	}



  public function InteresDelete($id)
	{
		$empresa = User::find($this->user_id)->empresas->first();
		$perfil  = Empresa::find($empresa->id)->perfil->first();


		$segment  = Request::segment(4);
		$articulo = InteresesImportador::find($segment);
		$categoria = SiasCategoriaInteres::where('intereses_importador_id', $segment);

	if($categoria->delete()){
		Session::set('mensaje','categoria eliminado con éxito');
			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}

		if($articulo->delete()){
		Session::set('mensaje','Artículo eliminado con éxito');
			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}
		return Redirect::to('/'.$empresa->slug.'/interes_importador/lista');
		
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


public function ProductoDeleteOne($id)


{	
$messages = "Producto Borrado";
        Toastr::success($messages, $title = null, $options = ['positionClass'=>'toast-bottom-right']);

	$segment  = Request::segment(4);
		$segment2  = Request::segment(5);

	$producto = ImgProductos::find($segment);
	$empresa = User::find($this->user_id)->empresas->first();
		if($producto->delete()){
			$message = "Producto";
			$title = "Borrado";


	


			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}
		return Redirect::to('/'.$empresa->slug.'/admin/producto/edit?id='.$segment2);


}


public function ProductoDelete($id)


{	
	$messages = "Producto Borrado";
	Toastr::success($messages, $title = null, $options = ['positionClass'=>'toast-bottom-right']);

	$segment  = Request::segment(4);

	$empresa = User::find($this->user_id)->empresas->first();



	$producto = Productos::find($segment);

// ELIMINAR CATEGORIA
	$valorid = SiasCategoriaInteres::where('producto_id', $segment)->get(); 
	foreach ($valorid as $valorunico){

		if($valorunico->delete()){
			Session::set('mensaje','Artículo eliminado con éxito');
		}else{
			Session::set('error','Ocurrió un error al intentar eliminar');
		}

	}

///ELIMINAR RUTA
	$Rutaeliminar = RutaExportador::where('producto_id', $segment)->get(); 
	foreach ($Rutaeliminar as $valorunico){

		if($valorunico->delete()){
			Session::set('mensaje','rutas eliminadas');
		}else{
			Session::set('error','Ocurrió un error al intentar eliminar');
		}

	}



	
	$imagenes = $producto->imagen;

	foreach ($imagenes as $imagen ) {
		$fileName = 'uploads/productos/'. $imagen->imagen ;
		$thubName = 'uploads/productos/thumbnail/'. $imagen->imagen ;

		$Imgproducto = ImgProductos::where('producto_id', $segment);
		if($Imgproducto->delete()){
			$message = "Producto";
			$title = "Borrado";
		}else{
			Session::set('error','Ocurrió un error al intentar eliminar');
		}
		

		if (File::exists($fileName,$thubName)) {
			File::delete($fileName,$thubName);
		} 
	}


		



		$producto = Productos::find($segment);
		if($producto->delete()){
			$message = "Producto";
			$title = "Borrado";


	


			}else{
		Session::set('error','Ocurrió un error al intentar eliminar');
		}
		return Redirect::to('/'.$empresa->slug.'/admin/producto/lista');


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
		  $categorias_select = SiasCategoriaInteres::where('intereses_importador_id', $segment)->orderBy('categoria_id', 'DESC')->first(); 
		$categorianame = Taxonomy::where('id',$categorias_select->categoria_id)->first();
		return View::make('perfil.completar.importador.intereses.detalles', array('interes' =>$interes, 'rutas' => $rutas,'medidamax' => $medidamax , 'medidamin' => $medidamin,'categorias_select' => $categorias_select,'categorianame' => $categorianame));
	}



}
