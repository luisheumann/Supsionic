<?php

class RutaExportador extends Eloquent
{
	protected $table = 'ruta_exportador';



	   public function pais(){
        return $this->belongsTo('Paises', 'pais_origen');
    }



}
