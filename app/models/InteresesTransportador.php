<?php

class InteresesTransportador extends Eloquent
{
	protected $table = 'intereses_transporte';

    public function RutaTransportador()
    {
        return $this->hasMany('RutaTransportador', 'intereses_transporte_id');
    } 

}



