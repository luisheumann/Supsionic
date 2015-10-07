<?php

class SocialRelation extends Eloquent
{
	protected $table = 'social_relation';

    
 public function empresas()
    {
        return $this->belongsTo('Empresa', 'empresa_id_related');
    }


     public function empresasrelated()
    {
        return $this->belongsTo('Empresa', 'empresa_id');
    }



    public static function crearFecha($param){
		$fecha = new DateTime($param);
			return $fecha;
		}
    

}


