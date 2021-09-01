<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

	protected $fillable = [
	   'product_id', 'product_name','product_brand','product_code','product_author','product_image', 'mac', 'is_active','product_weight','quantity','price','gst'
	];

	public $timestamps = false;
	
	//hasOne relation with product Model
	public function product(){
	    return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
