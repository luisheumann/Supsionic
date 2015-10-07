<?php

class NoticiasController extends BaseController {

	

	public function index()
	{
		$data['datanoticias'] = Noticias::orderBy('updated_at', 'DESC')->paginate(15);
	 
	return View::make('admin.noticias.lista', $data)->with('activo','dash');
	}


	public function index_home()
	{
		$data['datanoticias'] = Noticias::orderBy('updated_at', 'DESC')->paginate(15);
	 
	return View::make('noticias.index', $data)->with('activo','dash');
	}





	public function editar($id=null){

		$data['datanoticia'] = Noticias::find($id);
		return View::make('admin.noticias.edicion',$data)->with('activo','agregar');

	}









	public function getStatus($id = Null){

		
	$noticia = Noticias::find($id);

	

			if (($noticia->status) == 1){
			$noticia->status =0;
			}else{
			$noticia->status =1;

			}

				

	
			if ($noticia->save()) {
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}



		return Redirect::to('noticias');


		}



	public function editarpost($id = Null){

			$noticia = Noticias::FindOrNew(Input::get('id'));
			$noticia->titulo = Input::get('titulo');
			$noticia->contenido = Input::get('contenido');
			$noticia->categoria = Input::get('categoria');
			$noticia->status = Input::get('status');
			$noticia->order = Input::get('order');
			$noticia->url = Str::slug(Input::get('titulo'));

	







		
$validator = Validator::make(
    array('titulo' => 'Dayle'),
    array('titulo' => 'required|min:5')
);
  


		///////////////////////////////////////////////////

	    $imgput = Input::all();

 	if ($imgput['imagen'] != null) {



	 	 $fileName = trim(time() . '-' . $imgput['imagen']->getClientOriginalName());
	 	 $fileExtencion = $imgput['imagen']->getClientOriginalExtension();
		 $tituloCompleto = Input::get('titulo');
 		 $fileName = Str::words($tituloCompleto,8 );  
     	 $fileName = Str::slug($fileName);
     	 $fileName = preg_replace('/\s+/', '', $fileName);
     	 $fileName = date('YmdHi-').$fileName.'.'.$fileExtencion;
  		 $thubName = 'thumb-'.$fileName;
  		  $thubNamelista = 'thumblista-'.$fileName;
  		  $fileNameBig = 'big-'.$fileName;
  		  Image::make(Input::file('imagen'))->fit(640, 360)->save('images/noticias/' .$fileNameBig);
		  Image::make(Input::file('imagen'))->fit(430, 238)->save('images/noticias/' .$fileName);
		  Image::make(Input::file('imagen'))->fit(196, 110)->save('images/noticias/' .$thubName);
		  Image::make(Input::file('imagen'))->fit(80, 45)->save('images/noticias/' .$thubNamelista);
		 $noticia->imagen = $fileName;
			///////////////////////////////////////////////


 	}

 






			
			if ($noticia->save()) {
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}



		return Redirect::to('admin/noticias/lista');


}



	public function eliminar($id = Null){
	
		$noticia = Noticias::find($id);

		$nameImage = $noticia->imagen;


		$fileName = 'img/upload/'. $nameImage ;
		$thubName = 'img/upload/thumb-'. $nameImage ;
		$thubNamelista = 'img/upload/thumblista-'. $nameImage ;
		$fileNameBig = 'img/upload/big-'. $nameImage ;

		if (File::exists($fileName,$thubName,$thubNamelista,$fileNameBig)) {
		    File::delete($fileName,$thubName,$thubNamelista,$fileNameBig);
		} 



		if ($noticia->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('admin/noticias/lista');
	}






}