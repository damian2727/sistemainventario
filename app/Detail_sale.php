<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_sale extends Model
{
   protected $table = "detail_sale";
   protected $fillable = ['cantidad', 'precioventa', 'sale_id', 'article_id'];

     public function article()
    {
    	return $this->belongsTo('App\Article');
    }
    public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }
}
