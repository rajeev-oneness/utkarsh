<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $table = 'product_stock';

    protected $fillable = [
	   'product_id','size_id','current_stock','stock_alert','sku_code'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function product(){

	    return $this->hasOne(Product::class, 'id', 'product_id');
	}

	public function size(){

	    return $this->hasOne(Size::class, 'id', 'size_id');
	}
}
