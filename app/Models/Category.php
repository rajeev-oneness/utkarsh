<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

	protected $fillable = [
	   'name', 'slug', 'status','image'
	];

	public $timestamps = false;
	
	//hasOne relation with Category Model
	public function level1(){
	    return $this->hasMany(Level1::class, 'parent_id', 'id');
	}
}
