<?php

class PerfilEmpresa extends Eloquent
{
	protected $table = 'perfil_empresa';

    public function empresas()
    {
        return $this->hasMany('Empresa', 'empresa_id');
    }

    public function perfil()
    {
        return $this->hasMany('Perfil', 'perfil_id');
    }

}
