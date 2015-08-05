<?php

class InteresesTransportador extends Eloquent
{
	protected $table = 'intereses_transporte';

    public function RutaTransportador()
    {
        return $this->hasMany('RutaTransportador', 'intereses_transporte_id');
    } 


    public function empresas()
    {
        return $this->belongsTo('Empresa', 'empresa_id');
    }


     public function categoriastransportador()
    {
        return $this->hasMany('SiasCategoriaInteres', 'intereses_transporte_id');
    }   


    

}



