<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";
    protected $fillable = ['tipofacturta', 'numerofactura', 'impuesto', 'estado', 'provider_id'];

     public function provider()
    {
    	return $this->belongsTo('App\Provider');
    }

     public function detail_purchase()
    {
    	return $this->hasMany('App\Detail_purchase');
    }
}
