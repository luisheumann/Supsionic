<?php

class InteresesSias extends Eloquent
{
	protected $table = 'intereses_sias';

    public function PaisesOperacion()
    {
      
        return $this->hasMany('SiasPaisesOperacion', 'intereses_sias_id');
    } 

}


