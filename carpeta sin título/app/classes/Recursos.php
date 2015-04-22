<?php

class Recursos {

    public static function hola() 
    {
        return "Hola Mundo de los recursos";
    }

    public static function imagenProducto($producto_id)
    {

        $img_count = count(Productos::find($producto_id)->imagen);
        if($img_count==0)
        {
            $msg = "No tiene imagenes<br>";
            $img = "product.png";

        }
        elseif($img_count==1)
        {
            $msg = "Tiene una imagen<br>";
            $img = Productos::find($producto_id)->imagen->first()->imagen;

        }else{
            $msg = "Tiene mas de  una imagen<br>";
            $img = Productos::find($producto_id)->imagen->first()->imagen;
        }
        return $img;
    }

    public static function ImgAvatar($perfil) 
    {

        if(!empty($perfil->imagen))
        {
          $path_perfil = public_path().'/uploads/'.$perfil->imagen.' ';
          $foto_perfil = JitImage::source($path_perfil)->cropAndResize(45, 45, 5);;  
        }else{
          $path_perfil='/images/avatar.png';
          $foto_perfil = JitImage::source($path_perfil)->cropAndResize(45, 45, 5);;  
        }
        
        return $foto_perfil;
    }    

 } // fin class