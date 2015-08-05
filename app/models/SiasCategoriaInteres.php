<?php

class SiasCategoriaInteres extends Eloquent
{
	protected $table = 'sias_categoria_interes';



 public function intersesTransportador2()
    {
        return $this->hasMany('InteresesTransportador', 'empresa_id');
    } 



}