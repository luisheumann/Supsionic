<?php

class RutaTransportador extends Eloquent
{
	protected $table = 'ruta_transporte';

	
	   public function pais(){
        return $this->belongsTo('Paises', 'pais_origen');
}
