<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'product_reviews';

    protected $fillable = [
	   'user_id','product_id','rating','title','review','is_active',
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function user(){

	    return $this->hasOne(User::class, 'id', 'user_id');
	}
}
