<?php

class PerfilEmpresa extends Eloquent
{
	protected $table = 'perfil_empresa';

    public function empresas()
    {
        return $this->belongsTo('Empresa', 'empresa_id');
    }

    public function perfil()
    {
        return $this->hasMany('Perfil', 'perfil_id');
    }


  public function interes()
    {
          return $this->hasMany('InteresesTransportador', 'empresa_id');
    } 



}
