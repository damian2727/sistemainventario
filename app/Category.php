<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = "categories";

   protected $fillable = ['nombre', 'descripcion'];

   public function articles()
   {
   	 return $this->hasMany('App\Article');
   }
}
