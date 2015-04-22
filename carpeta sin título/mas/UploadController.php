<?php 

class UploadController extends BaseController
{


    public function postDelete($id)
    {

        $ImgProductos = ImgProductos::find($id);   
        
        $filename    = public_path().'/uploads/productos/'.$ImgProductos->imagen;
        $filename_th = public_path().'/uploads/productos/thumbnail/'.$ImgProductos->imagen;

        if (File::exists($filename)) {
            File::delete($filename);
        }

        if (File::exists($filename_th)) {
            File::delete($filename_th);
        }         
        
        $ImgProductos->delete();

        return Response::json(array('files'=> array()), 200);

    }

    public function index($id=null)
    {
        return View::make('perfil.exportador.productos.index', array('id'=>$id));
    }    

    public function edit()
    {
        return View::make('perfil.exportador.productos.index');
    }        

    public function postIndex($id)
    {
        $file = Input::file('files');

        $input = array('files' => $file[0]);
        $rules = array(
            'files' => 'image'
        );

        $validator = Validator::make($input, $rules);
        if ( $validator->fails() ){

           return Response::json(['success' => false, 'error' => $validator->getMessageBag()->toArray()]);
        }
        else {

            $Pathdestino = 'uploads/productos';
            $extension = $file[0]->getClientOriginalExtension(); 
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $imgth = Image::make($file[0]->getRealPath());

            $imgth->resize(80, null, function ($constraint) {
                $constraint->aspectRatio();
            });   

            $imgth->save('uploads/productos/thumbnail/'.$fileName);  // gusrdamos el thumb      
            $file[0]->move($Pathdestino, $fileName); // guradamos la img original

            // gurdamos los datos de la imagen 
            $ImgProductos = new ImgProductos();
            $ImgProductos->imagen = $fileName;
            $ImgProductos->save();

            $success = array(
                'deleteType'=> "DELETE",
                'deleteUrl'=> action('UploadController@postDelete', $ImgProductos->id),
                'name'=> $file[0]->getClientOriginalName(),
                'size'=> $file[0]->getClientSize(),
                'thumbnailUrl'=> asset($Pathdestino.'/thumbnail/'.$fileName),
                'type'=> $file[0]->getClientMimeType(),
                'url'=> asset($Pathdestino.'/'.$fileName),
            );

            return Response::json(array( 'files'=> array($success)), 200);
        }
  
    }
 
 }
?>