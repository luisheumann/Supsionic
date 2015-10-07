<?php

class Noticias extends Eloquent
{
	protected $table = 'noticias';


	public static function crearFecha($param){
		$fecha = new DateTime($param);
			return $fecha;
		}
		
}


