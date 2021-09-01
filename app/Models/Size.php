<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	protected $fillable = [
	   'category_id','slug','sizes','is_active'
	];

	public $timestamps = false;

	//hasOne relation with Category Model
	public function category(){
	    return $this->hasOne(Category::class, 'id', 'category_id');
	}
}
