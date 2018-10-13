<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    protected $fillable = ['numerofactura', 'impuesto', 'estado', 'user_id', 'totalventa'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function datail_sales()
    {
    	return $this->hasMany('App\Detail_sale');
    }
}
