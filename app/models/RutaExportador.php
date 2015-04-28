<?php

class RutaExportador extends Eloquent
{
	protected $table = 'ruta_exportador';



	   public function nombrepais(){
        return $this->belongsTo('Paises', 'perfil_empresa_id');
    }



}
