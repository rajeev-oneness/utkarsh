<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $fillable = [
	   'title','image', 'link', 'is_active'
	];

    public $timestamps = false;
    
    public function category(){
		return $this->hasOne(Category::class, 'id', 'categoryId');
	}
}
