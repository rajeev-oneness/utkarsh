<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    protected $table = 'shippingcharge';

	protected $fillable = [
	   'categoryId', 'shippingcharge','is_active'
	];

	public $timestamps = false;

	public function category(){
		return $this->hasOne(Category::class, 'id', 'categoryId');
	}
}
