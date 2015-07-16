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
			'categoria_producto'   => 'required',
			'producto'			   => 'required',
			'codigo'      	       => 'required',
			//'unidad_medida' 	   => 'required',
			'detalles_producto'    => 'required',
			'capacidad_produccion' => 'required|numeric',
			'cantidad_minima'      => 'required|numeric',
			'cantidad_disponible'  => 'required|numeric',
			'pais_origen' 		   => 'required',
          //  'pais_destino'          => 'required',
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
        $producto->categoria_id   = Input::get('categoria_producto');
        $producto->empresa_id     = $empresa_id;
        $producto->nombre 	      = Input::get('producto');
        $producto->codigo         = Input::get('codigo');
        $producto->unidad_id      = Input::get('unidad_medida');
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

        
        $producto->save();

        

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
                    
                    $destinationPath = 'uploads/productos';
                    $extension = $file->getClientOriginalExtension(); 
                    $filename = rand(11111,99999).'.'.$extension; // renameing image
                    $file->move($destinationPath, $filename);
                     // guardamos un  thumbnail  

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
