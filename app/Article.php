<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = ['codigobar', 'referencia', 'nombre', 'stock', 'descripcion', 'estado', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function detail_purchase()
    {
    	return $this->hasMany('App\Detail_purchase');
    }

       public function datail_sale()
    {
    	return $this->hasMany('App\Detail_sale');
    }
}
