<?php

class InteresesImportador extends Eloquent
{
	protected $table = 'intereses_importador';

    public function RutaImportador()
    {
        return $this->hasMany('RutaImportador');
    } 

}



