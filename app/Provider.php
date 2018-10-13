<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
   protected $table = "providers";
   protected $fillable = ['nombre', 'documento', 'direccion', 'email', 'telefono'];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
