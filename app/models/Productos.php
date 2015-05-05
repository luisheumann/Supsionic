<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Productos extends Eloquent implements SluggableInterface
{
    protected $table = 'productos';

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'nombre',
        'save_to'    => 'slug',
    );

    public function unidad()
    {
        return $this->belongsTo('Unidades', 'unidad_id');
    }   

    public function RutaExportador()
    {
        return $this->hasMany('RutaExportador', 'producto_id');
    } 

    public function imagen()
    {
        return $this->hasMany('ImgProductos', 'producto_id');
    } 

}



