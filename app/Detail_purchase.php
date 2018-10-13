<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_purchase extends Model
{
    protected $table = "detail_purchase";
    protected $fillable = ['cantidad', 'preciocompra', 'precioventa', 'purchase_id', 'article_id'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
    public function purchase()
    {
    	return $this->belongsTo('App\Purchase');
    }
}
