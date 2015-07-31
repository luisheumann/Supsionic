<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Empresa extends Eloquent implements SluggableInterface
{
	protected $table = 'empresas';

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'nombre',
        'save_to'    => 'slug',
    );

    public function pais()
    {
        return $this->belongsTo('Paises');
    }

    public function productos()
    {
        return $this->hasMany('Productos', 'empresa_id');
    }    

    public function intersesImportador()
    {
        return $this->hasMany('InteresesImportador', 'empresa_id');
    } 

    public function intersesTransportador()
    {
        return $this->hasMany('InteresesTransportador', 'empresa_id');
    }    

        public function intersesSias()
    {
        return $this->hasMany('InteresesSias', 'empresa_id');
    }    


    public function perfil()
    {
        return $this->belongsToMany('Perfil', 'perfil_empresa', 'empresa_id', 'perfil_id')->withPivot('id', 'estado');
    }

}
