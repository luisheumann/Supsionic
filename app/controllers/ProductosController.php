<?php

class ProductosController extends BaseController {


    protected $user_id;

    public function __construct() 
    {
        if (Sentry::check())
        {
            $this->user_id = Sentry::getuser()->id;

        }else{
            $slug = Route::current()->parameters();
            $slug = $slug['post'];
            $perfil = Empresa::findBySlug($slug);
            $this->user_id = $perfil->user_id;
        }
    }

    public function ProductosbyEmpresa()
    {
    	$empresa = User::find($this->user_id)->empresas->first();
    	$productos = Empresa::find($empresa->id)->productos;
    	return $productos;
    }

	public function postRegistroProductoExportador()
	{

        // subida de imagenes
        $files = Input::file('file');

		$input = Input::all();
		$reglas =  array(
			
			'producto'			   => 'required',
			'codigo'      	       => 'required',
			//'unidad_medida' 	   => 'required',
			'detalles_producto'    => 'required',
			'capacidad_produccion' => 'required|numeric',
			'cantidad_minima'      => 'required|numeric',
			'cantidad_disponible'  => 'required|numeric',
			'pais_origen' 		   => 'required',
       'destinos'          => 'required',
       'categoria'          => 'required',
			'destinos' 			   => 'required'
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


      //  $producto = new Productos();
        $producto = Productos::findOrNew(Input::get('id'));
        $producto->categoria_id   = 0;
        $producto->empresa_id     = $empresa_id;
        $producto->nombre 	      = Input::get('producto');
        $producto->codigo         = Input::get('codigo');
        $producto->descripcion    = Input::get('detalles_producto');
        $producto->produccion_mes = Input::get('capacidad_produccion');
        $producto->venta_minima   = Input::get('cantidad_minima');
        $producto->stock          = Input::get('cantidad_disponible');
        $producto->marca          = Input::get('marca');
        $producto->precio          = Input::get('precio');
        $producto->moneda          = Input::get('moneda');
        $producto->puerto          = Input::get('puerto');
        $producto->condiciones_pago  = Input::get('condiciones_pago');
        $producto->material          = Input::get('material');
        $producto->peso          = Input::get('peso');
        $producto->medida     = Input::get('medida');
        $producto->dimenciones     = Input::get('dimenciones');
        $producto->color          = Input::get('color');
        $producto->referencia    = Input::get('referencia');
        $producto->detalle_producto = Input::get('detalle_producto');
        $producto->partida = Input::get('partida');
        $producto->LC = Input::get('LC');
        $producto->DA = Input::get('DA');
        $producto->DP = Input::get('DP');
        $producto->TT = Input::get('TT');
        $producto->condiciones_transporte  = Input::get('condiciones_transporte');
        $producto->peso_caja = Input::get('peso_caja');
        $producto->peso_caja_unidad = Input::get('peso_caja_unidad');
        $producto->peso_unidad = Input::get('peso_unidad');
        $producto->alto = Input::get('alto');
        $producto->ancho = Input::get('ancho');
        $producto->profundo = Input::get('profundo');
        $producto->dimencion_unidad = Input::get('dimencion_unidad');

        $producto->altoc = Input::get('altoc');
        $producto->anchoc = Input::get('anchoc');
        $producto->profundoc = Input::get('profundoc');
        $producto->unidad_prod = Input::get('unidad_prod');
        $producto->unidad_cantidad = Input::get('unidad_cantidad');

        $producto->SAE = Input::get('SAE');
        $producto->STE = Input::get('STE');
        $producto->SMA = Input::get('SMA');
        $producto->SFL = Input::get('SFL');
        $producto->SMU = Input::get('SMU');
        $producto->SOL = Input::get('SOL');
        $producto->SA = Input::get('SA');
        $producto->SSIA = Input::get('SSIA');
        $producto->SACCE = Input::get('SACCE');
        $producto->SAMP = Input::get('SAMP');
        $producto->STAC = Input::get('STAC');
        $producto->STTC = Input::get('STTC');
        $producto->STMC = Input::get('STMC');
        $producto->STAI = Input::get('STAI');
        $producto->SSTAN = Input::get('SSTAN');



        
        $producto->save();

        


        // BORRAR LOS categorias PARA EVITAR DUPLICADOS
       $valorid = RutaExportador::where('producto_id', $producto->id)->get(); 
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
            $SiasCategoriaInteres->producto_id = $producto->id;
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
            $SiasCategoriaInteres->producto_id = $producto->id;
            $SiasCategoriaInteres->categoria_id = $categoria;
            $SiasCategoriaInteres->save();
        };
        }






