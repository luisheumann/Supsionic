<?php

class Taxonomy extends Eloquent
{
	protected $table = 'taxonomy';



	public function children()
{
   return $this->hasMany('taxonomy', 'parent');
}

// recursive, loads all descendants
public function childrenRecursive()
{
   return $this->children()->with('childrenRecursive');
   // which is equivalent to:
   // return $this->hasMany('Survey', 'parent')->with('childrenRecursive);
}

// parent
public function parent()
{
   return $this->belongsTo('taxonomy','parent');
}

// all ascendants
public function parentRecursive()
{
   return $this->parent()->with('parentRecursive');
}


}