        // GUARDA LOS DESTINOS
		foreach (Input::get('destinos') as $destino)
		{
	       $RutaExportador = new RutaExportador();
         //   $RutaExportador = RutaExportador::findOrNew(Input::get($destino));
	        $RutaExportador->perfil_empresa_id = Input::get('perfil_empresa');
	        $RutaExportador->producto_id  = $producto->id;
	        $RutaExportador->pais_origen  = Input::get('pais_origen');
	        $RutaExportador->pais_destino = $destino;
	        $RutaExportador->save();
		}

       foreach($files as $file) {

         if($file)
            {                
                $rules = array(
                    'files' => 'image'
                );  

                $validator = Validator::make(array('file'=> $file), $rules);

                if($validator->fails()){
                   return Response::json(['success' => false, 'error' => $validator->getMessageBag()->toArray()]);
                }
                else {
                    
                    $imgth = Image::make($file->getRealPath());
                    $imgth->resize(60, null, function ($constraint) {
                        $constraint->aspectRatio();
                    }); 

                    $imgbig = Image::make($file->getRealPath());
                      $imgbig->resize(428, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    }); 
                    
                    $destinationPath = 'uploads/productos/original';
                    $extension = $file->getClientOriginalExtension(); 
                    $filename = rand(11111,99999).'.'.$extension; // renameing image


                    $file->move($destinationPath, $filename);
                     // guardamos un  thumbnail  
                  $imgbig->save('uploads/productos/'.$filename);  // gusrdamos el thumb      
                    $imgth->save('uploads/productos/thumbnail/'.$filename);  // gusrdamos el thumb      

                    // gurdamos los datos de la imagen 
                    $ImgProductos = new ImgProductos();
                    $ImgProductos->imagen = $filename;
                    $ImgProductos->producto_id =$producto->id;
                    $ImgProductos->save();
                }
            }
        }

		$productos =  Productos::find($producto->id);

		return Response::json(['success'=>true, 'productos' =>$productos]);
            
	}

	// obtengo el producto por ID
    public function ProductoById($id)
    {
    	$segment  = Request::segment(3);
    	$producto = Productos::find($segment);
    	$rutas = $producto->RutaExportador;
         $imagenes = $producto->imagen;
         $categoria = Categorias::where('id', 1)->first(); // todas las categorias
         $monedas = Monedas::where('id', $producto->moneda)->first();
        $empresa  = Empresa::find($producto->empresa_id)->perfil->first();


    	return View::make('perfil.completar.exportador.productos.detalles', array('producto' =>$producto, 'rutas' => $rutas,'imagenes'=>$imagenes,'monedas'=>$monedas, '$empresa'=>$empresa,'$categoria'=>$categoria ));
    }



     public function ProductoAdd()
    {
                $categorias = Categorias::orderBy('nombre', 'ASC')->get(); // todas las categorias
     $producto  = Empresa::find(12)->productos; //los productos de la empresa en cuestión
         $unidades = Unidades::Get();
      $paises = Paises::orderBy('nombre', 'ASC')->get(); // todos los paises
        $empresa = User::find(12)->empresas->first();
        $perfil  = Empresa::find(12)->perfil->first();

        return View::make('perfil.completar.exportador.productos.add', array('producto' =>$producto, 'categorias' => $categorias, 'unidades' =>$unidades, 'paises'=>$paises, 'empresa'=>$empresa,'perfil'=>$perfil));
    }



    public function ProductoBySlugId($slug, $lug_producto, $id)
    {
        $producto = Productos::find($id);
        $imagenes = $producto->imagen;
        $perfil = Empresa::findBySlug($slug);
        $idproducto = $id;

             $categoria = Categorias::where('id', $producto->categoria_id)->first(); // todas las categorias


        return View::make('perfil.productos.detalle', array('producto' => $producto, 'imagenes'=>$imagenes, 'perfil'=>$perfil,'idproducto'=>$idproducto, 'fotos'=>$fotos, '$categoria'=>$categoria));
    }


}
